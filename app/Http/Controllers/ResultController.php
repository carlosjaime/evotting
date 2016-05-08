<?php namespace App\Http\Controllers;
     
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\AdminRepository;
use Illuminate\Http\Request;
class ResultController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 
	 */
	 protected $adminaction;
	 
	 public function __construct(AdminRepository $adminaction){
		 
		 $this->middleware('auth');
		 $this->adminaction=$adminaction;
	 }
		 
	 //index view for result page 
	 //get all candidate with their individual number of votes 
	public function index(Request $request)
	{
		if($request->cat){
			$id=$request->cat;
		}
		else{
			
			$id=1;
		}
		
		$candidates=$this->adminaction->getcandbyid($id);
		$categories=$this->adminaction->allcat();
		$index=1;
		return view('viewresult',['candidates'=>$candidates,'categories'=>$categories,'index'=>$index]);
		//
	}	
	
}
