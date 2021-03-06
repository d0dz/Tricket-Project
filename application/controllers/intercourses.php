<?php 

class Intercourses_Controller extends Base_Controller {

	public $restful = true;

	public function get_index() {
		if (Auth::check() && ( Auth::user()->role_id == 2 || Auth::user()->role_id == 1)) {

			$intercourses = IntercourseDetail::with(array('Intercourse'))->where('user_id','=',Auth::user()->id)->get();
			// $intercourses = DB::table('intercourses')
			// 	->left_join('universities', 'intercourses.university_id', '=', 'universities.id')
			// 	->paginate(30, array('title', 'code', 'credit','description','intercourses.id','universities.name'));
			// ->get(array('title', 'code', 'credit','description','intercourses.id','universities.name'));

		return View::make('intercourses.index')
			->with('title', 'รายละเอียดวิชาภายนอกวิทยาลัยบัญฑิตเอเซีย')
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
			
			$inter = Intercourse::where('code', '=', Input::get('code'))
			->where('university_id','=',Auth::user()->university_id)
			->first();
			if(!isset($inter)){
				$inter = Intercourse::create(array(
				'code'=>Input::get('code'),
				'university_id'=>Input::get('university_id'),
				'approve'=>0
				));	
			}

			IntercourseDetail::create(array(
				'title'=>Input::get('title'),
				'credit'=>Input::get('credit'),
				'description'=>Input::get('description'),
				'correct'=>0,
				'user_id'=>Auth::user()->id,
				'intercourse_id'=>$inter->id
				));
			

			$mapid = Input::get('mapid', array());

			foreach ($mapid as $id) {
				DB::table('course_mapping')->insert(
						array(
							'intercourse_id' => $inter->id,
							'localcourse_id' => $id,
							'approve'=>0
							)
					);
			}
			

			return Redirect::to_route('intercourses')
				->with('message', 'เพิ่มรายวิชาเสร็จสิ้น');
		} else {
			return Redirect::to_route('new_intercourses')
				->with_errors($validation)
				->with_input();
		}
	}

	public function get_view($id = null) {
	 	return View::make('intercourses.view')
	        ->with('title', 'รายละเอียดวิชา')
	        ->with('intercourse',Intercourse::find($id));
}
	

	public function get_edit($id) {
		$intercourses = DB::table('intercourses')
			->join('universities', 'intercourses.university_id', '=', 'universities.id');
		$universities = Universitie::all();
		$universities_data = array();
		foreach ($universities as $universities){
			$universities_data[$universities->id] = $universities->name;
		}
		return View::make('intercourses.edit')
			->with('intercourse', DB::table('intercourses')
			->where('id', '=', $id)->first())
			->with('title', 'Edit Intercourse')
			->with('universities', $universities_data);
	}

	public function put_update() {
		$id = Input::get('id');
		$validation = Intercourse::validate(Input::all());

		if ($validation->fails()) {
			return Redirect::to_route('edit_intercourses', $id)->with_errors($validation);
		} else {
			Intercourse::update($id, array(
				'code'=>Input::get('code'),
				'title'=>Input::get('title'),
				'credit'=>Input::get('credit'),
				'description'=>Input::get('description'),
				'university_id'=>Input::get('university_id')
			));
			return Redirect::to_route('intercourse', $id)
				->with('message', 'Intercourse Update Successfully!');
		}
	}

	public function delete_destroy() {
		IntercourseDetail::find(Input::get('id'))->delete();
		// DB::table('course_mapping')->where('intercourse_id','=',Input::get('id'))->delete();
		return Redirect::to_route('intercourses')
			->with('message', 'Intercourse Delete Successfully !');
	}
}