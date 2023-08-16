<x-main-layout>
    <div class="flex flex-wrap">
        <div class="pr-5">
            <div>
                <img alt="" src="{{ asset('storage/thumbnails/' . $boardgame->thumbnail)}}"/>
            </div>
            <div class="p-4">
                <p><b>Title:</b> {{$boardgame->name}}</p>
                <p><b>Description: </b>{{$boardgame->description}}</p>
                <p><b>Year:</b> {{$boardgame->released_year}}</p>
            </div>
        </div>
        <div>
            <div>Login Player Stats:</div>
            <div>General Stats:</div>
        </div>
    </div>
</x-main-layout>