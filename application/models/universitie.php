<?php

class Universitie extends Basemodel {
	
	public static $table = 'universities';

	public static $rules = array(
		'name'=>'required|min:5|max:200',
	);

	public function intercourses() {
		return $this->has_many('Intercourse');
	}
}