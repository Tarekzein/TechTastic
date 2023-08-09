@props(["post"])


<div class="w-full mb-4 min-w-[280px] max-w-sm bg-white border border-gray-200 rounded-lg shadow">
    <a href="{{route("blog.post",$post->slug)}}">
        <img class="rounded-t-lg" src="{{asset("storage/".$post->image)}}" alt="" />
    </a>
    <div class="p-5">
        <a href="{{route("blog.post",$post->slug)}}">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$post->title}}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700">{{$post->title}}</p>
        <a href="{{route("blog.post",$post->slug)}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
            Read more
            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
</div>



