<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public static function toImage(string $img)
    {
        $dataImg = explode(',', $img);
        $file = base64_decode($dataImg[1]);
        $mimeImage = getimagesizefromstring(base64_decode($dataImg[1]));
        $imageName = time() . '.' . str_replace("image/", "", $mimeImage['mime']);
        Storage::disk('local')->put($imageName,$file);
        return $imageName;
    }
}
