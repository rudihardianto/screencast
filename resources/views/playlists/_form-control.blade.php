<!-- File -->
<div class="flex items-center space-x-6 mb-5">
   <label class="block">
      <span class="sr-only">Choose profile photo</span>
      <input type="file" name="thumbnail" id="thumbnail"
         class="block w-full text-sm text-slate-500
       file:mr-4 file:py-2 file:px-4
       file:rounded-full file:border-0
       file:text-sm file:font-semibold
       file:bg-indigo-50 file:text-gray-700
       hover:file:bg-indigo-100
     " />
   </label>
   @error('thumbnail')
      <div class="text-red-500 mt-2">{{ $message }}</div>
   @enderror
</div>

<!-- Name -->
<div class="mb-5">
   <x-label for="name" :value="__('Name')" />
   <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
   @error('name')
      <div class="text-red-500 mt-2">{{ $message }}</div>
   @enderror
</div>

<!-- Price -->
<div class="mb-5">
   <x-label for="price" :value="__('Price')" />
   <x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required />
   @error('price')
      <div class="text-red-500 mt-2">{{ $message }}</div>
   @enderror
</div>

<!-- Description -->
<div class="mb-5">
   <x-label for="description" :value="__('Description')" />
   <x-textarea id="description" name="description" required>{{ old('description') }}</x-textarea>
   @error('description')
      <div class="text-red-500 mt-2">{{ $message }}</div>
   @enderror
</div>

<!-- Button -->
<x-button>{{ $submit }}</x-button>
