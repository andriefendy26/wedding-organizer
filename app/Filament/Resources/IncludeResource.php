<?php

namespace App\Filament\Resources;

use App\Filament\Clusters\Layanan as ClustersLayanan;
use App\Filament\Resources\IncludeResource\Pages;
use App\Filament\Resources\IncludeResource\RelationManagers;
use App\Filament\Resources\IncludeResource\RelationManagers\ItemIncludeRelationManager;
use App\Models\Includes;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IncludeResource extends Resource
{
    protected static ?string $model = Includes::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // protected static ?string $navigationGroup = 'Layanan';
     protected static ?int $navigationSort = 3;
    protected static ?string $cluster = ClustersLayanan::class;

     
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_include'),
                Repeater::make('ItemInclude')
                    ->relationship('ItemInclude')
                    ->schema([
                        TextInput::make('nama_item')->required(),
                    ])
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('nama_include')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            ItemIncludeRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIncludes::route('/'),
            'create' => Pages\CreateInclude::route('/create'),
            'edit' => Pages\EditInclude::route('/{record}/edit'),
        ];
    }
}
