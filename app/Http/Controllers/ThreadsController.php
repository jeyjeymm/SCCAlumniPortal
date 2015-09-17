<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ThreadRequest;

use App\Thread;

use Auth;

class ThreadsController extends Controller
{

    public function __construct(){
    
        $this->middleware('auth',['except' => ['index','show']]);
            
    }

    public function index(){

        if (Auth::check()) {

            $threads = Thread::departmentThreads(Auth::user()->department->id)->paginate(20);

        } else {

            $threads = Thread::publicThreads()->paginate(20);

        }

    	return view('threads.index',compact('threads'));

    }


    public function store(ThreadRequest $request){
    
        $thread = new Thread($request->all());
        $thread->user()->associate(Auth::user());
        $thread->department()->associate(Auth::user()->department);
        $thread->save();

        return redirect('threads');
        	
    }


    public function show($id){

    	$thread = Thread::findOrFail($id);

    	$comments = $thread->comments()->paginate(20);

    	return view('threads.show',compact('thread','comments'));

    }


    public function edit($id){
    
        $thread = Thread::findOrFail($id);

        return $thread;

    }


    public function update($id,ThreadRequest $request){

    	if (Auth::user()->role->name === 'admin') {
    
	        $thread = Thread::findOrFail($id);
	        $thread->update($request->all());

	    }else{

	    	$thread = Auth::user()->threads()->findOrFail($id);
	        $thread->update($request->all());

	    }

        return redirect('threads');
        	
    }


    public function destroy($id){

    	Thread::destroy($id);
    
        return url('threads');
        	
    }

}
