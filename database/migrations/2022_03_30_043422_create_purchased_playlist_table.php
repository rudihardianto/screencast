<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('purchased_playlist', function (Blueprint $table) {
         $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
         $table->foreignId('playlist_id')->constrained('playlists')->onDelete('cascade');
         $table->primary(['user_id', 'playlist_id']);
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('purchased_playlist');
   }
};