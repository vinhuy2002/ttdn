<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
class CDNController extends Controller
{
    public function cdnController($image){
        $urll = "http://127.0.0.1:8000/image-store/".$image;
        $contents = file_get_contents($urll);
        $name = substr($image, strrpos($image, '/images/'));
        Storage::disk('public')->put($name, $contents);

        return Redirect('/images/'.$image);
    }

    public function showImage($size, $image){
        $i = explode("x", str_replace("size_", "", $size));

        $imageFullPath = public_path('images/'.$image);

        $savedPath = public_path($size[0].'x'.$size[1]. '/' . $image);

        $savedDir = dirname($savedPath);

        // dd($imageFullPath);

        if (!is_dir($savedDir)) {
            mkdir($savedDir, 777, true);
            $imagee = Image::make($imageFullPath)->fit($size[0], $size[1])->save($savedPath);
        } else {
            $imagee = Image::make($imageFullPath)->fit($size[0], $size[1]);
        }

        return $imagee->response();
    }
}
