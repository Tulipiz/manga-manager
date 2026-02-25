@props(['label', 'name', 'placeholder' => '', 'rows' => 5, 'maxlength' => null])

<div class="flex flex-col gap-2">
    <label class="text-sm font-semibold text-[#f0f2f5]">{{ $label }}</label>

    <div x-data="{ count: {{ strlen($__livewire->{$name} ?? '') }} }">
        <textarea
            wire:model="{{ $name }}"
            x-on:input="count = $event.target.value.length"
            rows="{{ $rows }}"
            @if($maxlength) maxlength="{{ $maxlength }}" @endif
            placeholder="{{ $placeholder }}"
            {{ $attributes->class([
                'w-full rounded-lg bg-[#12151c] border border-gray-700 px-4 py-3',
                'text-sm text-[#f0f2f5] placeholder-gray-500 resize-none',
                'focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500'
            ]) }}></textarea>

        @if($maxlength)
            <span class="text-xs text-right block mt-1"
                :class="count >= {{ $maxlength }} ? 'text-red-400' : 'text-gray-500'">
                <span x-text="count"></span>/{{ $maxlength }} caracteres
            </span>
        @endif
    </div>

    @error($name) <span class="text-xs text-red-400">{{ $message }}</span> @enderror
</div>