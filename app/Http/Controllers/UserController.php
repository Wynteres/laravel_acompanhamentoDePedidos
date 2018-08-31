<?php
namespace App\Http\Controllers;

use Dialer\Models\Login;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$where = array(
            'id_user'   => Auth::user()->id,
            'status'    => 1
        );

        $Login = Login::select('id_company', 'level')->where($where)->first();

        if($Login->level >= 2)
        {
        	return view('user/user_management')->with('permission_error', true)->with('login', $Login);
        }
        else
        {
        	return view('user/user_management')->with('permission_error', false)->with('login', $Login);
        }
	}
}