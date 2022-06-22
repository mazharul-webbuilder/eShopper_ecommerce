<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerQuiry extends Model
{
    use HasFactory;
    private static $customeQuiry;

    public static function getCustomerNewQuery($request)
    {
        self::$customeQuiry          = new CustomerQuiry();
        self::$customeQuiry->name    = $request->name;
        self::$customeQuiry->email   = $request->email;
        self::$customeQuiry->subject = $request->subject;
        self::$customeQuiry->message = $request->message;
        self::$customeQuiry->save();
    }

}
