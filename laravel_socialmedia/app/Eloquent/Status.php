<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $timestamps = true;
	protected $table = 'users_status';
	protected $guarded = ['id'];

		public function comments() 

	{
		return $this->hasMany(StatusComments::class);

	}



		public function like()

		{
			return $this->hasMany(StatusLikes::class);

		}


}
