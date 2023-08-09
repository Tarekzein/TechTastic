@props(['related_posts'])

<aside aria-label="Related articles" class="py-8 lg:py-24 bg-gray-50">
    <div class="px-4 mx-auto max-w-screen-xl">
        <h2 class="mb-8 text-2xl font-bold text-gray-900">Related articles</h2>
        <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($related_posts as $post)
            <article class="max-w-xs ">
                <a href="{{route("blog.post",$post->slug)}}">
                    <img src="{{$post->image? asset("storage/".$post->image):'https://flowbite.s3.amazonaws.com/typography-plugin/typography-image-1.png'}}" class="mb-5 rounded-lg" alt="Image 1">
                </a>
                <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900">
                    <a href="{{route("blog.post",$post->slug)}}">{{$post->title}}</a>
                </h2>
                <p class="mb-4 font-light text-gray-500">{{$post->body}}</p>
                <a href="{{route("blog.post",$post->slug)}}" class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 hover:no-underline">
                    Read in 2 minutes
                </a>
            </article>
            @endforeach
        </div>
    </div>
</aside>
