<?php

class Api_Controller extends Base_Controller
{

	public $restful = true;

	public function get_index()
	{
		return Response::json(array('name' => 'Batman'));
	}

	public function post_searchcourse()
	{
		$keyword = Input::get('keyword');

		$interresults = Intercourse::with('intercoursedetail')
			->where('code','LIKE', '%' .$keyword. '%')
			->where('university_id','=',Auth::user()->university_id)
			->where('approve','=',1)
			->get();

		// $interresults = DB::table('intercourses')
		// 	->join('universities', 'intercourses.university_id', '=', 'universities.id')
		// 	->where('title','LIKE', '%' .$keyword. '%')
		// 	->or_where('code','LIKE', '%' .$keyword. '%')
		// 	->get();

		return Response::eloquent($interresults);
	}

	public function post_searchlocalcourse()
	{
		$keyword = Input::get('keyword');

		$localresults = DB::table('localcourses')
			->where('title','LIKE', '%' .$keyword. '%')
			->or_where('code','LIKE', '%' .$keyword. '%')
			->get();
		
		return Response::json($localresults);
	}
	

}
