<?php

class Create_Crossmapping_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('crossmapping', function($table) {
			$table->integer('local_id');
			$table->integer('inter_id');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('crossmapping');
	}

}