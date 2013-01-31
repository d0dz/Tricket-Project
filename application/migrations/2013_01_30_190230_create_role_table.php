<?php

class Create_Role_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('role', function($table){
			$table->integer('role_id');
			$table->string('role_name',50);
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('role');
	}

}