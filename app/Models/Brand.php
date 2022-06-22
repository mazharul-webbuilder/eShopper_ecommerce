<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    private static $brand;
    private static $image;
    private static $imageName;
    private static $imageUrl;
    private static $directory;

    public static function getImageUrl($request)
    {
        self::$image     = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'brand-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl  = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function getNewBrand($request)
    {
        self::$brand               = new Brand();
        self::$brand->name         = $request->name;
        self::$brand->description  = $request->description;
        self::$brand->image        = self::getImageUrl($request);
        self::$brand->save();
    }

    public static function updateBrand($request, $id)
    {
        self::$brand = Brand:: find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$brand->image))
            {
                unlink(self::$brand->image);
            }

            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$brand->image;
        }

        self::$brand->name         = $request->name;
        self::$brand->description  = $request->description;
        self::$brand->image        = self::$imageUrl;
        self::$brand->save();

    }

    public static function deleteBrand($request, $id)
    {
        self::$brand = Brand::find($id);
        if (file_exists(self::$brand->image))
        {
            unlink(self::$brand->image);
        }

        self::$brand->delete();
    }
}
