<x-app-layout>
   <x-slot name="title">{{ $title }}</x-slot>
   <x-slot name="header">Tags Table</x-slot>

   <x-table>
      <tr>
         <x-th>#</x-th>
         <x-th>Name</x-th>
         <x-th>Playlist</x-th>
         @can('delete tags')
            <x-th>Action</x-th>
         @endcan
      </tr>

      @foreach ($tags as $tag)
         <tr>
            <x-td>{{ $tags->count() * ($tags->currentPage() - 1) + $loop->iteration }}</x-td>
            <x-td>{{ $tag->name }}</x-td>
            <x-td>{{ $tag->playlists_count }}</x-td>
            @can('delete tags')
               <x-td>
                  <div class="flex items-center gap-x-2">
                     <a class="px-4 py-2 text-sm rounded-lg text-white bg-blue-500 hover:bg-blue-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 transition ease-in-out duration-150"
                        href="{{ route('tags.edit', $tag->slug) }}">
                        Edit
                     </a>
                     <form action="{{ route('tags.delete', $tag->slug) }}" method="POST">
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
            @endcan
         </tr>
      @endforeach
   </x-table>

   {{ $tags->links() }}
</x-app-layout>
