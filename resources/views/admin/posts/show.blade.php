@section("title")
    Posts
@endsection
<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Posts') }}
    </h2>

    @livewire('posts-view')

</x-app-layout>
