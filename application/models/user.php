<?php

class User extends Basemodel {

	public static $rules = array(
		'username'=>'required|unique:users|alpha_dash|between:4,16',
		'password'=>'required|alpha_num|between:4,10|confirmed',
		'password_confirmation'=>'required|alpha_num|between:4,10'
	);

	public function transferlist()
	{
		return $this->has_many_and_belongs_to('Coursemapping','user_mapping');
	}

	public function user_mapping()
	{
		return $this->has_many('Usermapping');
	}
}