<?php

namespace App\Models;

use App\Http\Controllers\SubCategoryController;
use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    private static $subCategory;
    private static $image;
    private static $imageName;
    private static $imageUrl;
    private static $directory;


    public static function getImageUrl($request)
    {
        self::$image      = $request->file('image');
        self::$imageName  = self::$image->getClientOriginalName();
        self::$directory  = 'subcategory-images/';
        self::$image     ->move(self::$directory,self::$imageName);
        self::$imageUrl    = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function getNewSubCategory($request)

    {
        self::$subCategory = new SubCategory();
        self::$subCategory->category_id = $request->category_id;
        self::$subCategory->name        = $request->name;
        self::$subCategory->description = $request->description;
        self::$subCategory->image       = self::getImageUrl($request);
        self::$subCategory->save();
    }

    public static function updateSubCategory($request, $id)
    {
        self::$subCategory = SubCategory::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$subCategory->image))
            {
                unlink(self::$subCategory->image);
            }

            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$subCategory->image;
        }

        self::$subCategory->category_id = $request->category_id;
        self::$subCategory->name        = $request->name;
        self::$subCategory->description = $request->description;
        self::$subCategory->image       = self::$imageUrl;
        self::$subCategory->save();

    }

    public static function deleteSubCategory($id)
    {
        self::$subCategory = SubCategory::find($id);
        if (file_exists(self::$subCategory->image))
        {
            unlink(self::$subCategory->image);
        }
        self::$subCategory->delete();
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

}
