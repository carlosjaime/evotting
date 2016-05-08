<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\addvoter;
use App\Repositories\AdminRepository;
class AdminController extends Controller {

	
	 //injecting the adminrepository
	 protected $adminaction;
	 
	public function __construct(AdminRepository $adminaction)
	{
		$this->middleware('auth');
		$this->adminaction=$adminaction;
	}

    //show application dashboard to users
	public function index()
	{    
	    //gets all categories from AdminRepository
		$categories=$this->adminaction->allcat();
		
		//display default candidate list 
		$candidates=$this->adminaction->getcandbyid(1);
		return view('home',['categories'=>$categories,'candidates'=>$candidates]);
	}
	
	//add voters to the system from admin panel 
	public function create(Request $request)
	
	  {
		  //validate user input
		$this->validate($request , ['name' => 'required|max:255','email'=>'required|max:255' ,'password'=>'required|max:12']);
		$addvoter=$this->adminaction->addvoters(['name'=>$request->name,'email'=>$request->email,'password'=>bcrypt($request->password)]);
		return view('home',['message'=>$addvoter]);
	}

}
