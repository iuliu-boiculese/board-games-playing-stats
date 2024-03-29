<x-main-layout>
    <x-slot:header>
        {{__('All Boardgames')}}
    </x-slot:header>
    <div class="flex flex-wrap gap-x-6 gap-y-6">
        @foreach($boardgames as $key => $boardgame)
            <div class="flex flex-col w-64 border border-1 border-gray-700 rounded-lg">
                <a href="/boardgames/{{$boardgame->slug}}">
                    <div class="p-4 h-24">
                        <img alt="" src="{{ asset('storage/boardgames/thumbnails/' . $boardgame->image)}}"/>
                    </div>
                    <div class="p-4">
                        <p><b>Title:</b> {{$boardgame->name}}</p>
                        <p><b>Description: </b>{{$boardgame->description}}</p>
                        <p><b>Year:</b> {{$boardgame->release_year}}</p>
                    </div>
                </a>
                <div class="flex p-4">
                    <x-link href="/boardgames/{{$boardgame->slug}}/edit" class="mr-2">
                        {{ __('Edit') }}
                    </x-link>
                    <x-danger-button x-data=""
                                     x-on:click.prevent="$dispatch('open-modal', 'confirm-boardgame-deletion-{{$key}}')">
                        {{ __('Delete') }}
                    </x-danger-button>
                </div>
                <x-modal name="confirm-boardgame-deletion-{{$key}}" :show="false">
                    <form method="post" action="/boardgames/{{$boardgame->slug}}" class="p-6">
                        @csrf
                        @method('delete')

                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {!! __("Are you sure you want to delete the boardgame :boardgame", ['boardgame' => "<i>$boardgame->name</i>"]) !!}
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

</x-main-layout>