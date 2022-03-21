<?php

namespace Database\Seeders;

use App\Models\Screencast\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      $tags = collect([
         'JavaScript', 'CSS', 'HTML', 'PHP', 'Laravel', 'Tailwind CSS', 'Bootstrap', 'Next JS', 'Nuxt JS', 'Vue Js',
      ]);

      $tags->each(function ($tag) {
         Tag::create([
            'name' => $tag,
            'slug' => Str::slug($tag),
         ]);
      });
   }
}