<?php

class User extends Basemodel {

	public static $rules = array(
		'username'=>'required|unique:users|alpha_dash|max:11',
		'password'=>'required|alpha_num|between:4,10|confirmed',
		'password_confirmation'=>'required|alpha_num|between:4,10',
		
	);

	public function transferlist()
	{
		return $this->has_many_and_belongs_to('Coursemapping','user_mapping');
	}

	public function user_mapping()
	{
		return $this->has_many('Usermapping');
	}

	public function universitie(){
		return $this->belongs_to('Universitie','university_id');
	}

	public function intercoursedetail(){
		return $this->has_many('IntercourseDetail');
	}
}