<?php

class Transfers_Controller extends Base_Controller {
	
	public $restful = true;

	public function get_index() {

		return View::make('transfers.index')
			->with('title', 'ระบบเทียบโอนหน่วยกิต');
	}
}