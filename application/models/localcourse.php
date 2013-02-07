<?php

class Localcourse extends Basemodel {
	
	public static $table = 'localcourses';

	public static $rules = array(
		'title'=>'required|min:5|max:200',
		'code'=>'required|min:6|max:6',
		'credit'=>'required|min:1|max:1',
		'description'=>'required|min:10|max:1000'
	);

	public static function search($keyword) {
		return static::where('title', 'LIKE', '%' .$keyword. '%');
	}
}