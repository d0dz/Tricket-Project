<?php

class Create_Localcourses_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('localcourses', function($table) {
			$table->increments('id');
			$table->integer('code');
			$table->text('title');
			$table->integer('credit');
			$table->text('description');
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
		Schema::drop('localcourses');
	}

}