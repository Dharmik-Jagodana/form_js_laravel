<?php

namespace App\Models;

use DB;
use File;
use Image;
use Storage;
use Illuminate\Database\Eloquent\Model;

class ImageUpload extends Model
{   
    /**
     * Write code for removeFile
     *
     * @return response()
     */
    public static function removeFile($path)
    {
        if(File::exists(public_path($path))){
            File::delete(public_path($path));
        }
    }

    /**
     * Write code for removeDir
     *
     * @return response()
     */
    public static function removeDir($path)
    {
        if(File::isDirectory(public_path($path))){
            File::deleteDirectory(public_path($path));
        }
    }

    /**
     * Write code for upload
     *
     * @return response()
     */
    public static function upload($path, $image, $time = 1)
    {   
        $imageName = 'NoImage.png';

        if(!empty($image)){
            $file = $image->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $filename = str_replace(' ', '-', $filename);
            $extension = $image->extension();
            
            $imageName = $file;
    
            if($time == 1){
                $imageName = time().'-'.$file;
            }
            
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($path), $imageName);
        }

        return $imageName;
    }

    /**
     * Write code for uploadThumbnail
     *
     * @return response()
     */
    public static function uploadThumbnail($orgPath, $path, $image, $width, $height)
    {
        return Image::make(public_path($orgPath).$image)->resize($width, $height)->save(public_path($path).$image);
    }

    /**
     * Write code for uploadReduce
     *
     * @return response()
     */
    public static function uploadReduce($path, $image)
    {
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $ext = $image->getClientOriginalExtension();

        if($ext == 'png'){
            $read_from_path = $image->getPathName();
            $save_to_path = public_path($path.'/'.$imageName);

            $compressed_png_content = ImageUpload::compress_png($read_from_path);
            file_put_contents($save_to_path, $compressed_png_content);
            
        }else{
            $image->move(public_path($path),$imageName);
        }

        Image::make(public_path($path).$imageName)->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save();

        return $imageName;
    }
}
