<?php

namespace App\Supports;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Tools
{
    public function fileUpload($file, $path)
    {
        $fileName = mb_substr(Storage::putFile('public/' . $path  . date('Y/m'), $file), 7);
        return $fileName;
    }

    public function fileUploadMutiple($files, $path)
    {
        $file_name = "";
        foreach($files as $file){
            $file->move(public_path('assets/img/'.$path), time() . '-' . $file->getClientOriginalName());
            $file_name .= time() .'-'. $file->getClientOriginalName().',';
        }
        $file_name = substr($file_name, 0, -1);

        return $file_name;
    }

    public function removeFileUpload($file): bool 
    {
        $file_path = __DIR__ . '/../../storage/app/public/' . $file;
        
        if(File::exists($file_path)) {
            File::delete($file_path);
            return true;
        } 

        return false;
    }

}
