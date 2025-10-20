<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Desenvolvimento',
                'slug' => 'desenvolvimento',
                'description' => 'Recursos e links de desenvolvimento de software',
                'color' => '#6b7280',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Produtividade',
                'slug' => 'produtividade',
                'description' => 'Ferramentas e utilitários para produtividade',
                'color' => '#f59e0b',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Design',
                'slug' => 'design',
                'description' => 'Recursos e frameworks de design/UI',
                'color' => '#06b6d4',
                'sort_order' => 3,
                'is_active' => true,
            ],
            // Categorias usadas pelos Shortcuts (slugs em inglês)
            [
                'name' => 'Social',
                'slug' => 'social',
                'description' => 'Redes sociais e comunicação',
                'color' => '#1877F2',
                'sort_order' => 10,
                'is_active' => true,
            ],
            [
                'name' => 'Entretenimento',
                'slug' => 'entertainment',
                'description' => 'Vídeos, streaming e conteúdos de entretenimento',
                'color' => '#FF0000',
                'sort_order' => 11,
                'is_active' => true,
            ],
            [
                'name' => 'Produtividade (EN)',
                'slug' => 'productivity',
                'description' => 'Ferramentas e utilitários de produtividade (slug EN)',
                'color' => '#4285F4',
                'sort_order' => 12,
                'is_active' => true,
            ],
            [
                'name' => 'Development',
                'slug' => 'development',
                'description' => 'Recursos de desenvolvimento (slug EN)',
                'color' => '#000000',
                'sort_order' => 13,
                'is_active' => true,
            ],
            [
                'name' => 'Compras',
                'slug' => 'shopping',
                'description' => 'E-commerce e marketplaces',
                'color' => '#FF9900',
                'sort_order' => 14,
                'is_active' => true,
            ],
            [
                'name' => 'Notícias',
                'slug' => 'news',
                'description' => 'Portais e agregadores de notícias',
                'color' => '#DC2626',
                'sort_order' => 15,
                'is_active' => true,
            ],
            [
                'name' => 'Utilitários',
                'slug' => 'utilities',
                'description' => 'Ferramentas e serviços úteis',
                'color' => '#0099CC',
                'sort_order' => 16,
                'is_active' => true,
            ],
        ];

        foreach ($categories as $data) {
            Category::firstOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}