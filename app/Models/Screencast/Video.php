<?php

namespace App\Models\Screencast;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
   use HasFactory;

   protected $fillable = [
      'title',
      'slug',
      'episode',
      'runtime',
      'unique_video_id',
      'intro',
   ];

   public function playlist()
   {
      return $this->belongsTo(Playlist::class);
   }
}