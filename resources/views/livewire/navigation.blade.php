<div class="nav-container">
    <nav class="nav">
        <div class="logo">
            <a href="{{ url('/') }}" class="link-hover-logo">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>
        <ul class="nav-list">
            <li>
                <a href="{{ url('/') }}" class="link-hover">
                    Inicio
                </a>
            </li>
            <li>
                <a href="#" class="link-hover">
                    Categorias
                </a>
            </li>
        </ul>

        <div class="search-container">
            <input type="text" placeholder="Pesquisar" class="input-search" wire:model.live="nameSearch" />
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
            </i>
        </div>

        <div><span>{{ $nameSearch }}</span></div>
    </nav>
</div>
