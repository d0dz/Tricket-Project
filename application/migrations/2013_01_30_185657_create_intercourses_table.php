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
			$table->integer('code');
			$table->text('title');
			$table->integer('credit');
			$table->text('description');
			$table->integer('university_id');
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
		Schema::drop('intercourse');
	}

}