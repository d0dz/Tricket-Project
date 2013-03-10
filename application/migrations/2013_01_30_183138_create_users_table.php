<?php

class Create_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->text('username',11);
			$table->string('password',100);
			$table->integer('university_id');
			$table->text('name',100);
			$table->text('course',50);
			$table->text('major',50);
			$table->integer('year');
			$table->text('oldcourse',50);
			$table->text('oldmajor',50);
			$table->text('faculty',50);
			$table->integer('role_id');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}