<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Storage;

class UploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        $message='';
        if($request->isMethod('POST')) {
            $file = $request->file('editormd-image-file');
            if ($file->isValid()){
                $ext = $file->getClientOriginalExtension();
                $realPath = $file->getRealPath();
                $filename = date('Y-m-d-H-i-S') . '-' . uniqid() . '.' . $ext;
                $bool = Storage::disk('public')->put('article/'.$filename, file_get_contents($realPath));
                if(!$bool) $message="Error";
                else $url='/storage/article/'.$filename;
            }else $message="Not Valid";
        }else $message="Not Post";
        $data = array(
            'success' => empty($message) ? 1 : 0,  //1：上传成功  0：上传失败
            'message' => $message,
            'url' => !empty($url) ? $url : ''
        );
        header('Content-Type:application/json;charset=utf8');
        exit(json_encode($data));
    }
}
