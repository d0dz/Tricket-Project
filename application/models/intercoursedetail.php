<?php

class IntercourseDetail extends Basemodel {
	public static $table = 'intercoursedetails';

	public function user(){
		return $this->belongs_to('User');
	}

	public function intercourse(){
		return $this->belongs_to('Intercourse');
	}
}