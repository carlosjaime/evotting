<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\VotersRepository;
use App\Repositories\AdminRepository;
use Illuminate\Http\Request;

class VotersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 protected $voting, $userlevel; 
	 
	 public function __construct(VotersRepository $voting , AdminRepository $userlevel) {
		 
		 $this->middleware('auth');
		$this->voting=$voting;
		$this->userlevel=$userlevel;
	 }
	
	 //function to add users vote uses some feature of the admin repository
	public function vote($candid,$candcatid,$voterid)
	{
		$categories=$this->userlevel->allcat();
		//default candidate id displayed
		
		$candidates=$this->userlevel->getcandbyid($candcatid);
		$vote=$this->voting->vote($voterid,$candcatid,$candid);
		
		return view('home',['message'=>$vote,'categories'=>$categories,'candidates'=>$candidates]);
	
		//
	}

		//function to dynamically change candidate base on category 
	 public function viewcat($id){
		 $categories=$this->userlevel->allcat();
		 $candidates=$this->userlevel->getcandbyid($id);
		 return view('home',['candidates'=>$candidates,'categories'=>$categories]);
		 
	 }
	
	
	

}
