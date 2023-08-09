@section("title")
    Create Post
@endsection
<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Add Post') }}
    </h2>
    @livewire('post-create')


</x-app-layout>
