<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class addvoter extends Model {

	//
	protected $table='voters';
	
	protected $fillable=['name','email','password'] ;

}
