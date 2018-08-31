<?php
	namespace App\Models;
	use Illuminate\Database\Eloquent\Model;

	class Login extends Model
	{
		public $timestamps 		= false;
		protected $primaryKey 	= 'id_login';
		protected $table		= 'login';

	}
