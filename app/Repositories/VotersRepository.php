<?php

	namespace App\Repositories;
	use App\Voted;
	use App\Candidate;
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
	
	//get all candidates by category
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
	
	
	//vote if vote present else display alreay Voted message
	public function vote($voterid,$categoryid,$candidateid){
		
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
		
}
