@php
    $hasError = false;
    $name = $attributes->wire('model')->value;
    if($name) {
        $hasError = $errors->has($name);
    }
@endphp
<div x-data @tags-update="console.log('tags updated', $event.detail.tags)" data-tags='[]'>
    <div x-data="tagSelect($wire.entangle('state.audience'))" x-init="init('parentEl')" @click.away="clearSearch()" @keydown.escape="clearSearch()">
        <div class="relative" @keydown.enter.prevent="addTag(textInput)">
            <label class="block text-sm font-medium text-secondary-700 dark:text-gray-400 mb-1">{{ $attributes->get('label') }}</label>
            <input
                x-model="textInput"
                x-ref="textInput"
                @input="search($event.target.value)"
                class="{{ $hasError ? 'border-negative-300 text-negative-600' : '' }} shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                wire:model.defer="{{ $attributes->get('wire:model.defer') }}"
            >
            <div :class="[open ? 'block' : 'hidden']">
                <div class="absolute z-40 left-0 mt-2 w-full">
                    <div class="py-1 text-sm bg-white rounded shadow-lg border border-gray-300">
                        <a @click.prevent="addTag(textInput)" class="block py-1 px-5 cursor-pointer hover:bg-indigo-600 hover:text-white">Add tag "<span class="font-semibold" x-text="textInput"></span>"</a>
                    </div>
                </div>
            </div>
            <!-- selections -->
            <template x-for="(tag, index) in tags">
                <div class="bg-indigo-100 inline-flex items-center text-sm rounded mt-2 mr-1">
                    <span class="ml-2 mr-1 leading-relaxed truncate max-w-xs" x-text="tag"></span>
                    <button @click.prevent="removeTag(index)" class="w-6 h-8 inline-block align-middle text-gray-500 hover:text-gray-600 focus:outline-none">
                        <svg class="w-6 h-6 fill-current mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z"/></svg>
                    </button>
                </div>
            </template>
        </div>
    </div>
</div>
