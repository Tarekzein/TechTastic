@section("title")
    blog
@endsection
<x-guest-layout>
    <x-slot name="header">

        <!-- Breadcrumb -->
        <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{route("home")}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{route("blog")}}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Blog</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{$post->title}}</span>
                    </div>
                </li>
            </ol>
        </nav>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto ">
            <div class="flex flex-wrap justify-between px-4 mx-auto max-w-screen-xl">
                <article class="w-full lg:w-2/3 lg:px-4 format format-sm sm:format-base lg:format-lg format-blue">
                    <x-post-header :post="$post"></x-post-header>
                    <div class="body">
                        {{$post->body}}
                    </div>
                    @livewire('comment.post-comment',['post_id'=>$post->id])
                </article>

                <aside id="sidebar-multi-level-sidebar" class="w-full lg:w-1/3 mt-6 lg:mt-0">
                    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50">
                        <h1 class="font-semibold my-5 text-xl text-gray-800 leading-tight">
                            Related Posts
                        </h1>

                        <div>
                            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                                <!-- Carousel wrapper -->
                                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                    <!-- Item 1 -->
                                    @if(count($related_posts)==1)
                                        @foreach($related_posts as $post)

                                            <div class=" duration-2000 ease-in-out" >
                                                <a href="{{route("blog.post",$post->slug)}}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 ">
                                                    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{$post->image? asset("storage/".$post->image):'https://flowbite.s3.amazonaws.com/typography-plugin/typography-image-1.png'}}" alt="">
                                                    <div class="flex flex-col justify-between p-4 leading-normal">
                                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                                                            {{$post->title}}</h5>
                                                        <p class="mb-3 font-normal text-gray-700 ">{{$post->body}}</p>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach

                                    @else

                                    @foreach($related_posts as $post)

                                    <div class="hidden duration-2000 ease-in-out" data-carousel-item>
                                        <a href="{{route("blog.post",$post->slug)}}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 ">
                                            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{$post->image? asset("storage/".$post->image):'https://flowbite.s3.amazonaws.com/typography-plugin/typography-image-1.png'}}" alt="">
                                            <div class="flex flex-col justify-between p-4 leading-normal">
                                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                                                    {{$post->title}}</h5>
                                                <p class="mb-3 font-normal text-gray-700 ">{{$post->body}}</p>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                    @endif

                                </div>
                                <!-- Slider indicators -->
{{--                                <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">--}}
{{--                                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>--}}
{{--                                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>--}}
{{--                                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>--}}
{{--                                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>--}}
{{--                                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>--}}
{{--                                </div>--}}

                            </div>

                        </div>
                    </div>
                </aside>
            </div>
        </div>


    </div>
    <x-post-related :related_posts="$related_posts"></x-post-related>

</x-guest-layout>
