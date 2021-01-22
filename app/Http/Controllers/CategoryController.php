<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $categoryModel, Request $request)
    {
        $title = 'Admin | Category';
        $status = $request->get('status');
        if($status == 'trash'){
            $categories = Category::onlyTrashed()->get();
            $onlyTrashed = TRUE;
        }else{
            $categories = Category::with('items')->get();
            $onlyTrashed = FALSE;
        }
        return view('admin.category.index',compact('categories','categoryModel','onlyTrashed','title'));
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
    public function store(Requests\CategoryRequest $request, Category $category)
    {
        $data = $request->all();
        $category->create($data);
        return redirect(route('category.index'))->with('save_msg','New Category Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CategoryRequest $request, Category $category)
    {
        $this->authorize("update", $category);

        $data = $request->all();
        $category->update($data);
        return back()->with('save_msg','Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->authorize("delete", $category);

        $category->delete();
        return redirect(route('category.index'))->with('trash_msg','Category Deleted');
    }
    public function restore($id){
        $category = Category::withTrashed()->findorFail($id);
        $category->restore();
        return back()->with('save_msg','Category Restored');
    }
    public function forceDelete($id){
        $category = Category::withTrashed()->findOrFail($id);
        $delete = $category->forceDelete();
        return back()->with('force_delete_msg','Category Deleted Permanently');
    }
}
