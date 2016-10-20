<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class StatusComments extends Model
{
        public $timestamps = true;
		protected $table = 'users_status_comments';
		protected $guarded = ['id'];

		public function status()
		{
			return $this->hasMany(StatusComments::class);

		}
}
