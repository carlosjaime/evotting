<?php
namespace App\Repositories;



interface VotersRepoInterface{
	public function checkvote($voterid,$categoryid);
	public function get_all_candidate_by_category($categoryid);
	public function getcandidatenumofvote($candidateid);
	public function vote($voterid,$candidateid,$categoryid);
}

