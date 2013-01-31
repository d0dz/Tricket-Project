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

	public function get_login() {
		return View::make('users.login')
			->with('title', 'Login เพื่อเข้าสู่การเทียบโอนหย่วยกิต');
	}

	public function post_login() {
		$user = array(
			'username'=>Input::get('username'),
			'password'=>Input::get('password')
		);

		if (Auth::attempt($user)) {
			return Redirect::to_route('home')
				->with('message', 'คุณเข้าสู่ระบบเทียบโอนเรียบร้อย');
		} else {
			return Redirect::to_route('login')
				->with('message', 'Username or Password ผิด กรุณา Login ใหม่อีกครั้ง')
				->with_input();
		}
	}

	public function get_logout() {
		if (Auth::check()) {
			Auth::logout();
			return Redirect::to_route('login')
				->with('message', 'คุณออกจากระบบ');
		} else {
			return Redirect::to_route('home');
		}
	}
}