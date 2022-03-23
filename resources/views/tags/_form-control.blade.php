@csrf

<div class="mb-5 w-full lg:w-1/3">
   <x-label for="name" :value="__('Name')" />
   <x-input class="block mt-1 w-full" type="text" name="name" id="name" placeholder="Laravel"
      value="{{ old('name') ?? $tag->name }}" autofocus />
   @error('name')
      <div class="text-red-500 mt-2">{{ $message }}</div>
   @enderror
</div>

<x-button>{{ $submit }}</x-button>
