<?php 

// admin actions repository

namespace App\Repositories;

 use App\Category;
 use App\Candidate;
 use App\addvoter;
 use App\Repositories\AdminRepoInterface;
 use DB;



class AdminRepository implements AdminRepoInterface{
	
	//get allcategory
	public function allcat(){

	    $categories=Category::all();
		return $categories;
	}
	
	//get candidatebyid used querybuilder
	public function getcandbyid($id){
		
		    $candidates = DB::table('categories')
            ->join('candidates', 'candidates.category_id', '=', 'categories.id')
			->where('categories.id','=',$id)
            ->select('candidates.name as candname','candidates.category_id as candcatid','candidates.id as candid', 'candidates.image as image', 'candidates.num_of_vote as numvotes', 'categories.name as catname')
			->orderBy('num_of_vote','decs')
            ->paginate(6);
			return $candidates;
	}
	
	//add candidates to candidate table in database
	public function candcreate(array $data){
		
		Candidate::create($data);
		return 'Successfully Added Candidate';
		
	}
	
	// add voters to database
	public function addvoters(array $data){	
	addvoter::create($data);
		return 'successfully added voter';
	}
	
}