<x-main-layout>

    <x-form>
        <x-slot:header>
            {{  __('Edit Boardgame: :name', ['name' => $boardgame->name]) }}
        </x-slot:header>

        <form method="POST" action="/boardgames/{{$boardgame->slug}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div>
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input name="name" id="name" type="text" maxlength="255"
                              :value="old('name', $boardgame->name)"
                              required autofocus/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')"/>
                <x-textarea name="description"
                            id="description">{{old('description', $boardgame->description)}}</x-textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2"/>
            </div>

            <div class="flex mt-4">
                <div class="flex-1">
                    <x-input-label for="image" :value="__('New Image')"/>
                    <x-text-input name="image" id="image" type="file" :value="old('image', $boardgame->image)"/>
                </div>
                <img src="{{ asset('storage/boardgames/thumbnails/' . $boardgame->image) }}" alt="" class="ml-6">
                <x-input-error :messages="$errors->get('image')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label for="release_year" :value="__('Release Year')"/>
                <x-text-input name="release_year" id="release_year" type="number" min="1900" max="{{ now()->year }}"
                              :value="old('name', $boardgame->release_year)" required/>
                <x-input-error :messages="$errors->get('release_year')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label for="bgg_url" :value="__('BoardGameGeek URL')"/>
                <x-text-input name="bgg_url" id="bgg_url" type="url" maxlength="255"
                              :value="old('name', $boardgame->bgg_url)"/>
                <x-input-error :messages="$errors->get('bgg_url')" class="mt-2"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>{{ __('Edit') }}</x-primary-button>
            </div>
        </form>
    </x-form>

</x-main-layout>
