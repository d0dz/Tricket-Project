<?php 


class Init_Task {

    public function run($arguments)
    {
    	// Role
    	$user_role = array('role_id' => 1, 'role_name' => 'User' );
    	$admin_role = array('role_id' => 2, 'role_name' => 'Admin' );
    	DB::table('role')->insert($user_role);
    	DB::table('role')->insert($admin_role);

    	// Admin User

    	$admin_user = array(
    		'username'=>'admin',
			'password'=>Hash::make('admin1234'),
			'name'=>'Admin',
			'course'=>'-',
			'major'=>'-',
			'year'=>'-',
			'university_id'=>'-',
			'oldcourse'=>'-',
			'oldmajor'=>'-',
			'faculty'=>'-',
			'role_id'=>2);

    	User::create($admin_user);
    }

}