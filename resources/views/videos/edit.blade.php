<x-app-layout>
   <x-slot name="title">{{ $title }}</x-slot>
   <x-slot name="header">{{ $title }}</x-slot>

   <form action="{{ route('videos.edit', [$playlist->slug, $video->unique_video_id]) }}" method="post"
      enctype="multipart/form-data" novalidate>
      @csrf
      @method('PUT')
      @include('videos._form-control', [
          'submit' => 'Update',
      ])
   </form>
</x-app-layout>
