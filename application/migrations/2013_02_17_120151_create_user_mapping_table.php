<?php

class Create_User_Mapping_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_mapping', function($table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('coursemapping_id');
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
		Schema::drop('user_mapping');
	}

}