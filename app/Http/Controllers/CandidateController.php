<?php namespace App\Http\Controllers;

use App\Repositories\AdminRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class CandidateController extends Controller {


	protected $adminaction;
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 public function __construct(AdminRepository $adminaction){
		 
		 $this->middleware('auth');
		 $this->adminaction=$adminaction;
	 }
	 

	
	public function index(){
		
		$categories=$this->adminaction->allcat();
		return view('addcandidate',['categories'=>$categories]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	
	public function create(Request $request)
	{
		try{
		$this->validate($request , ['name' => 'required|max:255','image'=>'required|mimes:png,jpg,jpeg','category' =>'required|max:2' ]);
		$filename=rand(1111,5555).'.'.$request->file('image')->getClientOriginalExtension();
		
		if(is_dir('upload')){
			
		}
		else{
		mkdir('upload');
		}
		$request->file('image')->move('upload',$filename);
		$addcandidate=$this->adminaction->candcreate(['name'=>$request->name,'image'=>$filename,'category_id'=>$request->category]);
		$categories=$this->adminaction->allcat();
		return view('addcandidate',['message'=>$addcandidate,'categories'=>$categories]);
	}
	
	catch(QueryException $e){
		$categories=$this->adminaction->allcat();
		return view('addcandidate',['message'=>'Some Error Occurred','categories'=>$categories]);

	}
	}

}
