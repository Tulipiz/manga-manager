@props(['name' => 'capa', 'preview' => null, 'width' => 220, 'height' => 330])

<div class="flex flex-col gap-2">
    <label class="text-sm font-semibold text-[#f0f2f5]">Capa</label>

    <div class="relative flex flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-600 cursor-pointer overflow-hidden bg-[#0f1117] hover:border-indigo-500 hover:bg-[#151821] transition-all duration-200"
        style="width: {{ $width }}px; height: {{ $height }}px;"
        onclick="document.getElementById('{{ $name }}-input').click()">

        @if ($preview)
            <img src="{{ $preview }}" alt="Preview" class="absolute inset-0 h-full w-full object-cover" />
            <button type="button" wire:click.stop="removerCapa"
                class="absolute top-2 right-2 rounded-full bg-black/60 p-1 text-white hover:bg-red-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        @else
            <div class="flex flex-col items-center gap-3 p-6 text-center text-gray-400">
                <div class="rounded-full bg-[#1c1f2a] p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <p class="text-xs">Clique para selecionar o arquivo</p>
            </div>
        @endif
    </div>

    <input id="{{ $name }}-input" type="file" accept="image/png, image/jpeg, image/webp" class="hidden"
        wire:model="{{ $name }}"
        x-on:change="
        const file = $event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => $wire.set('{{ $name }}Preview', e.target.result);
            reader.readAsDataURL(file);
        }
    " />

    @error($name)
        <span class="text-xs text-red-400">{{ $message }}</span>
    @enderror
</div>
