<x-app-layout>
   <x-slot name="title">Edit Playlist: {{ $playlist->name }}</x-slot>

   <x-slot name="header">Edit Playlist: {{ $playlist->name }}</x-slot>

   <div class="w-full lg:w-1/4">
      <img class="w-full rounded-lg mb-6" src="{{ $playlist->picture }}" alt="{{ $playlist->name }}">
   </div>

   <form action="{{ route('playlists.edit', $playlist->slug) }}" method="post" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      @include('playlists._form-control', [
          'submit' => 'Update',
      ])
   </form>
</x-app-layout>
