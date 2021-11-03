<?php
use System\Database\Schema\BluePrint;
use System\Database\Schema\Schema;


 class CreateUsersTable
 { 
		/**
		* Run the Migrations
		*
		* @return void
		*/ 
		public function up()
		{

			Schema::create('users', function (BluePrint $table) {

				$table->bigIncrements('id');
				$table->string('first_name', 30);
				$table->string('last_name', 35);
				$table->string('username')->unique();
				$table->string('account_type')->default('user');
				$table->string('password');
				$table->string('img_url')->nullable();
				$table->timestamps(); 
			}); 

		} 

		/**
		* Modify Migrations
		*
		* @return void
		*/ 
		public function alter()
		{

			Schema::modify('users', function (BluePrint $table) {

				 
			}); 

		} 

		/**
		* Reverse the migrations.
		*
		* @return void
		*/

		public function down()
		{

			Schema::dropIfExists('users');
     
		} 

}