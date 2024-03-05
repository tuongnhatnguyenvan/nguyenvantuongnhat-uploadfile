<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormUpLoadFilerController extends Controller
{
    public function index(){
        return view('uploadfile');
    }
    public function upload(Request $request)
    {
        $path = 'images';
        $diskType = 'local';
        if (!$request->hasFile('image')) {
            return "Hay chon file upload";
        }

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $fileName = 'Nhat nhun nhay.' . $extension;
        $image = $file->storeAs($path, $fileName, $diskType);

        if ($image) {
            echo "Tên file: " . $fileName . "<br>";
            echo "Loại file: " . $extension . "<br>";
            return "Thành công";
        } else {
            return "Thất bại";
        }
    }
}
