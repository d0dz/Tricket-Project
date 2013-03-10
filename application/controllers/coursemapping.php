<?php

class Coursemapping_Controller extends Base_Controller
{

	public $restful = true;

	public function post_approve(){

		$mapping_id = Input::get('id');
		$coursemapping = Coursemapping::find($mapping_id);
		$coursemapping->approve = 1;
		$coursemapping->save();


		$intercourse = $coursemapping->intercourse;
		$intercourse->approve = 1;
		$intercourse->save();

		return Redirect::to_route('admin')
				->with('message', 'Approve เรียบร้อยจ๊ะ');
	}

}
