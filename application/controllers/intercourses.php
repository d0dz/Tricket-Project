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
			->with('intercourses', $intercourses);
		} else {
			return Redirect::to_route('home')
				->with('message', 'คุณไม่มีสิทธิเข้าใช้ในส่วนนี้');
		}
	}

	public function get_new() {
		$universities = Universitie::all();
		$universities_data = array();
		foreach ($universities as $universities){
			$universities_data[$universities->id] = $universities->name;
		}
		return View::make('intercourses.new')
			->with('title', 'Add New Intercourses')
			->with('universities', $universities_data);
	}

	public function post_create() {
		$validation = Intercourse::validate(Input::all());
		if ($validation->passes()) {
			Intercourse::create(array(
				'code'=>Input::get('code'),
				'title'=>Input::get('title'),
				'credit'=>Input::get('credit'),
				'description'=>Input::get('description')
			));
			return Redirect::to_route('intercourses')
				->with('message', 'เพิ่มรายวิชาเสร็จสิ้น');
		} else {
			return Redirect::to_route('new_intercourses')
				->with_errors($validation)
				->with_input();
		}
	}
}