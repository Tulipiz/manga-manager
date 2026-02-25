<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Projeto;
use App\Models\Categoria;

class CadastrarProjeto extends Component
{
    use WithFileUploads;

    public $titulo = '';
    public $tipo = '';
    public $descricao = '';
    public $capa = null;
    public $capaPreview = null;
    public array $categoriasSelecionadas = [];

    protected $rules = [
        'titulo'                 => 'required|string|max:255',
        'tipo'                   => 'required|in:manga,manhwa,manhua,light_novel,one_shot',
        'descricao'              => 'nullable|string|max:1000',
        'capa'                   => 'nullable|image|max:2048',
        'categoriasSelecionadas' => 'array',
    ];

    public function toggleOpcao(string $propriedade, int $id): void
    {
        if (in_array($id, $this->$propriedade)) {
            $this->$propriedade = array_values(
                array_filter($this->$propriedade, fn($i) => $i !== $id)
            );
        } else {
            $this->$propriedade[] = $id;
            
        }
    }

    public function removerCapa(): void
    {
        $this->capa = null;
        $this->capaPreview = null;
    }

    public function salvar(): void
    {
        $this->validate();

        $caminho = $this->capa?->store('capas', 'r2');

        $projeto = Projeto::create([
            'titulo'    => $this->titulo,
            'tipo'      => $this->tipo,
            'descricao' => $this->descricao,
            'capa'      => $caminho,
        ]);

        $projeto->categorias()->sync($this->categoriasSelecionadas);

        $this->reset(['titulo', 'tipo', 'descricao', 'capa', 'capaPreview', 'categoriasSelecionadas']);

        $this->js("window.dispatchEvent(new CustomEvent('toast', { detail: { message: 'Projeto salvo com sucesso!', type: 'success' } }))");
    }

    public function render()
    {
        return view('livewire.cadastrar-projeto', [
            'categorias' => Categoria::orderBy('nome')->get(),
        ]);
    }
}
