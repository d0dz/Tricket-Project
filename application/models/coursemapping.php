<?php

class Coursemapping extends Basemodel {

	public static $table = 'course_mapping';


	public function intercourse()
	{
		return $this->belongs_to('Intercourse');
	}

	public function localcourse()
	{
		return $this->belongs_to('Localcourse');
	}

	public function user_mapping()
	{
		return $this->has_many('Usermapping');
	}
}