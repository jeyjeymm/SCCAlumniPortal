<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ArticleRequest;

use App\Article;
use App\User;
use App\Department;
use App\SliderObject;

use Auth;
use Image;
use File;

class ArticlesController extends Controller
{

	public function __construct(){
	
	    $this->middleware('auth',["except" => ['index','show']]);
	    $this->middleware('admin_or_editor',["only" => ['create','edit']]);
	    $this->middleware('check_survey',['only' => 'index']);
	    	
	}

    public function index(){

    	$slider_objects = SliderObject::all();

    	$department_id = Auth::check() ? Auth::user()->department->id : 1;

    	$role = Auth::check() ? Auth::user()->role->name : '' ;  	

	    	if ($role === 'admin') {

			    $articles = Article::latest('created_at')->paginate(6);

			}else if ($role === 'editor'){

				$articles = Article::latest('published_at')->departmentArticles($department_id)->paginate(6);

			}else if ($role === 'user'){

				$articles = Article::latest('published_at')->departmentArticles($department_id)->approved()->paginate(6);

			}else{

				$articles = Article::latest('published_at')->publicArticles()->approved()->paginate(6);

			}

   		return view('articles.index',compact('slider_objects','articles','role'));

   	}



   	public function create(){

   		$action = "create";

   		$articleFormData = [

			"buttonText" => "Save Article", 
			"buttonIcon" => "check"

		];

   		return view('articles.create',compact('action','articleFormData'));

   	}



	public function store(ArticleRequest $request){

		$request_data = $request->all();

			if($request->hasFile('image_file')){

				$saveImage = true;

				$image_file = $request_data['image_file'];
				unset($request_data['image_file']);

				$request_data['image_name'] = $this->generateImageName($image_file->getClientOriginalExtension());
				$request_data['mime_type'] = $image_file->getClientMimeType();

			}
		
		$article = new Article($request_data);
			//Auto assign department_id for article
		$article->department()->associate(Auth::user()->department);
			//Auto assign user_id for article
		$article->user()->associate(Auth::user());
		$article->save();

			
			if($saveImage){

				$path = storage_path("app/articles/" . Auth::user()->articles->last()->id ."/");

				$this->saveImage($path, $image_file, $request_data['image_name']);

			}

		return redirect('articles');
	
	}



   	public function show($id){

   		$article = Article::findOrFail($id);

   		$comments = $article->comments()->paginate(10);

   		$author = User::findOrFail($article->user_id);

   		return view('articles.show',compact('article','comments','author'));

   	}



	public function edit($id){

		$article = Article::findOrFail($id);

		$action = "edit";

		$articleFormData = [

			"buttonText" => "Update Article", 
			"buttonIcon" => "save"
			
		];

		return view('articles.edit',compact('article','action','articleFormData'));

	}



	public function update($id, ArticleRequest $request){

		$request_data = $request->all();
		$article = Auth::user()->articles()->findOrFail($id);

			if($request->hasFile('image_file')){

				$image_file = $request_data['image_file'];
				unset($request_data['image_file']);

				$path = storage_path("app/articles/" . $article->id ."/");

				$request_data['image_name'] = $this->generateImageName($image_file->getClientOriginalExtension());
				$request_data['mime_type'] = $image_file->getClientMimeType();

				$this->saveImage($path, $image_file, $request_data['image_name']);

			}

		//$article = Article::findOrFail($id);
		
		$article->update($request_data);

		return redirect('articles');

	}



	public function destroy($id){

		Article::destroy($id);

		return redirect('articles');

	}



	public function approve($id){
	
	    $article = Article::findOrFail($id);
	    $article->status = 'APPROVED';
	    $article->save();

	    return redirect('articles');
	    	
	}



	public function unapprove($id){
	
	    $article = Article::findOrFail($id);
	    $article->status = '';
	    $article->save();

	    return redirect('articles');
	    	
	}



	private function saveImage($path, $image_file, $image_name){

		/*	create a directory for the new article
		*	in the storage path using article_id 
		*	if path does not currently exists
		*/
		if(!file_exists($path)){

			mkdir($path,0777,true);

		} else {

			File::deleteDirectory($path,true);

		}

			// create image object
		$img = Image::make($image_file);

			// prevent possible upsizing
		$img->resize(350, 200, function ($constraint) {
		    $constraint->upsize();
		});
			//save image to path . $filename	
		$img->save($path . $image_name,70);

	}


	public function generateImageName($extension){
	
		return uniqid() . '_' . date('Ymdhis') . '.' . $extension; 	    
	    	
	}

}
