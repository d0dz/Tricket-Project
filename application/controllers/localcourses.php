<?php 

class Localcourses_Controller extends Base_Controller {

	public $restful = true;

	public function get_index() {
		if (Auth::check() && Auth::user()->role_id == 2) {
			$localcourses = DB::table('localcourses')
				->order_by('created_at', 'asc')
				->paginate(30);
		return View::make('localcourses.index')
			->with('title', 'รายละเอียดวิชาภายในวิทยาลัยบัญฑิตเอซีย')
			->with('localcourses', $localcourses);
		} else {
			return Redirect::to_route('home')
				->with('message', 'คุณไม่มีสิทธิเข้าใช้ในส่วนนี้');
		}
	}

	public function get_new() {
		return View::make('localcourses.new')
			->with('title', 'Add New Localcourses');
	}

	public function post_create() {
		$validation = Localcourse::validate(Input::all());
		if ($validation->passes()) {
			Localcourse::create(array(
				'code'=>Input::get('code'),
				'title'=>Input::get('title'),
				'credit'=>Input::get('credit'),
				'description'=>Input::get('description')
			));
			return Redirect::to_route('localcourses')
				->with('message', 'เพิ่มรายวิชาเสร็จสิ้น');
		} else {
			return Redirect::to_route('new_localcourses')
				->with_errors($validation)
				->with_input();
		}
	}

	public function get_view($id) {
		return View::make('localcourses.view')
			->with('title', 'รายละเอียดวิชา')
			->with('localcourse', Localcourse::find($id));
	}
}