<?php

class Create_Intercourses_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('intercourses', function($table){
			$table->increments('id');
			$table->text('code');
			$table->integer('university_id');
			$table->integer('approve');
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
		Schema::drop('intercourses');
	}

}