<?php
use System\Database\Schema\BluePrint;
use System\Database\Schema\Schema;


 class CreateNotificationsTable
 { 
		/**
		* Run the Migrations
		*
		* @return void
		*/ 
		public function up()
		{

			Schema::create('notifications', function (BluePrint $table) {

				$table->id();
				$table->string('sent_to', 20);
				$table->text('notification');
				$table->boolean('is_read')->default(0);
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

			Schema::modify('notifications', function (BluePrint $table) {

				 
			}); 

		} 

		/**
		* Reverse the migrations.
		*
		* @return void
		*/

		public function down()
		{

			Schema::dropIfExists('notifications');
     
		} 

}