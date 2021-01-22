<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;
use Image;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){   
        $this->uploadPath = public_path((config('img.image.directory')));
    }
    public function index(Item $itemModel, Request $request)
    {
        $title = 'Admin | Category';
        $status = $request->get('status');
        if($status == 'trash'){
            $items = Item::onlyTrashed()->get();
            $onlyTrashed = TRUE;
        }else{
            $items = Item::all();
            $onlyTrashed = FALSE;    
        }
        return view('admin.item.index',compact('items','itemModel','onlyTrashed','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Item $item,Requests\ItemRequest $request)
    {
        $data = $this->handleRequest($request);
        $item->create($data);
        return redirect(route('item.index'))->with('save_msg','New Item added to menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ItemRequest $request, Item $item)
    {
        $data = $request->all();
        $item->update($data);
        return back()->with('save_msg','Item Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect(route('item.index'))->with('trash_msg','Item Moved to Trash');
    }
    public function restore($id){
        $item = Item::withTrashed()->findOrFail($id);
        $item->restore();
        return back()->with('save_msg','Item Restored');
    }
    public function forceDelete($id){
        $item = Item::withTrashed()->findOrFail($id);
        $item->forceDelete();
        return back()->with('force_delete_msg','Item Deleted Permanently');
    }


    public function handleRequest($request)
    {
        

        $data = $request->all();
        

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file = $image->getClientOriginalName();
            $fileName = rand(1,1000).'-'.$file;
            $destination = $this->uploadPath;
            $imgUploaded =  $image->move($destination, $fileName);

            if ($imgUploaded) {
                $o_width = config('img.image.original.width');
                $o_height = config('img.image.original.height');

                $t_width = config('img.image.thumbnail.width');
                $t_height = config('img.image.thumbnail.height');

                $extension = $image->getClientOriginalExtension();

                Image::make($destination . '/' . $fileName)
                        ->resize($o_width,null, function($constraint){
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        })
                        ->crop($o_width, $o_height)
                        ->save($destination . '/' . $fileName);


                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);

                Image::make($destination . '/' . $fileName)
                        ->resize($t_width, $t_height)
                        ->save($destination . '/' . $thumbnail);
            }

            $data['image'] = $fileName;
        }
        return $data;
    }
}
