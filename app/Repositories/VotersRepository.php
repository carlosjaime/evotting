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
		//loop through result and return id
		foreach($checkvote as $checkvote){
		return $checkvote->id;			
		}
	}
	
	//get candidate by category
	public function get_all_candidate_by_category($catid){
		
		$getcandidate=DB::table('candidates')
		->where('category_id','=',$catid)
		->get();
		
       return $getcandidate;
	}
	
	//get candidate by id and return number of votes
	public function getcandidatenumofvote($candid){
		
	  $candidate=Candidate::where('id',$candid)->get();
	  foreach($candidate as $candidate){
	  return $candidate->num_of_vote;
		  
	  }
	}
	
	//vote if vote present else display alreay Voted message
	public function vote($voterid,$categoryid,$candidateid){
		
		$checkvote=VotersRepository::checkvote($voterid,$categoryid);
		
		//check if user vote already exist in each category
		if($checkvote == ''){
			
			//get candidate
			$existedvote=VotersRepository::getcandidatenumofvote($candidateid);
			
			//add vote to candidate
			$addvote=Candidate::where('id',$candidateid)
			->update(['num_of_vote'=>($existedvote+1)]);
			
			//save imformation to Voted for future confirmation that user has already voted
			Voted::create(['user_id'=>$voterid,'category_id'=>$categoryid]);
			return 'Successfully Voted';
            
	  	}
		else{
	
			return 'You Have Already Voted in this category';
		}
		
	
	}
		
}