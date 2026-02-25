<div class="mx-auto max-w-3xl px-4 py-12 md:py-20">

    <div class="flex items-center gap-3">
        <div class="flex h-10 w-10 items-center justify-center rounded-lg" style="background-color: #ea5a2a3f;">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="#ea5a2a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 7v14" />
                <path
                    d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z" />
            </svg>
        </div>
        <div>
            <h1 class="text-2xl font-bold tracking-tight"
                style="font-family: 'Space Grotesk', system-ui, sans-serif; color: #f0f2f5;">
                Novo Projeto
            </h1>
            <p class="text-sm" style="color: #787f8e;">Cadastre um novo manga na plataforma</p>
        </div>
    </div>

    <form wire:submit.prevent="salvar" class="flex flex-col gap-8 mt-10">
        <div class="flex flex-col gap-8 md:flex-row">

            <x-ui.capa-upload name="capa" :preview="$capaPreview ?? null" />

            <div class="flex flex-1 flex-col gap-6">
                <x-ui.input label="Título" name="titulo" placeholder="Ex: Dragon Ball, One Piece, Naruto..." />

                <x-ui.select label="Tipo" name="tipo" :options="[
                    'manga' => 'Mangá',
                    'manhwa' => 'Manhwa',
                    'manhua' => 'Manhua',
                    'light_novel' => 'Light Novel',
                    'one_shot' => 'One-Shot',
                ]" />

                <x-ui.textarea label="Descrição" name="descricao" placeholder="Descreva a sinopse do manga..."
                    :maxlength="1000" :rows="5" />
            </div>
        </div>
        <div>
            <x-ui.multi-select label="Gêneros" name="categoriasSelecionadas" :options="$categorias->pluck('nome', 'id')->toArray()" :selecionadas="$categoriasSelecionadas" />
        </div>

        <div class="flex justify-end">
            <button type="submit" wire:loading.attr="disabled" wire:target="capa"
                class="rounded-lg bg-indigo-600 px-6 py-2.5 text-sm font-semibold text-white hover:bg-indigo-500 disabled:opacity-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200">
                <span wire:loading.remove wire:target="capa">Salvar Projeto</span>
                <span wire:loading wire:target="capa">Enviando imagem...</span>
            </button>
        </div>
    </form>

</div>
