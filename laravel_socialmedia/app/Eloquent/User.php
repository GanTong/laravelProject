<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = true;
	protected $table = 'users';
	protected $guarded = ['id'];


	public function getAvatar() 

	{
		return "http://www.gravatar.com/avatar/". md5($this->email).'?d=mm';

	}

}
