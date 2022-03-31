<?php

namespace App\Http\Controllers\Screencast;

use Illuminate\Support\Str;
use App\Models\Screencast\Video;
use App\Http\Requests\VideoRequest;
use App\Models\Screencast\Playlist;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Screencast\VideoResource;

class VideoController extends Controller
{
   public function index(Playlist $playlist)
   {
      $videos = $playlist->videos()->orderBy('episode')->get();

      return VideoResource::collection($videos);
   }

   public function show(Playlist $playlist, Video $video)
   {
      if (Auth::user()->hasBought($playlist) || $video->intro == 1) {
         return new VideoResource($video);
      }

      return response()->json([
         'message' => 'You must buy this video to view it.',
      ], 403);
   }

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

      $attr['slug']  = Str::slug($request->title . '-' . Str::random(6));
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