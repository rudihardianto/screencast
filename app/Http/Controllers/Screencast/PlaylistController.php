<?php

namespace App\Http\Controllers\Screencast;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlaylistRequest;
use App\Models\Screencast\Playlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PlaylistController extends Controller
{
   public function create()
   {
      return view('playlists.create');
   }

   public function store(PlaylistRequest $request)
   {
      Auth::user()->playlists()->create([
         'thumbnail'   => $request->file('thumbnail')->store('images/playlist'),
         'name'        => $request->name,
         'description' => $request->description,
         'price'       => $request->price,
         'slug'        => Str::slug($request->name . '-' . Str::random(6)),
      ]);

      return redirect()->route('playlists.table');
   }

   public function table()
   {
      $playlists = Auth::user()->playlists()->latest()->paginate(10);

      return view('playlists.table', [
         'playlists' => $playlists,
      ]);
   }

}