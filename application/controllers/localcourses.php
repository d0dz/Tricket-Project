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

	public function get_edit($id) {
		return View::make('localcourses.edit')
			->with('localcourse', DB::table('localcourses')
			->where('id', '=', $id)->first())
			->with('title', 'Edit localcourse'); 
	}

	public function put_update() {
		$id = Input::get('id');
		$validation = Localcourse::validate(Input::all());

		if ($validation->fails()) {
			return Redirect:: to_route('edit_localcourse', $id)
				->with_errors($validation);
		} else {
			Localcourse::update($id, array(
				'code'=>Input::get('code'),
				'title'=>Input::get('title'),
				'credit'=>Input::get('credit'),
				'description'=>Input::get('description')
			));
			return Redirect::to_route('localcourse', $id)
				->with('message', 'Localcourse Update Successfully!');
		}
	}

	public function delete_destroy() {
		Localcourse::find(Input::get('id'))->delete();
		return Redirect::to_route('localcourses')
			->with('message', 'Localcourse Delete Successfully !');
	}

	public function get_results($keyword) {
		return View::make('localcourses.results')
			->with('title', 'ค้นหารายวิชาในวิทยาลัยบัณฑิตเอเซีย')
			->with('localcourses', Localcourse::search($keyword));
	}

	public function post_search() {
		$keyword = Input::get('keyword');
	 	
		if (empty($keyword)) {
			return Redirect::to_route('home')
				->with('message', 'ไม่พบการค้นหา');
		}

		$localresults = DB::table('localcourses')
			->where('title','LIKE', '%' .$keyword. '%')
			->or_where('code','LIKE', '%' .$keyword. '%')
			->get();
			
		$interresults = DB::table('intercourses')
			->join('universities', 'intercourses.university_id', '=', 'universities.id')
			->where('title','LIKE', '%' .$keyword. '%')
			->or_where('code','LIKE', '%' .$keyword. '%')
			->get();

		return View::make('localcourses.results')
			->with('title','Search Result')
			->with('localcourses',$localresults)
			->with('intercourses',$interresults);
			
	}
}