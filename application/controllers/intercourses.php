<?php 

class Intercourses_Controller extends Base_Controller {

	public $restful = true;

	public function get_index() {
		if (Auth::check() && Auth::user()->role_id == 2) {
			$intercourses = DB::table('intercourses')
				->join('universities', 'intercourses.university_id', '=', 'universities.id')
				->paginate(20, array('title', 'code', 'credit','description','intercourses.id','universities.name'));
		return View::make('intercourses.index')
			->with('title', 'รายละเอียดวิชาภายนอกวิทยาลัยบัญฑิตเอซีย')
			->with('intercourses', Intercourse::all());
		} else {
			return Redirect::to_route('home')
				->with('message', 'คุณไม่มีสิทธิเข้าใช้ในส่วนนี้');
		}
	}
}