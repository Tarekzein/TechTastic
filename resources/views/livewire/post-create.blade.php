<main class="pt-5 pb-16 lg:pt-10 lg:pb-24">
    <form wire:submit.prevent="savePost">
         <div class="flex  relative lg:flex-row justify-between px-4 mx-auto max-w-screen-xl">
            <article class="w-full lg:w-2/3 mr-3 format format-sm sm:format-base lg:format-lg format-blue">
                <!-- Content goes here -->
                @if($saveSuccess)
                    <div class="rounded-md mb-4 bg-green-100 rounded-lg p-4 transition-opacity duration-2000 opacity-100">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-green-800">Successfully Saved Post</h3>
                                <div class="mt-2 text-sm text-green-700">
                                    <p>Your new post has been saved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                    <div class="sm:col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">
                            Post Title
                        </label>
                        <div class="mt-1">
                            <input id="title" wire:model="post.title" name="title" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        </div>
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror

                    </div>
                    <div class="sm:col-span-6 pt-5">
                        <label for="postbody" class="block text-sm font-medium text-gray-700">Body</label>
                        <div class="mt-1">
                            <textarea id="postbody" rows="3" wire:model="post.body" class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>
                        @error('body') <span class="text-danger">{{ $message }}</span> @enderror

                        <p class="mt-2 text-sm text-gray-500">Add the body for your post.</p>
                    </div>
                    <div class="sm:col-span-6 pt-5">
                        <label for="image" class="block text-sm font-medium text-gray-700">Upload Image</label>
                        <div class="mt-1">
                            <input type="file"  wire:model="image"  class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="file_input_help" id="file_input">
                            <p class="mt-1 text-sm text-gray-500" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                        </div>
                        @error('image') <span class="text-danger">{{ $message }}</span> @enderror

                    </div>
                    <button class="inline-flex justify-center mt-5 px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:shadow-outline-indigo active:bg-blue-700 cursor-pointer">Submit Post</button>

            </article>

            <aside style="height: calc(100vh - 1rem)" class="w-full lg:w-1/3 h-screen ">
                <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50">
                    <ul class="space-y-2 flex-col font-medium">
                        <h2  class="block text-sm font-medium text-gray-700">
                            Category
                        </h2>
                        @foreach($allcategories as $cat)
                            <div class="flex items-center pl-4 border border-gray-200 rounded">
                                <input wire:model="categories"  id="bordered-checkbox-2" type="checkbox" value="{{$cat->id}}" name="post_category" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                <label for="bordered-checkbox-2" class="w-full py-4 ml-2 text-sm font-medium text-gray-900">{{$cat->category}}</label>
                            </div>
                        @endforeach
                    </ul>
                </div>
            </aside>

        </div>
    </form>

</main>
