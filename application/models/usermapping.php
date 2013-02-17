<?php

class Usermapping extends Basemodel {
	public static $table = 'user_mapping';

	public function user()
	{
		return $this->belongs_to('User');
	}

	public function course_mapping()
	{
		return $this->belongs_to('Coursemapping','coursemapping_id');
	}
}