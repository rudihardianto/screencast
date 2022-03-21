<x-app-layout>
   <x-slot name="title">Your Playlist</x-slot>

   <x-slot name="header">Your Playlist</x-slot>

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
               <x-td>
                  <div>
                     <div>
                        {{ $item->name }}
                     </div>
                     <span class="text-xs">Tag:</span>
                     @foreach ($item->tags as $tag)
                        <span class="mr-1 text-xs">{{ $tag->name }}</span>
                     @endforeach
                  </div>
               </x-td>
               <x-td>{{ $item->created_at->format('d F Y') }}</x-td>
               <x-td>
                  <div class="flex items-center gap-x-2">
                     <a class="px-4 py-2 text-sm rounded-lg text-white bg-blue-500 hover:bg-blue-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 transition ease-in-out duration-150"
                        href="{{ route('playlists.edit', $item->slug) }}">
                        Edit
                     </a>
                     <form action="{{ route('playlists.delete', $item->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                           class="px-4 py-2 text-sm rounded-lg text-white bg-red-500 hover:bg-red-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 transition ease-in-out duration-150"
                           onclick="return confirm('Hapus Playlist?')">
                           Delete
                        </button>
                     </form>
                  </div>
               </x-td>
            </tr>
         @endforeach
      </tbody>
   </x-table>

   {{ $playlists->links() }}
</x-app-layout>
