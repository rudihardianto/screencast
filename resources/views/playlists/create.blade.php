<x-app-layout>
   <x-slot name="title">Create new Playlist</x-slot>

   <x-slot name="header">Create new Playlist</x-slot>

   <form action="{{ route('playlists.create') }}" method="post" enctype="multipart/form-data" novalidate>
      @csrf
      @include('playlists._form-control', [
          'submit' => 'Create',
      ])
   </form>
</x-app-layout>
