<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MegaMenuItemResource\Pages;
use App\Filament\Resources\MegaMenuItemResource\RelationManagers;
use App\Models\MegaMenuItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MegaMenuItemResource extends Resource
{
    protected static ?string $model = MegaMenuItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    
    protected static ?string $navigationLabel = 'Atalhos';
    
    protected static ?string $modelLabel = 'Item do Menu';
    
    protected static ?string $pluralModelLabel = 'Itens do Menu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informações Básicas')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Título')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('subtitle')
                            ->label('Subtítulo')
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
                            ->options([
                                'desenvolvimento' => 'Desenvolvimento',
                                'design' => 'Design',
                                'marketing' => 'Marketing',
                                'produtividade' => 'Produtividade',
                                'outros' => 'Outros',
                            ])
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
                        
                        Forms\Components\Toggle::make('open_in_new_tab')
                            ->label('Abrir em nova aba')
                            ->default(false),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('subtitle')
                    ->label('Subtítulo')
                    ->searchable()
                    ->limit(30),
                
                Tables\Columns\TextColumn::make('url')
                    ->label('URL')
                    ->limit(40)
                    ->copyable(),
                
                Tables\Columns\TextColumn::make('category')
                    ->label('Categoria')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'desenvolvimento' => 'success',
                        'design' => 'warning',
                        'marketing' => 'info',
                        'produtividade' => 'primary',
                        default => 'gray',
                    }),
                
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Ordem')
                    ->sortable(),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Ativo')
                    ->boolean(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Categoria')
                    ->options([
                        'desenvolvimento' => 'Desenvolvimento',
                        'design' => 'Design',
                        'marketing' => 'Marketing',
                        'produtividade' => 'Produtividade',
                        'outros' => 'Outros',
                    ]),
                
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->trueLabel('Apenas ativos')
                    ->falseLabel('Apenas inativos')
                    ->native(false),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order');
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', auth()->id());
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
            'index' => Pages\ListMegaMenuItems::route('/'),
            'create' => Pages\CreateMegaMenuItem::route('/create'),
            'edit' => Pages\EditMegaMenuItem::route('/{record}/edit'),
        ];
    }
}
