<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProfileRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Profile;
use App\User;

use Auth;
use Image;
use File;
use Mail;

class ProfilesController extends Controller
{

    public function __construct(){
    
        $this->middleware('auth');
            
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $profile = Auth::user()->profile;

        /*if($profile === null){

            $action = 'create';

            return view('profiles.create',compact('action'));

        }*/

        return view('profiles.index',compact('profile'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ProfileRequest $request)
    {

        $request_data = $request->all();

            if($request->hasFile('image_file')){

                $saveImage = true;

                $image_file = $request_data['image_file'];
                unset($request_data['image_file']);

                //Format: id,Ymd,unique_id
                $request_data['image_name'] = $this->generateImagename($image_file->getClientOriginalExtension());
                $request_data['mime_type'] =$image_file->getClientMimeType(); 

            }

        //$profile = new Profile($request_data);

        Auth::user()->profile()->create($request_data);

            if($saveImage){

                $path = storage_path("app/profiles/" . Auth::user()->profile->id . "/profile_picture/");

                $this->saveImage($path,$image_file,$request_data['image_name']);

            }

        return redirect('profiles');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        
        $profile = Profile::findOrFail($id);

        return view('profiles.index',compact('profile'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $profile = Auth::user()->profile;

        return view('profiles.edit',compact('profile'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ProfileRequest $request, $id)
    {

        $request_data = $request->except('_method','_token');

        if ($request->hasFile('image_file')) {

            $path = storage_path('app/profiles/'.Auth::user()->profile->id.'/profile_picture/');

            $image_file = $request_data['image_file'];
            unset($request_data['image_file']);

            $request_data['image_name'] = $this->generateImagename($image_file->getClientOriginalExtension());
            $request_data['mime_type'] = $image_file->getClientMimeType();

            $this->saveImage($path, $image_file, $request_data['image_name']);

        }

        $profile = Auth::user()->profile()->update($request_data);

        return redirect('profiles');

    }


    public function search($name){
    
        $users_array = User::where('name','LIKE',"%$name%")->paginate(20);

        $profiles = [];

        if ($users_array->all()) {            

            foreach ($users_array as $user) {

                if($user->profile !== null) {

                    $profile_object = $user->profile;

                    $profile['id'] = $profile_object->id;
                    $profile['name'] = $user->name;
                    $profile['nickname'] = $profile_object->nickname; 
                    $profile['image_name'] = $profile_object->image_name; 

                    array_push($profiles, $profile);

                }
                
            }

        }

        return $profiles;
            
    }


    public function emailAFriend($email){


        
        Mail::send('emails.email_a_friend', compact('email'), function ($message) use ($email) {

            $message->subject('San Carlos College Alumni Portal');

            $message->from(Auth::user()->email, Auth::user()->name);

            $message->to($email);

        });

        return 'Thank you for inviting a friend! Please invite another!';
            
    }


    public function saveImage($path, $image_file, $image_name){
    
        /*  create a directory for the new profile
        *   in the storage path using profile_id 
        *   if path does not currently exists
        */
        if (!file_exists($path)) {

            mkdir($path,0777,true);

        } else {

            File::deleteDirectory($path,true);

        }

        $img = Image::make($image_file);

        $img->resize(150,150,function($constraint){

            $constraint->upsize();

        });

        $img->save($path . $image_name,70);

    }


    public function generateImagename($extension){
    
        return uniqid() .'_'. date('Ymdhis') . '.' . $extension;
             
    }

}
