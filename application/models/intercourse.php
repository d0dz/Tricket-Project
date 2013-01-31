<?php

class Intercourse extends Basemodel {
	
	public static $table = 'intercourses';

	public static $rules = array(
		'title'=>'required|min:5|max:200',
		'code'=>'required|min:5|max:15',
		'credit'=>'required|min:1|max:1',
		'description'=>'required|min:10|max:1000'
	);

	public function universitie()
	{
		return $this->belongs_to('Universitie');
	}
}