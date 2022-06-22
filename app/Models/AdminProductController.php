<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class AdminProductController extends Model
{
    use HasFactory;
    public $categoryId;
    public $subCategories;

    public function getSubCategory()
    {
        $this->categoryId =  $_GET['id'];
        $this->subCategories = SubCategory::where('category_id', $this->categoryId)->get();
        return response()->json($this->subCategories);
    }

    public function add()
    {
        return view('admin.product.add',[
            'categories'    => Category::orderby('id', 'desc')->get(),
            'subCategories' => SubCategory::orderby('id', 'desc')->get(),
            'brands' => Brand::orderby('id', 'desc')->get(),
            'units' => Unit::orderby('id', 'desc')->get(),
        ]);
    }

   public function create(Request $request)
   {
       $product = Product::getNewProduct($request);
       OtherImage::getOtherImages($request, $product->id);
       return redirect()->back()->with('message', 'Product Created Successfully');
   }

   public function updateProduct(Request $request, $id)
   {
       Product::updateProduct($request, $id);
       if ($request->file('otherImage'))
       {
           OtherImage::updateOtherImage($request, $id);
       }
       return redirect('/manage-product')->with('message', 'Product Updated Successfully');


   }

   public function edit($id)
   {
       return view('admin.product.edit',[
           'categories'    => Category::orderby('id', 'desc')->get(),
           'subCategories' => SubCategory::orderby('id', 'desc')->get(),
           'brands'        => Brand::orderby('id', 'desc')->get(),
           'units'         => Unit::orderby('id', 'desc')->get(),
           'product'       => Product::find($id)
       ]);
   }



    public  function manage()
    {
        return view('admin.product.manage', [
            'products' => Product::orderby('id', 'desc')->get(),
        ]);
    }

    public function detail($id)
    {
        return view('admin.product.detail',[
            'product' => Product::find($id),
        ]);
    }

}
