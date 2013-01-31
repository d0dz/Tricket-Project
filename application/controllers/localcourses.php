<?php 

class Localcourses_Controller extends Base_Controller {

	public $restful = true;

	public function get_index() {
		if (Auth::check() && Auth::user()->role_id == 2) {
			$localcourses = DB::table('localcourses')
				->paginate(1, array('title', 'code', 'credit','description','id'));
		return View::make('localcourses.index')
			->with('title', 'รายละเอียดวิชาภายในวิทยาลัยบัญฑิตเอซีย')
			->with('localcourses', Localcourse::all());
		} else {
			return Redirect::to_route('home')
				->with('message', 'คุณไม่มีสิทธิเข้าใช้ในส่วนนี้');
		}
	}
}