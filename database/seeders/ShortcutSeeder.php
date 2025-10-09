<?php

namespace Database\Seeders;

use App\Models\Shortcut;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShortcutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shortcuts = [
            // Redes Sociais
            [
                'name' => 'Facebook',
                'url' => 'https://www.facebook.com',
                'icon' => 'fab fa-facebook',
                'category' => 'social',
                'description' => 'Rede social para conectar com amigos e família',
                'sort_order' => 1,
                'color' => '#1877F2',
            ],
            [
                'name' => 'Instagram',
                'url' => 'https://www.instagram.com',
                'icon' => 'fab fa-instagram',
                'category' => 'social',
                'description' => 'Compartilhe fotos e vídeos',
                'sort_order' => 2,
                'color' => '#E4405F',
            ],
            [
                'name' => 'Twitter/X',
                'url' => 'https://x.com',
                'icon' => 'fab fa-x-twitter',
                'category' => 'social',
                'description' => 'Microblog e notícias em tempo real',
                'sort_order' => 3,
                'color' => '#000000',
            ],
            [
                'name' => 'LinkedIn',
                'url' => 'https://www.linkedin.com',
                'icon' => 'fab fa-linkedin',
                'category' => 'social',
                'description' => 'Rede profissional',
                'sort_order' => 4,
                'color' => '#0A66C2',
            ],
            [
                'name' => 'TikTok',
                'url' => 'https://www.tiktok.com',
                'icon' => 'fab fa-tiktok',
                'category' => 'social',
                'description' => 'Vídeos curtos e entretenimento',
                'sort_order' => 5,
                'color' => '#000000',
            ],
            [
                'name' => 'WhatsApp Web',
                'url' => 'https://web.whatsapp.com',
                'icon' => 'fab fa-whatsapp',
                'category' => 'social',
                'description' => 'Mensagens instantâneas',
                'sort_order' => 6,
                'color' => '#25D366',
            ],
            [
                'name' => 'Telegram Web',
                'url' => 'https://web.telegram.org',
                'icon' => 'fab fa-telegram',
                'category' => 'social',
                'description' => 'Mensagens seguras e rápidas',
                'sort_order' => 7,
                'color' => '#0088CC',
            ],
            [
                'name' => 'Discord',
                'url' => 'https://discord.com/app',
                'icon' => 'fab fa-discord',
                'category' => 'social',
                'description' => 'Chat para gamers e comunidades',
                'sort_order' => 8,
                'color' => '#5865F2',
            ],

            // Entretenimento
            [
                'name' => 'YouTube',
                'url' => 'https://www.youtube.com',
                'icon' => 'fab fa-youtube',
                'category' => 'entertainment',
                'description' => 'Vídeos e entretenimento',
                'sort_order' => 1,
                'color' => '#FF0000',
            ],
            [
                'name' => 'Netflix',
                'url' => 'https://www.netflix.com',
                'icon' => 'fas fa-film',
                'category' => 'entertainment',
                'description' => 'Filmes e séries online',
                'sort_order' => 2,
                'color' => '#E50914',
            ],
            [
                'name' => 'Spotify',
                'url' => 'https://open.spotify.com',
                'icon' => 'fab fa-spotify',
                'category' => 'entertainment',
                'description' => 'Música e podcasts',
                'sort_order' => 3,
                'color' => '#1DB954',
            ],
            [
                'name' => 'Twitch',
                'url' => 'https://www.twitch.tv',
                'icon' => 'fab fa-twitch',
                'category' => 'entertainment',
                'description' => 'Streaming de jogos ao vivo',
                'sort_order' => 4,
                'color' => '#9146FF',
            ],

            // Produtividade
            [
                'name' => 'Gmail',
                'url' => 'https://mail.google.com',
                'icon' => 'fas fa-envelope',
                'category' => 'productivity',
                'description' => 'Email do Google',
                'sort_order' => 1,
                'color' => '#EA4335',
            ],
            [
                'name' => 'Google Drive',
                'url' => 'https://drive.google.com',
                'icon' => 'fab fa-google-drive',
                'category' => 'productivity',
                'description' => 'Armazenamento em nuvem',
                'sort_order' => 2,
                'color' => '#4285F4',
            ],
            [
                'name' => 'Google Docs',
                'url' => 'https://docs.google.com',
                'icon' => 'fas fa-file-alt',
                'category' => 'productivity',
                'description' => 'Editor de documentos online',
                'sort_order' => 3,
                'color' => '#4285F4',
            ],
            [
                'name' => 'Notion',
                'url' => 'https://www.notion.so',
                'icon' => 'fas fa-sticky-note',
                'category' => 'productivity',
                'description' => 'Workspace tudo-em-um',
                'sort_order' => 4,
                'color' => '#000000',
            ],
            [
                'name' => 'Trello',
                'url' => 'https://trello.com',
                'icon' => 'fab fa-trello',
                'category' => 'productivity',
                'description' => 'Gerenciamento de projetos',
                'sort_order' => 5,
                'color' => '#0079BF',
            ],

            // Desenvolvimento
            [
                'name' => 'GitHub',
                'url' => 'https://github.com',
                'icon' => 'fab fa-github',
                'category' => 'development',
                'description' => 'Repositórios de código',
                'sort_order' => 1,
                'color' => '#181717',
            ],
            [
                'name' => 'Stack Overflow',
                'url' => 'https://stackoverflow.com',
                'icon' => 'fab fa-stack-overflow',
                'category' => 'development',
                'description' => 'Perguntas e respostas para desenvolvedores',
                'sort_order' => 2,
                'color' => '#F58025',
            ],
            [
                'name' => 'CodePen',
                'url' => 'https://codepen.io',
                'icon' => 'fab fa-codepen',
                'category' => 'development',
                'description' => 'Editor de código online',
                'sort_order' => 3,
                'color' => '#000000',
            ],
            [
                'name' => 'MDN Web Docs',
                'url' => 'https://developer.mozilla.org',
                'icon' => 'fas fa-book',
                'category' => 'development',
                'description' => 'Documentação web',
                'sort_order' => 4,
                'color' => '#000000',
            ],

            // E-commerce
            [
                'name' => 'Amazon',
                'url' => 'https://www.amazon.com.br',
                'icon' => 'fab fa-amazon',
                'category' => 'shopping',
                'description' => 'Compras online',
                'sort_order' => 1,
                'color' => '#FF9900',
            ],
            [
                'name' => 'Mercado Livre',
                'url' => 'https://www.mercadolivre.com.br',
                'icon' => 'fas fa-shopping-cart',
                'category' => 'shopping',
                'description' => 'Marketplace brasileiro',
                'sort_order' => 2,
                'color' => '#FFE600',
            ],
            [
                'name' => 'AliExpress',
                'url' => 'https://www.aliexpress.com',
                'icon' => 'fas fa-store',
                'category' => 'shopping',
                'description' => 'Compras internacionais',
                'sort_order' => 3,
                'color' => '#FF6A00',
            ],

            // Notícias
            [
                'name' => 'G1',
                'url' => 'https://g1.globo.com',
                'icon' => 'fas fa-newspaper',
                'category' => 'news',
                'description' => 'Portal de notícias',
                'sort_order' => 1,
                'color' => '#C4170C',
            ],
            [
                'name' => 'BBC News',
                'url' => 'https://www.bbc.com/news',
                'icon' => 'fas fa-globe',
                'category' => 'news',
                'description' => 'Notícias internacionais',
                'sort_order' => 2,
                'color' => '#BB1919',
            ],
            [
                'name' => 'Reddit',
                'url' => 'https://www.reddit.com',
                'icon' => 'fab fa-reddit',
                'category' => 'news',
                'description' => 'Agregador de notícias e discussões',
                'sort_order' => 3,
                'color' => '#FF4500',
            ],

            // Utilitários
            [
                'name' => 'Google Translate',
                'url' => 'https://translate.google.com',
                'icon' => 'fas fa-language',
                'category' => 'utilities',
                'description' => 'Tradutor online',
                'sort_order' => 1,
                'color' => '#4285F4',
            ],
            [
                'name' => 'Google Maps',
                'url' => 'https://maps.google.com',
                'icon' => 'fas fa-map-marker-alt',
                'category' => 'utilities',
                'description' => 'Mapas e navegação',
                'sort_order' => 2,
                'color' => '#4285F4',
            ],
            [
                'name' => 'Weather.com',
                'url' => 'https://weather.com',
                'icon' => 'fas fa-cloud-sun',
                'category' => 'utilities',
                'description' => 'Previsão do tempo',
                'sort_order' => 3,
                'color' => '#0099CC',
            ],
        ];

        foreach ($shortcuts as $shortcut) {
            Shortcut::create($shortcut);
        }
    }
}
