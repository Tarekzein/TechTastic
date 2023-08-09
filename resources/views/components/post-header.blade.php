@props(['post'])

@php
    $user= \App\Models\User::find($post->user_id)

@endphp

<header class="mb-4 lg:mb-6 not-format">
    <img src="{{$post->image? asset("storage/".$post->image):'https://flowbite.s3.amazonaws.com/typography-plugin/typography-image-1.png'}}" alt="post image">
    <address class="flex items-center my-6 not-italic">
        <div class="inline-flex items-center mr-3 text-sm text-gray-900 ">
            <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
            <div>
                <a href="#" rel="author" class="text-xl font-bold text-gray-900 ">{{$user->first_name}} {{$user->last_name}}</a>
                <p class="text-base font-light text-gray-500">Graphic Designer, educator & CEO Flowbite</p>
                <p class="text-base font-light text-gray-500"><time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time></p>
            </div>
        </div>
    </address>
    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl ">{{$post->title}}</h1>
</header>
