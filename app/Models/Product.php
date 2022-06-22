<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\Translation\t;

class Product extends Model
{
    use HasFactory;
    private static $product;
    private static $image;
    private static $imageName;
    private static $imageUrl;
    private static $directory;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'product-images/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function getNewProduct($request)
    {
        self::$product                       = new Product();
        self::$product->category_id          = $request->category_id;
        self::$product->subcategory_id       = $request->subcategory_id;
        self::$product->brand_id             = $request->brand_id;
        self::$product->unit_id              = $request->unit_id;
        self::$product->name                 = $request->name;
        self::$product->code                 = $request->code;
        self::$product->regular_price        = $request->regular_price;
        self::$product->selling_price        = $request->selling_price;
        self::$product->stock_amount         = $request->stock_amount;
        self::$product->short_description    = $request->short_description;
        self::$product->long_description     = $request->long_description;
        self::$product->image                = self::getImageUrl($request);
        self::$product->save();
        return self::$product;
    }

    public static function updateProduct($request, $id)
    {
        self::$product = Product::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$product->image))
            {
                unlink(self::$product->image);
            }

            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$product->image;
        }

        self::$product->category_id          = $request->category_id;
        self::$product->subcategory_id       = $request->subcategory_id;
        self::$product->brand_id             = $request->brand_id;
        self::$product->unit_id              = $request->unit_id;
        self::$product->name                 = $request->name;
        self::$product->code                 = $request->code;
        self::$product->regular_price        = $request->regular_price;
        self::$product->selling_price        = $request->selling_price;
        self::$product->stock_amount         = $request->stock_amount;
        self::$product->short_description    = $request->short_description;
        self::$product->long_description     = $request->long_description;
        self::$product->image                = self::$imageUrl;
        self::$product->save();
        return self::$product;
    }


    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Models\SubCategory');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function unit()
    {
        return $this->belongsTo('App\Models\Unit');
    }

    public function otherImages()
    {
        return $this->hasMany('App\Models\OtherImage');
    }

}
