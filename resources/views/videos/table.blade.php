<x-app-layout>
   <x-slot name="title">{{ $title }}</x-slot>

   <x-slot name="header">{{ $title }}</x-slot>

   <x-table>
      <thead>
         <tr>
            <x-th>#</x-th>
            <x-th>Title</x-th>
            <x-th>Intro</x-th>
            <x-th>Action</x-th>
         </tr>
      </thead>
      <tbody>
         @foreach ($videos as $item)
            <tr>
               <x-td>{{ $videos->count() * ($videos->currentPage() - 1) + $loop->iteration }}</x-td>
               <x-td>{{ $item->title }}</x-td>
               <x-td>{{ $item->intro ? 'Yes' : 'No' }}</x-td>
               <x-td>
                  <div class="flex items-center gap-x-2">
                     <a class="px-2 py-1 text-sm rounded-lg text-white bg-blue-500 hover:bg-blue-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 transition ease-in-out duration-150"
                        href="{{ route('videos.edit', [$playlist, $item->unique_video_id]) }}">
                        Edit
                     </a>
                     <form action="{{ route('videos.delete', [$playlist, $item->unique_video_id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                           class="px-2 py-1 text-sm rounded-lg text-white bg-red-500 hover:bg-red-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 transition ease-in-out duration-150"
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

   {{ $videos->links() }}
</x-app-layout>
