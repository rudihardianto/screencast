<x-app-layout>
   <x-slot name="title">Create new Playlist</x-slot>


   <form action="{{ route('playlists.create') }}" method="post" enctype="multipart/form-data">
      @csrf
      @include('playlists._form-control', [
          'submit' => 'Create Playlist',
      ])
   </form>
</x-app-layout>
