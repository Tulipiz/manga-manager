@props(['label', 'name', 'options' => [], 'placeholder' => 'Selecione uma opção', 'multiple' => false])

<div class="flex flex-col gap-2">
    <label class="text-sm font-semibold text-[#f0f2f5]">{{ $label }}</label>
    <select
        wire:model="{{ $name }}"
        @if($multiple) multiple @endif
        {{ $attributes->class([
            'w-full rounded-lg bg-[#12151c] border border-gray-700 px-4 py-2.5',
            'text-sm text-[#f0f2f5]',
            'focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500'
        ]) }}>
        @if(!$multiple)
            <option value="" disabled selected>{{ $placeholder }}</option>
        @endif
        @foreach ($options as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
        @endforeach
    </select>
    @error($name) <span class="text-xs text-red-400">{{ $message }}</span> @enderror
</div>