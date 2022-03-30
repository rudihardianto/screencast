<!-- Title -->
<div class="mb-5">
   <x-label for="title" :value="__('Title')" />
   <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title') ?? $video->title"
      autofocus required />
   @error('title')
      <div class="text-red-500 mt-2">{{ $message }}</div>
   @enderror
</div>

<!-- Unique Code -->
<div class="mb-5">
   <x-label for="unique_video_id" :value="__('Unique Code')" />
   <x-input id="unique_video_id" class="block mt-1 w-full" type="text" name="unique_video_id"
      :value="old('unique_video_id') ?? $video->unique_video_id" required />
   @error('unique_video_id')
      <div class="text-red-500 mt-2">{{ $message }}</div>
   @enderror
</div>

<!-- Episode -->
<div class="flex gap-x-2">
   <div class="w-full lg:w-1/2 mb-5 ">
      <x-label for="episode" :value="__('Episode')" />
      <x-input id="episode" class="block mt-1 w-full" type="text" name="episode"
         :value="old('episode') ?? $video->episode" required />
      @error('episode')
         <div class="text-red-500 mt-2">{{ $message }}</div>
      @enderror
   </div>
   <div class="w-full lg:w-1/2 mb-5 ">
      <x-label for="runtime" :value="__('Runtime')" />
      <x-input id="runtime" class="block mt-1 w-full" type="text" name="runtime"
         :value="old('runtime') ?? $video->runtime" required />
      @error('runtime')
         <div class="text-red-500 mt-2">{{ $message }}</div>
      @enderror
   </div>
</div>

{{-- intro --}}
<div class="mb-5">
   <label for="intro" class="flex items-center">
      <input type="checkbox" {{ $video->intro ? 'Checked' : '' }} name="intro" id="intro"
         class="mr-2 rounded border-gray-300 focus:border-indigo-300 focus:ring-transparent focus:outline-none">
      <span class="font-medium text-sm text-gray-700 select-none">{{ __('Intro') }}</span>
   </label>
</div>

<!-- Button -->
<x-button>{{ $submit }}</x-button>
