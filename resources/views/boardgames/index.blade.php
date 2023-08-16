<x-main-layout>
    <h2 class="font-bold text-xl mb-4">All Boardgames</h2>
    <div class="flex flex-wrap gap-x-6 gap-y-6">
        @foreach($boardgames as $boardgame)
            <a href="/boardgames/{{$boardgame->slug}}" class="w-64 border border-1 border-gray-700 rounded-lg">
                    <div class="p-4">
                        <img alt="" src="{{ asset('storage/thumbnails/' . $boardgame->thumbnail)}}"/>
                    </div>
                    <div class="p-4">
                        <p><b>Title:</b> {{$boardgame->name}}</p>
                        <p><b>Description: </b>{{$boardgame->description}}</p>
                        <p><b>Year:</b> {{$boardgame->released_year}}</p>
                    </div>

            </a>
        @endforeach
    </div>

</x-main-layout>