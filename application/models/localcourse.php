<?php

class Localcourse extends Basemodel {
	
	public static $table = 'localcourses';

	public static $rules = array(
		'title'=>'required|min:5|max:200',
		'code'=>'required|min:6|max:7',
		'credit'=>'required|min:1|max:1',
		'description'=>'required|min:10|max:1000'
	);

	public function transferable_courses()
	{
		return $this->has_many_and_belongs_to('Intercourse','course_mapping');
	}

	public function coursemapping()
	{
		return $this->has_many('Coursemapping');
	}
}