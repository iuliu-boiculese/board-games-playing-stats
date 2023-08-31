<x-main-layout>
    <h1 class="mb-4 font-bold text-4xl">All Boardgames</h1>
    <div class="flex flex-wrap gap-x-6 gap-y-6">
        @foreach($boardgames as $boardgame)
            <a href="/boardgames/{{$boardgame->slug}}" class="w-64 border border-1 border-gray-700 rounded-lg">
                <div class="p-4">
                    <img alt="" src="{{ asset('storage/' . $boardgame->thumbnail)}}"/>
                </div>
                <div class="p-4">
                    <p><b>Title:</b> {{$boardgame->name}}</p>
                    <p><b>Description: </b>{{$boardgame->description}}</p>
                    <p><b>Year:</b> {{$boardgame->release_year}}</p>
                </div>
            </a>
        @endforeach
    </div>

</x-main-layout>