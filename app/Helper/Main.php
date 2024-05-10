<?php

namespace App\Helper;

use App\Models\Bank;
use App\Models\Offers;

class Main
{
    public static function storeFile($req,$path)
    {
        if ($req) {
            $imageName = time().'.'.$req->extension();  
            $req->move(public_path('storage/'.$path), $imageName);
            $path = $path.$imageName;
            return $path;
        }
    }

    public static function get_banks()
    {
        return Bank::where('active','1')->get();
    }

    public static function get_offers()
    {
        return Offers::where('active',1)->get();
    }
}