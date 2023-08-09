<form wire:submit.prevent="saveCategory">

    <div class="mt-1">
        <input id="category" wire:model="category.category" name="category" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
    </div>
    @error('category') <span class="text-danger">{{ $message }}</span> @enderror
    <button class="inline-flex justify-center mt-5 px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:shadow-outline-indigo active:bg-blue-700 cursor-pointer">Submit Post</button>

</form>
