<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use App\Http\Requests;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $data = $request->all();
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
}
