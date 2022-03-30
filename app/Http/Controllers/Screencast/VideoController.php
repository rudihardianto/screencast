<?php

namespace App\Http\Controllers\Screencast;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Models\Screencast\Playlist;
use App\Models\Screencast\Video;
use Illuminate\Support\Str;

class VideoController extends Controller
{
   public function table(Playlist $playlist)
   {
      $this->authorize('update', $playlist);

      return view('videos.table', [
         'title'    => "Table of Videos in Playlist: {$playlist->name}",
         'playlist' => $playlist,
         'videos'   => $playlist->videos()->paginate(20),
      ]);
   }

   public function create(Playlist $playlist)
   {
      $this->authorize('update', $playlist);

      return view('videos.create', [
         'playlist' => $playlist,
         'title'    => "Create a New Video in Playlist: {$playlist->name}",
         'video'    => new Video(),
      ]);
   }

   public function store(Playlist $playlist, VideoRequest $request)
   {
      $attr = $request->all();

      $attr['slug']  = Str::slug($request->title);
      $attr['intro'] = $request->intro ? true : false;
      $playlist->videos()->create($attr);

      return back();
   }

   public function edit(Playlist $playlist, Video $video)
   {
      $this->authorize('update', $playlist);

      return view('videos.edit', [
         'playlist' => $playlist,
         'video'    => $video,
         'title'    => "Edit Video: {$playlist->name} - {$video->title}",
      ]);
   }

   public function update(Playlist $playlist, Video $video, VideoRequest $request)
   {
      $this->authorize('update', $playlist);
      $attr = $request->all();

      $attr['intro'] = $request->intro ? true : false;
      $video->update($attr);

      return redirect()->route('videos.table', $playlist);
   }

   public function destroy(Playlist $playlist, Video $video)
   {
      $this->authorize('update', $playlist);
      $video->delete();

      return redirect()->route('videos.table', $playlist);
   }
}