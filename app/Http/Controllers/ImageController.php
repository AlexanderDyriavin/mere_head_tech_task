<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ImageController extends Controller
{
    public static function toImage(string $img) : string
    {
        //fileName
        $fileName = str_replace(' ','_',date('Y-m-d H:i'));
        dd(auth()->id());
        $image = explode(',',$img);
        $mimeImage = getimagesizefromstring(base64_decode($image[1]));
        dd($mimeImage);
//        dd(explode(',',$img));
        $date = new DateTime();
        dd(str_replace(' ','_',date('Y-m-d H:i')));
        dd(User::find(auth()->id)->name);
        $image = base64_decode($image[1]);
//        dd($image);
    }
}
