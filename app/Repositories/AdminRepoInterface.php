<?php
namespace App\Repositories;

interface AdminRepoInterface {
	public function allcat();
	public function getcandbyid($id);
	public function candcreate(array $data);
	public function addvoters(array $data);
		
}