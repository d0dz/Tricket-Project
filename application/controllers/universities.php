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
			return Redirect::to_route('new_universities')
				->with_errors($validation)
				->with_input();
		}
	}

	public function get_edit($id) {
		return View::make('universities.edit')
			->with('universitie', Universitie::find($id))
			->with('title', 'Edit University');
	}

	public function put_update() {
		$id = Input::get('id');
		$validation = Universitie::validate(Input::all());

		if ($validation->fails()) {
			return Redirect::to_route('edit_universities', $id)
				->with_errors($validation);
		} else {
			Universitie::update($id, array(
				'name'=>Input::get('name')));
			return Redirect::to_route('universities', $id)
				->with('message', 'University Update Successfully!');
		}
	}

	public function delete_destroy() {
		Universitie::find(Input::get('id'))->delete();
		return Redirect::to_route('universities')
			->with('message', 'University Delete Successfully !');
	}
}