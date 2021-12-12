<?php
use System\Database\Schema\BluePrint;
use System\Database\Schema\Schema;


 class CreatePrisonerNextOfKinsTable
 { 
		/**
		* Run the Migrations
		*
		* @return void
		*/ 
		public function up()
		{

			Schema::create('prisoner_next_of_kins', function (BluePrint $table) {

				$table->id();
				$table->string('p_id', 12);
				$table->string('next_of_kin', 40);
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

			Schema::modify('prisoner_next_of_kins', function (BluePrint $table) {

				 
			}); 

		} 

		/**
		* Reverse the migrations.
		*
		* @return void
		*/

		public function down()
		{

			Schema::dropIfExists('prisoner_next_of_kins');
     
		} 

}