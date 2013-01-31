<?php

class User extends Basemodel {

	public static $rules = array(
		'username'=>'required|unique:users|alpha_dash|between:4,16',
		'password'=>'required|alpha_num|between:4,10|confirmed',
		'password_confirmation'=>'required|alpha_num|between:4,10'
	);
}