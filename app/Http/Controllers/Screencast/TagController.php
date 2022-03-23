<?php

namespace App\Http\Controllers\Screencast;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Screencast\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function table()
   {
      return view('tags.table', [
         'title' => 'Tags Table',
         'tags'  => Tag::withCount('playlists')->latest()->paginate(10),
      ]);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('tags.create', [
         'title' => 'Create new Tag',
         'tag'   => new Tag(),
      ]);
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(TagRequest $request)
   {
      Tag::create([
         'name' => $request->name,
         'slug' => Str::slug($request->name),
      ]);

      return back();
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit(Tag $tag)
   {
      return view('tags.edit', [
         'title' => 'Edit Tag: ' . $tag->name,
         'tag'   => $tag,
      ]);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(TagRequest $request, Tag $tag)
   {
      $tag->update([
         'name' => $request->name,
         'slug' => Str::slug($request->name),
      ]);

      return redirect()->route('tags.table');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy(Tag $tag)
   {
      $tag->playlists()->detach();
      $tag->delete();

      return redirect()->route('tags.table');
   }
}