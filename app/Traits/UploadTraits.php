<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


trait UploadTraits {
    public function verifyAndStoreImage(Request $request, $inputname , $foldername , $disk, $imageable_id, $imageable_type) {

        if( $request->hasFile( $inputname ) ) {


            if (!$request->file($inputname)->isValid()) {
                session()->flash('error', 'Invalid Image!');
                return redirect()->back()->withInput();
            }

            $photo = $request->file($inputname);
            $name = \Illuminate\Support\Str::slug($request->input('name'));
            $filename = $name. '.' . $photo->getClientOriginalExtension();



            $Image = new Image();
            $Image->url = $filename;
            $Image->imageable_id = $imageable_id;
            $Image->imageable_type = $imageable_type;
            $Image->save();
            return $request->file($inputname)->storeAs($foldername, $filename, $disk);
        }
        return null;
    }
    public function Delete_attachment($disk, $path, $id, $filename){
        Storage::disk($disk)->delete($path);
        Image::where('imageable_id',$id)->where('url',$filename)->delete();

    }

}