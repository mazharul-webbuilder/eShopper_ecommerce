<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Customer extends Model
{
    use HasFactory;

    private static $customer;
    public static $image;
    public static $imageName;
    public static $imageUrl;
    public static $directory;

    public static function getNewCustomer($request)
    {
        self::$customer           = new Customer();
        self::$customer->name     = $request->name;
        self::$customer->email    = $request->email;
        self::$customer->mobile   = $request->mobile;
        self::$customer->password = bcrypt($request->mobile);
        self::$customer->address  = $request->delivery_address;
        self::$customer->save();
        return self::$customer;
    }

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'customer-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function getNewRegisterdCustomer($request)
    {
        self::$customer             = new Customer();
        self::$customer->name       = $request->name;
        self::$customer->email      = $request->email;
        self::$customer->mobile     = $request->mobile;
        self::$customer->password   = bcrypt($request->password);
        self::$customer->address    = $request->address;
        self::$customer->image      = self::getImageUrl($request);
        self::$customer->save();


        Session::put('customerId' , self::$customer->id);
        Session::put('customerName' , self::$customer->name);

        return self::$customer;

    }


}
