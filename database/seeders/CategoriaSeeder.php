<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            // Gêneros gerais
            'Ação',
            'Aventura',
            'Comédia',
            'Drama',
            'Fantasia',
            'Ficção Científica',
            'Horror',
            'Mistério',
            'Romance',
            'Slice of Life',
            'Sobrenatural',
            'Suspense',
            'Terror',
            'Tragédia',
            'Psicológico',

            // Demográficos
            'Shounen',
            'Shoujo',
            'Seinen',
            'Josei',
            'Kodomomuke',

            // Subgêneros populares
            'Isekai',
            'Reencarnação',
            'Sistema',
            'Tower Climbing',
            'Dungeons',
            'Cultivação',
            'Wuxia',
            'Xianxia',
            'Manhwa de Murim',
            'Regressão',
            'Vilã',
            'Protagonista Overpowered',

            // Temáticas
            'Artes Marciais',
            'Escolar',
            'Esportes',
            'Culinária',
            'Música',
            'Jogos',
            'Magia',
            'Mechas',
            'Militar',
            'Histórico',
            'Político',
            'Médico',
            'Policial',
            'Espaço',
            'Pós-Apocalíptico',
            'Zumbis',
            'Vampiros',
            'Demônios',
            'Deuses',
            'Heróis',
            'Vilões',

            // Romance
            'Romance Adulto',
            'Harem',
            'Reverse Harem',
            'BL (Boys Love)',
            'GL (Girls Love)',
            'Shounen Ai',
            'Shoujo Ai',

            // Outros
            'Adaptação de Novel',
            'Manhua de Webnovel',
            'Webtoon',
            'Full Color',
            'Vida Cotidiana',
            'Isekai Reverso',
        ];

        foreach ($categorias as $nome) {
            Categoria::firstOrCreate(['nome' => $nome]);
        }
    }
}
