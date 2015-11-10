<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\Package\PackageRepositoryInterface;
use Illuminate\Http\Request;
use Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PhotosController extends Controller
{

    protected $uploadsDirectory = '/images/uploads/';


    protected $package;


    public function __construct(PackageRepositoryInterface $package) {

        $this->package = $package;

    }

    public function uploadPackagePhoto(Request $request) {

        if( $request->hasFile('photo') ) {

            $file = $request->file('photo');

            $filename = $this->makeThumbnail($file);

            return $this->package->addPhoto($request->package_id, $filename);
      
        }

    }

    public function deletePackagePhoto($path) {

        $this->package->deletePhoto($path);

        return redirect()->back();

    }


    // public function uploadMenuPhoto(Request $request) {
        
    //     if( $request->hasFile('photo') ) {

    //         $file = $request->file('photo');

    //         $filename = $this->makeThumbnail($file);

    //         /**
    //          * admin/menus/edit.blade.php
    //          */
    //         if( $request->has('menu_id') ) {
                
    //             return $this->menu->updatePhoto($request->menu_id, $filename);
    //         }            

    //         session(['filename' => $filename]);

    //     }

    // }  

    // public function uploadSlidePhoto(Request $request) {
        
    //     if( $request->hasFile('photo') ) {

    //         $file = $request->file('photo');

    //         $filename = time() . '-' . $file->getClientOriginalName();

    //         $file->move(public_path($this->uploadsDirectory), $filename);

    //         *
    //          * admin/menus/edit.blade.php
             
    //         if( $request->has('slide_id') ) {
                
    //             return $this->slide->updatePhoto($request->slide_id, $filename);
    //         }            

    //         session(['filename' => $filename]);

    //     }

    // }   

    // public function uploadStorePhoto(Request $request) {
        
    //     if( $request->hasFile('photo') ) {

    //         $file = $request->file('photo');

    //         $filename = time() . '-' . $file->getClientOriginalName();

    //         $file->move(public_path($this->uploadsDirectory), $filename);

    //         /**
    //          * admin/menus/edit.blade.php
    //          */
    //         if( $request->has('store_id') ) {
                
    //             return $this->store->updatePhoto($request->store_id, $filename);
    //         }            

    //         session(['filename' => $filename]);

    //     }

    // }          


    protected function makeThumbnail(UploadedFile $photo)
    {   

        $filename = sprintf('%s-%s', time(), $photo->getClientOriginalName()); //87947839749.jpg

        $image = Image::make($photo->getRealPath());

        $image->resize(800, null, function($constraint) {

            $constraint->aspectRatio();
        
        })->save( $this->fullPath($filename) );  

        return $filename;
        
    }    

    protected function fullPath($filename) {
    
        return public_path() . $this->uploadsDirectory . $filename;
    
    }

}