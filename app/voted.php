<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class voted extends Model {

	protected $table='voteds';
	protected $fillable=['user_id','category_id'];

}
