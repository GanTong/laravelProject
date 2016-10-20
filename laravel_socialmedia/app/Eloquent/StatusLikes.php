<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class StatusLikes extends Model
{
     public $timestamps = true;
		protected $table = 'users_status_likes';
		protected $guarded = ['id'];

		public function status()
		{
			return $this->hasMany(StatusComments::class);

		}
}
