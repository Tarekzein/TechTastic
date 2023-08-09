<main class="pt-5 container pb-16 lg:pt-10 lg:pb-24">

    <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Category</h3>
    <ul class="items-center mb-4 w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
       @php
        $count=0;
       @endphp
        @foreach($categories as $category)
        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
            <div class="flex items-center pl-3">
                <input wire:model="selectedCategories" id="vue-checkbox-list-{{++$count}}" type="checkbox" value="{{$category->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                <label for="vue-checkbox-list-{{$count}}" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$category->category}}</label>
            </div>
        </li>
        @endforeach
    </ul>

    <div class="flex flex-wrap justify-between">
            <div class="flex flex-wrap justify-between w-full">
        @foreach($posts as $post)
{{--            {{dd($post)}}--}}
                <x-blog-card :post="$post" ></x-blog-card>

        @endforeach
            </div>
    </div>
</main>
