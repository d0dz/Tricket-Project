<?php

class Create_Intercoursedetails_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('intercoursedetails', function($table){
			$table->increments('id');
			$table->text('title');
			$table->integer('credit');
			$table->text('description');
			$table->integer('correct');
			$table->integer('user_id');
			$table->integer('intercourse_id');
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
		Schema::drop('intercoursedetails');
	}

}