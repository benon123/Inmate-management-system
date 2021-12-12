<?php
use System\Database\Schema\BluePrint;
use System\Database\Schema\Schema;


 class CreateTransfersTable
 { 
		/**
		* Run the Migrations
		*
		* @return void
		*/ 
		public function up()
		{

			Schema::create('transfers', function (BluePrint $table) {

				$table->id();
				$table->string('user_id', 20);
				$table->string('prisoner_id', 12);
				$table->foreign('prisoner_id')->references('prisoners', 'p_id')->cascadeOnDelete();
				$table->text('reason');
				$table->string('transfer_to'); 
				$table->string('transfer_status')->default('pending');
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

			Schema::modify('transfers', function (BluePrint $table) {

				 
			}); 

		} 

		/**
		* Reverse the migrations.
		*
		* @return void
		*/

		public function down()
		{

			Schema::dropIfExists('transfers');
     
		} 

}