@props(['label', 'name', 'placeholder' => '', 'type' => 'text'])

<div class="flex flex-col gap-2">
    <label class="text-sm font-semibold text-[#f0f2f5]">{{ $label }}</label>
    <input
        type="{{ $type }}"
        wire:model="{{ $name }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->class([
            'w-full rounded-lg bg-[#12151c] border border-gray-700 px-4 py-2.5',
            'text-sm text-[#f0f2f5] placeholder-gray-500',
            'focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500'
        ]) }}
    />
    @error($name) <span class="text-xs text-red-400">{{ $message }}</span> @enderror
</div>