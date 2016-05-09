<?php

	namespace App\Repositories;
	use App\Voted;
	use App\Candidate;
	use App\Category;
	use App\User;
	use DB;
	use App\Repositories\VotersRepoInterface;

class VotersRepository implements VotersRepoInterface {
	
	//check if user has already voted for the candidate in each category
	public function checkvote($voterid,$categoryid){
		
		$checkvote=Voted::where('user_id',$voterid)
		->where('category_id',$categoryid)
		->get();
		return $checkvote;
	}
	
	//get voted id from voted table
	public function getvotedid($voterid,$categoryid){
		
		$checkvote=VotersRepository::checkvote($voterid,$categoryid);
		//loop through result and return id
		foreach($checkvote as $checkvotes){
		return $checkvotes->id;		
		}
		
	}
	
	//get candidates by category
	public function get_all_candidate_by_category($catid){
		
		$getcandidate=DB::table('candidates')
		->where('category_id','=',$catid)
		->get();
	     return $getcandidate;
	}
	
	//get candidate by id 
	public function getcandidatebyid($candid){
		
	  $candidate=Candidate::where('id',$candid)->get();
	  return $candidate;
	}
	
	//get candidate number of vote
	public function num_of_vote($candid) {
		
		 $candidate=VotersRepository::getcandidatebyid($candid);
		 foreach($candidate as $candidate){
	     return $candidate->num_of_vote;
		  }
	}
	
	//get candidate id
	public function get_candidate_id($candidateid){
		$candid=VotersRepository::getcandidatebyid($candidateid);
		foreach($candid as $id){
			return $id->id;
		}
		
	}
	
	//get category by id
	public function getsinglecategory($categoryid){
		
		$category=Category::where('id',$categoryid)->get();
		return $category;	
	}
	
	//get category by id and return category id
	public function get_single_category_id($categoryid){
		$categoryid=VotersRepository::getsinglecategory($categoryid);
		foreach($categoryid as $id){
			
			return $id->id;
		}
	}
	
	//get  voter detail by id
	public function getvoterbyid($voterid){
		
		$voterdetail=User::where('id',$voterid)->get();;
		return $voterdetail;
	}
	
	//get voter id
	public function getvoterid($voterid){
		$votersid=VotersRepository::getvoterbyid($voterid);
		foreach ($votersid as $id){
			return $id->id;
		}
		
	}
	//check the integrity of url value
	public function checkintegrity($voterid,$categoryid,$candidateid){
		
		$catid=VotersRepository::get_single_category_id($categoryid);
		$candid=VotersRepository::get_candidate_id($candidateid);
		$votid=VotersRepository::getvoterid($voterid);
		if($voterid!=$votid || $categoryid!=$catid || $candid != $candid ){
			return 'invalid';
		}
		else {
			return 'valid';
		}
		
	}
	
	
	//vote if vote present else display alreay Voted message
	public function vote($voterid,$categoryid,$candidateid){
		
		$checkintegrity=VotersRepository::checkintegrity($voterid,$categoryid,$candidateid);
		
		if($checkintegrity=='valid') {
		$checkvote=VotersRepository::getvotedid($voterid,$categoryid);
		
		//check if user vote already exist in each category
		if($checkvote == ''){
			
			//get number of vote
			$numberofvote=VotersRepository::num_of_vote($candidateid);
			
			//add vote to candidate
			$addvote=Candidate::where('id',$candidateid)
			->update(['num_of_vote'=>($numberofvote+1)]);
			
			//save imformation to Voted for future confirmation that user has already voted
			Voted::create(['user_id'=>$voterid,'category_id'=>$categoryid]);
			return 'Successfully Voted';
            
	  	}
		else{
	
			return 'You Have Already Voted in this category';
		}
		
		}
		else {
			
			return 'Because Error Url Manipulation detected, Click the Category tab to Vote';
		}
	}
		
}
