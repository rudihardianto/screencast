<div class="w-1/5 min-h-screen bg-gray-900 px-4 py-6">
   {{-- Dashboard --}}
   <div class="mb-8">
      <header class="font-medium px-2 uppercase text-xs text-gray-500">
         Main
      </header>
      <a href="{{ route('dashboard') }}" class="block text-gray-200 px-4 py-2">Dashboard</a>
   </div>

   {{-- Playlists --}}
   @can('create playlists')
      <div class="mb-8">
         <header class="font-medium px-2 uppercase text-xs text-gray-500">
            Playlists
         </header>
         <a href="{{ route('playlists.create') }}" class="block text-gray-200 px-4 py-2">Create</a>
         <a href="{{ route('playlists.table') }}" class="block text-gray-200 px-4 py-2">Table</a>
      </div>
   @endcan

   {{-- Tags --}}
   @can('create tags')
      <div class="mb-8">
         <header class="font-medium px-2 uppercase text-xs text-gray-500">
            Tags
         </header>
         <a href="#" class="block text-gray-200 px-4 py-2">Create</a>
         <a href="#" class="block text-gray-200 px-4 py-2">Table</a>
      </div>
   @endcan

   {{-- Users --}}
   @can('show users')
      <div class="mb-8">
         <header class="font-medium px-2 uppercase text-xs text-gray-500">
            Users
         </header>
         <a href="#" class="block text-gray-200 px-4 py-2">Table</a>
      </div>
   @endcan

   {{-- Logout --}}
   <form method="POST" action="{{ route('logout') }}">
      @csrf
      <a class="block text-red-600 px-4 py-2" href="route('logout')" onclick="event.preventDefault();
                       this.closest('form').submit();">
         {{ __('Log Out') }}
      </a>
   </form>
</div>
