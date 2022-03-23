<?php

namespace App\Http\Controllers\Screencast;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlaylistRequest;
use App\Models\Screencast\Playlist;
use App\Models\Screencast\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PlaylistController extends Controller
{
   public function create()
   {
      return view('playlists.create', [
         'playlist' => new Playlist(),
         'tags'     => Tag::get(),
      ]);
   }

   public function store(PlaylistRequest $request)
   {
      $playlist = Auth::user()->playlists()->create([
         'thumbnail'   => $request->file('thumbnail')->store('images/playlist'),
         'name'        => $request->name,
         'description' => $request->description,
         'price'       => $request->price,
         'slug'        => Str::slug($request->name . '-' . Str::random(6)),
      ]);

      $playlist->tags()->sync($request->tags);

      return redirect()->route('playlists.table');
   }

   public function table()
   {
      $playlists = Auth::user()->playlists()->latest()->paginate(10);

      return view('playlists.table', [
         'playlists' => $playlists,
      ]);
   }

   public function edit(Playlist $playlist)
   {
      // Policy
      $this->authorize('update', $playlist);

      return view('playlists.edit', [
         'playlist' => $playlist,
         'tags'     => Tag::get(),
      ]);
   }

   public function update(PlaylistRequest $request, Playlist $playlist)
   {
      // Policy
      $this->authorize('update', $playlist);

      if ($request->thumbnail) {
         Storage::delete($playlist->thumbnail);
         $thumbnail = $request->file('thumbnail')->store('images/playlist');
      } else {
         $thumbnail = $playlist->thumbnail;
      }

      $playlist->update([
         'thumbnail'   => $thumbnail,
         'name'        => $request->name,
         'description' => $request->description,
         'price'       => $request->price,
      ]);

      $playlist->tags()->sync($request->tags);

      return redirect()->route('playlists.table');
   }

   public function destroy(Playlist $playlist)
   {
      // Policy
      $this->authorize('delete', $playlist);

      Storage::delete($playlist->thumbnail);
      $playlist->tags()->detach();
      $playlist->delete();

      return redirect()->route('playlists.table');
   }
}