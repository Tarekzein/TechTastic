<section class="not-format">


    @auth
        <div class="w-full my-6 p-4  bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">

            <div class="flex justify-between items-center my-6">
                <h2 class="text-lg lg:text-2xl font-bold text-gray-900">Leave a comment</h2>
            </div>

            <form wire:submit.prevent="commentCreate" class="mb-6">
                <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 ">
                    <label for="comment" class="sr-only">Your comment</label>
                    <textarea wire:model="comment.comment" id="comment" rows="6"
                              class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 "
                              placeholder="Write a comment..." required></textarea>
                </div>
                <button type="submit"
                        class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 ">
                    Post comment
                </button>
            </form>
        </div>
    @else

        <div class="w-full my-6 p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                <a href="{{route("login")}}" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                    <div class="text-left">
                        <h1 class="mb-1 text-xl text-bold">Login To Leave a Comment</h1>
                    </div>
                </a>
                <a href="{{route("register")}}" class="w-full sm:w-auto bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-blue-700 dark:hover:bg-blue-600 dark:focus:ring-blue-700">
                    <div class="text-left">
                        <h1 class="mb-1 text-xl text-bold">Register To Leave a Comment</h1>
                    </div>
                </a>
            </div>
        </div>

    @endauth


    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg lg:text-2xl font-bold text-gray-900">Discussion ({{count($comments)}})</h2>
    </div>

    @foreach($comments as $comment)
        @php
        $user=$comment->user()->get()->first();
        $replies=$comment->replies()->get();
        @endphp
        {{--    main comment--}}
        <article class="p-6 mb-6 text-base bg-white rounded-lg">
            <footer class="flex justify-between items-center mb-2">
                <div class="flex items-center">
                    {{ $user->profile_photo_path}}
                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 "><img
                            class="mr-2 w-6 h-6 rounded-full"
                            src="{{$user->profile_photo_path}}"
                            alt="{{$user->first_name}} {{$user->last_name}}">{{$user->first_name}} {{$user->last_name}}</p>
                    <p class="text-sm text-gray-600 "><time pubdate datetime="2022-02-08"
                                                            title="February 8th, 2022">Feb. 8, 2022</time></p>
                </div>

                <!-- Dropdown menu -->
                <x-dropdown>
                    <x-slot name="trigger">
                        <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 "
                                type="button">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                </path>
                            </svg>
                            <span class="sr-only">Comment settings</span>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <ul class="py-1 text-sm text-gray-700 "
                            aria-labelledby="dropdownMenuIconHorizontalButton">
                            <li>
                                <x-dropdown-link href="#"
                                                 class="block py-2 px-4 hover:bg-gray-100 ">Edit</x-dropdown-link>
                            </li>
                            <li>
                                <x-dropdown-link wire:click="deleteComment({{$comment->id}})"
                                                 class="block py-2 cursor-pointer px-4 hover:bg-gray-100 ">Remove</x-dropdown-link>
                            </li>
                            <li>
                                <x-dropdown-link href="#"
                                                 class="block py-2 px-4 hover:bg-gray-100">Report</x-dropdown-link>
                            </li>
                        </ul>
                    </x-slot>

                </x-dropdown>

            </footer>
            <p>{{$comment->comment}}</p>
            <div class="flex items-center mt-4 space-x-4">
                <button type="button"   class="flex items-center text-sm text-gray-500 hover:underline toggle-reply">

                    <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                    Reply
                </button>
            </div>
            <div   class="reply-section mt-2 hidden" >

                <form wire:submit.prevent="commentReply({{$comment->id}})"  class="mb-6">
                    <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 ">
                        <label for="comment" class="sr-only">Reply to {{$user->first_name}} {{$user->last_name}}</label>
                        <textarea wire:model="reply.comment" id="comment" rows="6"
                                  class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 "
                                  placeholder="Reply to {{$user->first_name}} {{$user->last_name}}" required></textarea>
                    </div>
                    <button type="submit"
                            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 ">
                        Reply
                    </button>
                </form>

            </div>
        </article>
        @foreach($replies as $reply)
            @php
                $user=$reply->user()->get()->first();

            @endphp
            {{--    relply --}}

            <article class="p-6 mb-6 ml-6 lg:ml-12 text-base bg-white rounded-lg">
                <footer class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <p class="inline-flex items-center mr-3 text-sm text-gray-900 "><img
                                class="mr-2 w-6 h-6 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                alt="Michael Gough">{{$user->first_name}} {{$user->last_name}}</p>
                        <p class="text-sm text-gray-600 "><time pubdate datetime="2022-02-08"
                                                                title="February 8th, 2022">Feb. 8, 2022</time></p>
                    </div>

                    <!-- Dropdown menu -->
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 "
                                    type="button">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                    </path>
                                </svg>
                                <span class="sr-only">Comment settings</span>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <ul class="py-1 text-sm text-gray-700 "
                                aria-labelledby="dropdownMenuIconHorizontalButton">
                                <li>
                                    <x-dropdown-link href="#"
                                                     class="block py-2 px-4 hover:bg-gray-100 ">Edit</x-dropdown-link>
                                </li>
                                <li>
                                    <x-dropdown-link wire:click="deleteReply({{$reply->id}})"
                                                     class="block py-2 cursor-pointer px-4 hover:bg-gray-100 ">Remove</x-dropdown-link>

                                </li>
                                <li>
                                    <x-dropdown-link href="#"
                                                     class="block py-2 px-4 hover:bg-gray-100">Report</x-dropdown-link>
                                </li>
                            </ul>
                        </x-slot>

                    </x-dropdown>

                </footer>
                <p>{{$reply->comment}}</p>
{{--                <div class="flex items-center mt-4 space-x-4">--}}
{{--                    <button type="button" class="flex items-center text-sm text-gray-500 hover:underline toggle-reply">--}}

{{--                        <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>--}}
{{--                        Reply--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="reply-section mt-2 hidden">--}}
{{--                    <form wire:submit.prevent="commentReply({{$comment->id}})"  class="mb-6">--}}
{{--                        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 ">--}}
{{--                            <label for="comment" class="sr-only">Reply to {{$user->first_name}} {{$user->last_name}}</label>--}}
{{--                            <textarea wire:model="reply.comment" id="comment" rows="6"--}}
{{--                                      class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 "--}}
{{--                                      placeholder="Reply to {{$user->first_name}} {{$user->last_name}}" required></textarea>--}}
{{--                        </div>--}}
{{--                        <button type="submit"--}}
{{--                                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 ">--}}
{{--                            Reply--}}
{{--                        </button>--}}
{{--                    </form>--}}

{{--                </div>--}}
            </article>

        @endforeach
    @endforeach

</section>

<script>
    // Get all toggle buttons
    const toggleButtons = document.querySelectorAll('.toggle-reply');

    // Add click event listener to each toggle button
    toggleButtons.forEach((button) => {
        button.addEventListener('click', () => {
            // Get the parent article element
            const article = button.closest('article');

            // Find the corresponding reply section
            const replySection = article.querySelector('.reply-section');

            // Toggle the visibility of the reply section
            replySection.classList.toggle('hidden');
        });
    });
</script>
