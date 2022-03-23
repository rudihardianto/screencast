<x-app-layout>
   <x-slot name="title">{{ $title }}</x-slot>
   <x-slot name="header">Tags</x-slot>

   <form action="{{ route('tags.create') }}" method="post">
      @include('tags._form-control', [
          'submit' => 'Create',
      ])
   </form>
</x-app-layout>
