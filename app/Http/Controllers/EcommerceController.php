<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\CustomerQuiry;
use App\Models\Product;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public $productBySubCategory;
    public $countCategoryProduct;

    public function index()
    {


        return view('front.home.home',[
            'categories'     => Category::orderby('id', 'desc')->take(6)->get(),
            'trendyProducts' => Product::orderby('id', 'asc')->take(8)->get(),
            'justArived' => Product::orderby('id', 'desc')->take(8)->get()

        ]);
    }

    public function products($id)
    {
        $this->productBySubCategory =  Product::where('subcategory_id', $id)->orderby('id', 'desc')->get();
        return view('front.product.products', ['products' => $this->productBySubCategory]);
    }

    public function contact()
    {
        return view('front.home.contact');
    }

    public function customerInquiry(Request $request)
    {
       CustomerQuiry::getCustomerNewQuery($request);
       return redirect()->back()->with('message', 'Thanks For Your Message. We will contact you very soon.');
    }
}
