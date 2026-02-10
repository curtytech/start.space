<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public static function seedForUser(int $userId): void
    {
        foreach (self::defaultItems() as $item) {
            $item['user_id'] = $userId;
            Category::firstOrCreate(
                ['user_id' => $userId, 'slug' => $item['slug']],
                $item
            );
        }
    }
    private static function defaultItems(): array
    {
         return [
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
            [
                'name' => 'Educação',
                'slug' => 'education',
                'description' => 'Cursos e aprendizado online',
                'color' => '#6366F1',
                'sort_order' => 20,
                'is_active' => true,
            ],
            [
                'name' => 'Finanças',
                'slug' => 'finance',
                'description' => 'Bancos e investimentos',
                'color' => '#16A34A',
                'sort_order' => 21,
                'is_active' => true,
            ],
            [
                'name' => 'Comunicação',
                'slug' => 'communication',
                'description' => 'Ferramentas e plataformas de comunicação',
                'color' => '#3B82F6',
                'sort_order' => 22,
                'is_active' => true,
            ],
            [
                'name' => 'YouTec',
                'slug' => 'youtec',
                'description' => 'Soluções e ferramentas da plataforma YouTec',
                'color' => '#8B5CF6',
                'sort_order' => 23,
                'is_active' => true,
            ],
        ];
    }

     public function run(): void
    {
        $adminUser = User::where('role', 'admin')->first()
            ?? User::first()
            ?? User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@admin',
                'role' => 'admin',
            ]);

        $userId = $adminUser->id;

        self::seedForUser($userId);
    }
}