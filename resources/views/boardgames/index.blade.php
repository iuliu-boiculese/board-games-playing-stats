<x-main-layout>

    <x-slot:header>
        {{__('All Boardgames')}}
    </x-slot:header>

    <x-slot:actions>
        <x-link href="/boardgames/create">{{__('Add New Boardgame')}}</x-link>
    </x-slot:actions>

    <div class="flex flex-wrap gap-x-6 gap-y-6">
        @foreach($boardgames as $key => $boardgame)
            <div class="flex flex-col justify-between w-64 border border-1 border-gray-700 rounded-lg">
                <a href="/boardgames/{{$boardgame->slug}}">
                    <div class="p-4">
                        <img class="rounded-lg" alt="" src="{{ asset('storage/boardgames/thumbnails/' . $boardgame->image)}}"/>
                    </div>
                    <div class="flex flex-col p-4">
                        <p><b class="text-sky-800">{{__('Title')}}:</b> {{$boardgame->name}}</p>
                        <p><b class="text-sky-800">{{__('Description')}}: </b>{{$boardgame->description}}</p>
                        <p><b class="text-sky-800">{{__('Release Year')}}:</b> {{$boardgame->release_year}}</p>
                    </div>
                </a>
                <div class="flex p-4 justify-end">
                    <a href="/boardgames/{{$boardgame->slug}}/edit" title="{{ __('Edit') }}" class="mr-2">
                        <x-heroicon-o-pencil class="text-green-500"/>
                    </a>
                    <a href="" title="{{ __('Remove') }}" x-data=""
                                     x-on:click.prevent="$dispatch('open-modal', 'confirm-boardgame-deletion-{{$key}}')">
                        <x-heroicon-o-trash class="text-red-500"/>
                    </a>
                </div>
                <x-modal name="confirm-boardgame-deletion-{{$key}}" :show="false">
                    <form method="post" action="/boardgames/{{$boardgame->slug}}" class="p-6">
                        @csrf
                        @method('delete')

                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {!! __("Are you sure you want to remove the boardgame :boardgame", ['boardgame' => "<i>$boardgame->name</i>"]) !!}
                        </h2>

                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-danger-button class="ml-3">
                                {{ __('Delete Boardgame') }}
                            </x-danger-button>
                        </div>
                    </form>
                </x-modal>
            </div>
        @endforeach
    </div>

    <div>{{ $boardgames->links() }}</div>

</x-main-layout>