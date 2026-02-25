@props(['label', 'name', 'options' => [], 'selecionadas' => []])

<div class="flex flex-col gap-2">
    <label class="text-sm font-semibold text-[#f0f2f5]">{{ $label }}</label>

    <div class="flex flex-wrap gap-2">
        @foreach ($options as $id => $nome)
            <button type="button"
                wire:click="toggleOpcao('{{ $name }}', {{ $id }})"
                class="rounded-full px-3 py-1 text-xs font-medium border transition-all duration-150
                    {{ in_array($id, $selecionadas)
                        ? 'bg-indigo-600 border-indigo-600 text-white'
                        : 'bg-transparent border-gray-600 text-gray-400 hover:border-indigo-500 hover:text-indigo-400' }}">
                {{ $nome }}
            </button>
        @endforeach
    </div>

    @error($name)
        <span class="text-xs text-red-400">{{ $message }}</span>
    @enderror
</div>