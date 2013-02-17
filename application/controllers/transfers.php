<?php

class Transfers_Controller extends Base_Controller {
	
	public $restful = true;

	public function get_index() {


		if(Auth::user() && Auth::user()->role_id == 1){
			return Redirect::to_route('transfers_search');
		}
		return View::make('transfers.index')
			->with('title', 'ระบบเทียบโอนหน่วยกิต');
	}

	public function get_detail($id = null) {
		return View::make('transfers.detail')
			->with('title', 'รายละเอียดวิชา')
			->with('intercourse', Intercourse::find($id));

	}


	public function get_search() {
		return View::make('transfers.results')
			->with('title', 'ค้นหารายวิชานอก');
	}

	public function post_search() {
		$keyword = Input::get('keyword');
	 	
		if (empty($keyword)) {
			return Redirect::to_route('home')
				->with('message', 'ไม่พบการค้นหา');
		}

		$interresults = DB::table('intercourses')
			->join('universities', 'intercourses.university_id', '=', 'universities.id')
			->where('title','LIKE', '%' .$keyword. '%')
			->or_where('code','LIKE', '%' .$keyword. '%')
			->get();

		return View::make('transfers.results')
			->with('title','Search Result')
			->with('intercourses',$interresults);
			
	}


	public function get_generate()
	{
		

		return View::make('transfers.generatedoc');
	}



}