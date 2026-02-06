<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShortcutResource\Pages;
use App\Models\Category;
use App\Filament\Resources\ShortcutResource\RelationManagers;
use App\Models\Shortcut;
use App\View\Components\MegaMenu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ShortcutResource extends Resource
{
    protected static ?string $model = MegaMenu::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    
    protected static ?string $navigationLabel = 'Atalhos';
    
    protected static ?string $modelLabel = 'Atalho';
    
    protected static ?string $pluralModelLabel = 'Atalhos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informações Básicas')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nome')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('url')
                            ->label('URL')
                            ->required()
                            ->url()
                            ->maxLength(255),
                        
                        Forms\Components\Textarea::make('description')
                            ->label('Descrição')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('Aparência')
                    ->schema([
                        Forms\Components\TextInput::make('icon')
                            ->label('Ícone (Heroicon)')
                            ->placeholder('heroicon-o-home')
                            ->maxLength(255),
                        
                        Forms\Components\ColorPicker::make('color')
                            ->label('Cor')
                            ->default('#3b82f6'),
                        
                        Forms\Components\Select::make('category')
                            ->label('Categoria')
                            ->required()
                            ->options(
                                Category::activeOrdered()->pluck('name')
                            )
                            ->searchable()
                            ->preload(),
                    ])
                    ->columns(3),
                
                Forms\Components\Section::make('Configurações')
                    ->schema([
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Ordem')
                            ->numeric()
                            ->default(0)
                            ->minValue(0),
                        
                        Forms\Components\Toggle::make('is_active')
                            ->label('Ativo')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('url')
                    ->label('URL')
                    ->searchable()
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('category')
                    ->label('Categoria')
                    ->sortable(),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Ativo')
                    ->boolean()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Ordem')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListShortcuts::route('/'),
            'create' => Pages\CreateShortcut::route('/create'),
            'edit' => Pages\EditShortcut::route('/{record}/edit'),
        ];
    }
}
