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
        $status = $request->get('status');
        if($status == 'trash'){
            $categories = Category::onlyTrashed()->get();
            $onlyTrashed = TRUE;
        }else{
            $categories = Category::with('items')->get();
            $onlyTrashed = FALSE;
        }
        return view('admin.category.index',compact('categories','categoryModel','onlyTrashed'));
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
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('category.index'))->with('trash_msg','Category Deleted');
    }
    public function restore($id){
        $category = Category::withTrashed()->findorFail($id);
        $category->restore();
        return redirect(route('category.index'))->with('save_msg','Category Restored');
    }
}
