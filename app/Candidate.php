<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model {
 
 protected $table='candidates';
	//
  protected $fillable=['name','image','category_id'];
}
