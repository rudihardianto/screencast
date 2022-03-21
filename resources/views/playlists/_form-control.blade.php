<!-- File -->
<div class="flex items-center space-x-6 mb-5">
   <label class="block">
      <span class="sr-only">Choose profile photo</span>
      <input type="file" name="thumbnail" id="thumbnail"
         class="block w-full text-sm text-slate-500
       file:mr-4 file:py-2 file:px-4
       file:rounded-full file:border-0
       file:text-sm file:font-semibold
       file:bg-gray-300 file:text-gray-700
       hover:file:bg-gray-400
     " />
   </label>
   @error('thumbnail')
      <div class="text-red-500 mt-2">{{ $message }}</div>
   @enderror
</div>

<!-- Name -->
<div class="mb-5">
   <x-label for="name" :value="__('Name')" />
   <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? $playlist->name" required
      autofocus />
   @error('name')
      <div class="text-red-500 mt-2">{{ $message }}</div>
   @enderror
</div>

<!-- Price -->
<div class="mb-5">
   <x-label for="price" :value="__('Price')" />
   <x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price') ?? $playlist->price"
      required />
   @error('price')
      <div class="text-red-500 mt-2">{{ $message }}</div>
   @enderror
</div>

<!-- Description -->
<div class="mb-5">
   <x-label for="description" :value="__('Description')" />
   <x-textarea id="description" name="description" required>{{ old('description') ?? $playlist->description }}
   </x-textarea>
   @error('description')
      <div class="text-red-500 mt-2">{{ $message }}</div>
   @enderror
</div>

<!-- Tag -->
<div class="mb-5">
   <x-label for="tags" value="Tags" />
   <select name="tags[]" id="tags" multiple
      class="mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
      @foreach ($tags as $tag)
         <option value="{{ $tag->id }}">{{ $tag->name }}</option>
      @endforeach
   </select>
</div>

<!-- Button -->
<x-button>{{ $submit }}</x-button>
