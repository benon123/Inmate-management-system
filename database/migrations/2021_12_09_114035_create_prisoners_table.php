<?php
use System\Database\Schema\BluePrint;
use System\Database\Schema\Schema;


 class CreatePrisonersTable
 { 
		/**
		* Run the Migrations
		*
		* @return void
		*/ 
		public function up()
		{

			Schema::create('prisoners', function (BluePrint $table) {

				$table->id();
				$table->string('p_id', 11)->unique();
				$table->string('fname', 30);
				$table->string('lname', 30);
				$table->date('dob');
				$table->integer('age', true);
				$table->enum('gender', ["M", "F"]);
				$table->string('facility');
				$table->string('rehub')->nullable();
				$table->string('crime');
				$table->date('date_joined')->default(date("Y-m-d"));
				$table->date('release_date');
				$table->string('transfered_from')->nullable();
				$table->string('cell_no');
				$table->string('inmate_id')->nullable();

			}); 

		} 

		/**
		* Modify Migrations
		*
		* @return void
		*/ 
		public function alter()
		{

			Schema::modify('prisoners', function (BluePrint $table) {

				 
			}); 

		} 

		/**
		* Reverse the migrations.
		*
		* @return void
		*/

		public function down()
		{

			Schema::dropIfExists('prisoners');
     
		} 

}