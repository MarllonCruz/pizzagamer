<?php

namespace App\Http\Controllers\Adm;

use App\Supports\Tools;
use App\Http\Controllers\Controller;
use App\Http\Requests\MceUplaodRequest;

class MceUploadController extends Controller
{
    public function __invoke(MceUplaodRequest $request)
    {   
        if ($request->hasFile('image') && $request->image->isValid()) {
            $tools = (new Tools());

            $image = $tools->fileUpload($request->image, 'post/content/');
            
            $mce_image = '<img style="width: 100%;" src="' . url("storage/{$image}") . '" alt="{title}" title="{title}">';

            return response()->json([
                'mce_image' => $mce_image
            ], 200);
        }    
    }
}
