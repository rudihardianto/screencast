<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('tag_playlist', function (Blueprint $table) {
         $table->foreignId('tag_id');
         $table->foreignId('playlist_id');
         $table->primary(['tag_id', 'playlist_id']);
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('tag_playlist');
   }
};