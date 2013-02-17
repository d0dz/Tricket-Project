<?php

class Create_Crossmapping_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_mapping', function($table) {
			$table->increments('id');
			$table->integer('localcourse_id');
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
		Schema::drop('course_mapping');
	}

}