<?php 

class Universities_Controller extends Base_Controller {

	public $restful = true;

	public function get_index() {
		if (Auth::check() && Auth::user()->role_id == 2) {
		return View::make('universities.index')
			->with('title', 'รายละเอียดวิชาภายในวิทยาลัยบัญฑิตเอซีย')
			->with('universities', Universitie::all());
		} else {
			return Redirect::to_route('home')
				->with('message', 'คุณไม่มีสิทธิเข้าใช้ในส่วนนี้');
		}
	}

	public function get_new() {
		return View::make('universities.new')
			->with('title', 'Add New University');
	}

	public function post_create() {
		$validation = universitie::validate(Input::all());
		if ($validation->passes()) {
			universitie::create(array(
				'name'=>Input::get('name'),
			));
			return Redirect::to_route('universities')
				->with('message', 'เพิ่มมหาวิทยาลัยเสร็จสิ้น');
		} else {
			return Redirect::to_route('new_universitie')
				->with_errors($validation)
				->with_input();
		}
	}
}