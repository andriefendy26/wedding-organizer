<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemIncludeResource\Pages;
use App\Filament\Resources\ItemIncludeResource\RelationManagers;
use App\Models\ItemInclude;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ItemIncludeResource extends Resource
{
    protected static ?string $model = ItemInclude::class;
    protected static ?string $navigationGroup = 'Layanan'; 

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
     protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Select::make('include_id.nama_include'),
                TextInput::make('nama_item'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListItemIncludes::route('/'),
            'create' => Pages\CreateItemInclude::route('/create'),
            'edit' => Pages\EditItemInclude::route('/{record}/edit'),
        ];
    }
}
