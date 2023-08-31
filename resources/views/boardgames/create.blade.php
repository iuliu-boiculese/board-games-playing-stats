<x-main-layout>
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <h1 class="mb-4 font-bold text-4xl">Add new Boardgame</h1>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="/boardgames" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')"/>
                    <x-text-input name="name" id="name" type="text" maxlength="255" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>

                <!-- Description -->
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')"/>
                    <x-textarea name="description" id="description" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                </div>

                <div class="mt-4">
                    <x-input-label for="thumbnail" :value="__('Image')" />
                    <x-text-input name="thumbnail" id="thumbnail" type="file" required />
                    <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="release_year" :value="__('Release Year')" />
                    <x-text-input name="release_year" id="release_year" type="number" min="1900" max="{{ now()->year }}" required />
                    <x-input-error :messages="$errors->get('release_year')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="bgg_url" :value="__('BoardGameGeek URL')" />
                    <x-text-input name="bgg_url" id="bgg_url" type="url" maxlength="255" />
                    <x-input-error :messages="$errors->get('bgg_url')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>{{ __('Save') }}  </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-main-layout>