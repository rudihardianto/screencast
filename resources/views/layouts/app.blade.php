<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

   <!-- Styles -->
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">

   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
   <div class="min-h-screen bg-gray-100">
      <div class="flex">
         @include('layouts.sidebar')

         <!-- Page Content -->
         <main class="w-4/5 p-5">
            @isset($header)
               <h1 class="font-medium text-2xl mb-5 text-gray-800 leading-tight">
                  {{ $header }}
               </h1>
            @endisset

            {{ $slot }}
         </main>
      </div>
   </div>
</body>

</html>
