<?php
namespace App\Repositories;



interface VotersRepoInterface{
	public function checkvote($voterid,$categoryid);
	public function get_all_candidate_by_category($categoryid);
	public function getcandidatebyid($candid);
	public function num_of_vote($candid);
	public function vote($voterid,$candidateid,$categoryid);
	public function getvotedid($voterid,$categoryid);
	public function get_single_category_id($categoryid);
	public function getsinglecategory($categoryid);
	public function get_candidate_id($candidateid);
}



