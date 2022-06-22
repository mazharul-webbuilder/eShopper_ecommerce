<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public $categories;
    public $subcategories;

    public function add()
    {
        $this->categories = Category::orderby('id', 'desc')->get();
        return view('admin.subcategory.add', ['categories' =>  $this->categories]);
    }

    public function edit($id)
    {
        return view('admin.subcategory.edit',[
            'categories' => Category::orderby('id', 'desc')->get(),
            'subcategory' => SubCategory::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        SubCategory::updateSubCategory($request, $id);
        return redirect('/manage-sub-category')->with('message', 'SubCategory Update Successfully');
    }

    public function delete(Request $request, $id)
    {
        SubCategory::deleteSubCategory($id);
        return redirect('/manage-sub-category')->with('message', 'SubCategory Deleted Successfully');

    }

    public function create(Request $request)
    {
        SubCategory::getNewSubCategory($request);
        return redirect()->back()->with('message', 'SubCategory Created Successfully');

    }

    public function manage()
    {
        $this->subcategories = SubCategory::orderby('id', 'desc')->get();
        return view('admin.subcategory.manage', ['subCategories' => $this->subcategories]);
    }

}
