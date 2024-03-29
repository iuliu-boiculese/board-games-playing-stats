<x-main-layout>

    <x-form>
        <x-slot:header>
            {{ __('Add new Boardgame') }}
        </x-slot:header>

        <form method="POST" action="/boardgames" enctype="multipart/form-data">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input name="name" id="name" type="text" maxlength="255" required autofocus/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')"/>
                <x-textarea name="description" id="description"></x-textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label for="image" :value="__('Image')"/>
                <x-text-input name="image" id="image" type="file" required/>
                <x-input-error :messages="$errors->get('image')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label for="release_year" :value="__('Release Year')"/>
                <x-text-input name="release_year" id="release_year" type="number" min="1900" max="{{ now()->year }}"
                              required/>
                <x-input-error :messages="$errors->get('release_year')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label for="bgg_url" :value="__('BoardGameGeek URL')"/>
                <x-text-input name="bgg_url" id="bgg_url" type="url" maxlength="255"/>
                <x-input-error :messages="$errors->get('bgg_url')" class="mt-2"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </div>
        </form>
    </x-form>

</x-main-layout>