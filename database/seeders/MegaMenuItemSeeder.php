<?php

namespace Database\Seeders;

use App\Models\MegaMenuItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MegaMenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'Laravel Documentation',
                'subtitle' => 'Documentação oficial',
                'url' => 'https://laravel.com/docs',
                'icon' => 'heroicon-o-book-open',
                'color' => '#ef4444',
                'description' => 'Acesse a documentação completa do Laravel para aprender sobre todos os recursos do framework.',
                'category' => 'desenvolvimento',
                'sort_order' => 1,
                'is_active' => true,
                'open_in_new_tab' => true,
            ],
            [
                'title' => 'Filament Admin',
                'subtitle' => 'Painel administrativo',
                'url' => '/admin',
                'icon' => 'heroicon-o-cog-6-tooth',
                'color' => '#f59e0b',
                'description' => 'Acesse o painel administrativo para gerenciar o conteúdo do site.',
                'category' => 'produtividade',
                'sort_order' => 2,
                'is_active' => true,
                'open_in_new_tab' => false,
            ],
            [
                'title' => 'GitHub',
                'subtitle' => 'Repositório do projeto',
                'url' => 'https://github.com',
                'icon' => 'heroicon-o-code-bracket',
                'color' => '#6b7280',
                'description' => 'Veja o código fonte e contribua para o desenvolvimento do projeto.',
                'category' => 'desenvolvimento',
                'sort_order' => 3,
                'is_active' => true,
                'open_in_new_tab' => true,
            ],
            [
                'title' => 'Tailwind CSS',
                'subtitle' => 'Framework CSS',
                'url' => 'https://tailwindcss.com',
                'icon' => 'heroicon-o-paint-brush',
                'color' => '#06b6d4',
                'description' => 'Framework CSS utility-first para criar interfaces modernas rapidamente.',
                'category' => 'design',
                'sort_order' => 4,
                'is_active' => true,
                'open_in_new_tab' => true,
            ],
            [
                'title' => 'Vite',
                'subtitle' => 'Build tool',
                'url' => 'https://vitejs.dev',
                'icon' => 'heroicon-o-bolt',
                'color' => '#8b5cf6',
                'description' => 'Ferramenta de build rápida e moderna para desenvolvimento frontend.',
                'category' => 'desenvolvimento',
                'sort_order' => 5,
                'is_active' => true,
                'open_in_new_tab' => true,
            ],
            [
                'title' => 'Composer',
                'subtitle' => 'Gerenciador de dependências',
                'url' => 'https://getcomposer.org',
                'icon' => 'heroicon-o-cube',
                'color' => '#10b981',
                'description' => 'Gerenciador de dependências para PHP, essencial para projetos Laravel.',
                'category' => 'desenvolvimento',
                'sort_order' => 6,
                'is_active' => true,
                'open_in_new_tab' => true,
            ],
        ];

        foreach ($items as $item) {
            MegaMenuItem::create($item);
        }
    }
}
