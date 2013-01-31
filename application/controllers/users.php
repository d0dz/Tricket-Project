<?php

class Users_Controller extends Base_Controller {

	public $restful = true;

	public function get_new() {
		return View::make('users.new')
			->with('title', 'สมัครสมาชิกเพื่อเทียบโอนหน่วยกิต');
	}

	public function post_create() {
		$validation = User::validate(Input::all());

		if ($validation->passes()) {
			User::create(array(
				'username'=>Input::get('username'),
				'password'=>Hash::make(Input::get('password')),
				'role_id'=>1
			));

			$user = User::where_username(Input::get('username'))
			->first();
			Auth::login($user);

			return Redirect::to_route('home')
				->with('message', 'การสมัครสมาชิกเสร็จสมบูรณ์ คุณ ('.Auth::user()
				->username.') กำลังเข้าสู่ระบบ');
		} else {
			return Redirect::to_route('register')
			->with_errors($validation)
			->with_input();
		}
	}
}