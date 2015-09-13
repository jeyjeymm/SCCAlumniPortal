<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SliderRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SliderObject;

use Auth;
use Image;

class SliderObjectsController extends Controller
{
    public function index(){

    	$slider_objects = SliderObject::all();

    	$action = 'create';

    	$role = Auth::check() ? Auth::user()->role->name : 'user';

    	return view('slider.create',compact('slider_objects','action','role'));

    }


    public function create(){

    	$slider_objects = SliderObject::all();

    	$action = 'create';

    	$role = Auth::check() ? Auth::user()->role->name : 'user';
    
        return view('slider.create',compact('slider_objects','action','role'));
        	
    }


    public function store(SliderRequest $request){
    
        $request_data = $request->all();
        $request_data['tagline_color'] = $request_data['tagline_color'].' '.$request_data['tagline_shade'].'-'.$request_data['tagline_shade_value'];
        $request_data['slogan_color'] = $request_data['slogan_color'].' '.$request_data['slogan_shade'].'-'.$request_data['slogan_shade_value'];

        unset($request_data['tagline_shade']);
        unset($request_data['tagline_shade_value']);
        unset($request_data['slogan_shade']);
        unset($request_data['slogan_shade_value']);

        if ($request->hasFile('image_file')) {

            $path = storage_path('app/slider/');

            $image_file = $request_data['image_file'];
            unset($request_data['image_file']);

            $request_data['image_name'] = $this->generateImageName($image_file->getClientOriginalExtension());
            $request_data['mime_type'] = $image_file->getClientMimeType();

            $this->saveImage($path, $image_file, $request_data['image_name']);

        }

        $slider_obj = new SliderObject($request_data);
        $slider_obj->save();

        return redirect('articles');
        	
    }


    public function edit($id){
    
        $slider_object = SliderObject::findOrFail($id);

        $action = 'edit';

        return view('slider.edit',compact('slider_object','action'));
        	
    }


    public function update($id,SliderRequest $request){
    
        $slider_object = SliderObject::findOrFail($id);

        $request_data = $request->all();
        $request_data['tagline_color'] = $request_data['tagline_color'].' '.$request_data['tagline_shade'].'-'.$request_data['tagline_shade_value'];
        $request_data['slogan_color'] = $request_data['slogan_color'].' '.$request_data['slogan_shade'].'-'.$request_data['slogan_shade_value'];

        unset($request_data['tagline_shade']);
        unset($request_data['tagline_shade_value']);
        unset($request_data['slogan_shade']);
        unset($request_data['slogan_shade_value']);


        if ($request->hasFile('image_file')) {

            $path = storage_path('app/slider/');

            $image_file = $request_data['image_file'];
            unset($request_data['image_file']);

            $request_data['image_name'] = $this->generateImageName($image_file->getClientOriginalExtension());
            $request_data['mime_type'] = $image_file->getClientMimeType();

            $this->saveImage($path, $image_file, $request_data['image_name']);

        }

        $slider_object->update($request_data);

        return redirect('articles');
        	
    }


    public function destroy($id){
    
        SliderObject::destroy($id);

        return redirect('articles');
        	
    }


    public function saveImage($path, $image_file, $image_name){

        if (!file_exists($path)) {

            mkdir($path,0777,true);

        }
    
        $img = Image::make($image_file);

        $img->resize('400','250',function($constraints){

            $constraints->upsize();

        });

        $img->save($path . $image_name, 70);
            
    }


    public function generateImageName($extension){
    
        return uniqid() . '_' . date('Ymdhis') . '.' . $extension;
            
    }

}
