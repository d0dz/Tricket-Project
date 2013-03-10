<?php

class Users_Controller extends Base_Controller {

	public $restful = true;

	public function get_index() {
		if (Auth::check() && (Auth::user()->role_id==2)){
			$coursemapping = Coursemapping::where('approve','=',0)->get();

			return View::make('users.admin')
				->with('title','รอการ approve')
				->with('coursemapping',$coursemapping);
		}
	}

	public function get_new() {
		$universities = Universitie::all();
		$universities_data = array();
		foreach ($universities as $universities){
			$universities_data[$universities->id] = $universities->name;
		}
			
		return View::make('users.new')
			->with('title', 'สมัครสมาชิกเพื่อเทียบโอนหน่วยกิต')
			->with('universities', $universities_data);
	}

	public function post_create() {
		$validation = User::validate(Input::all());

		if ($validation->passes()) {
			User::create(array(
				'username'=>Input::get('username'),
				'password'=>Hash::make(Input::get('password')),
				'name'=>Input::get('name'),
				'course'=>Input::get('course'),
				'major'=>Input::get('major'),
				'year'=>Input::get('year'),
				'university_id'=>Input::get('university_id'),
				'oldcourse'=>Input::get('oldcourse'),
				'oldmajor'=>Input::get('oldmajor'),
				'faculty'=>Input::get('faculty'),
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

	public function get_transferlist() {

		$usermapping = Usermapping::with(array('course_mapping'))->where('user_id','=',Auth::user()->id)->get();



		return View::make('users.transferlist')
			->with('usermapping',$usermapping)
			->with('title', 'วิชาที่จะเทียบโอน');

	}

	public function get_transferlistadd($course_mapping_id){
		Usermapping::create(array(
				'coursemapping_id'=>$course_mapping_id,
				'user_id'=>Auth::user()->id
			));

		return Redirect::to_route('transfers_search')
				->with('message', 'เพิ่มเรียบร้อย');
	}



	

	public function delete_destroy() {
		
		DB::table('user_mapping')->where('id','=',Input::get('id'))->delete();
		return Redirect::to_route('transferlist')
			->with('message', 'Delete Successfully !');
	}
}