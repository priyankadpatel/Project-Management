<?php

namespace Prego;

use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
      protected $fillable = ['username', 'email', 'password'];
		public function getAvatarUrl()
		{
		        return "http://www.gravatar.com/avatar/" . md5(strtolower(trim($this->email))) . "?d=mm&s=40";
		}  
      
}
