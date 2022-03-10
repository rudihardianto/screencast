<x-app-layout>
   <x-slot name="title">Playlist Table</x-slot>

   Playlist Table
   <x-table>
      <thead>
         <tr>
            <x-th>#</x-th>
            <x-th>Name</x-th>
            <x-th>Published</x-th>
            <x-th>Action</x-th>
         </tr>
      </thead>
      <tbody>
         @foreach ($playlists as $item)
            <tr>
               <x-td>
                  {{ $playlists->count() * ($playlists->currentPage() - 1) + $loop->iteration }}
               </x-td>
               <x-td>{{ $item->name }}</x-td>
               <x-td>{{ $item->created_at->format('d F Y') }}</x-td>
               <x-td>
                  <a href="">Edit</a>
               </x-td>
            </tr>
         @endforeach
      </tbody>
   </x-table>

   {{ $playlists->links() }}
</x-app-layout>
