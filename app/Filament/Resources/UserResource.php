<?php

namespace App\Filament\Resources;

use App\Exports\UsersExport;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    
    protected static ?string $navigationGroup = 'UserManagement'; 

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Nama')->required(),
                TextInput::make('telpon')->label('Telpon')->required(),
                \Filament\Forms\Components\Select::make('jenis_kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->label('Jenis Kelamin')
                    ->required(),
                TextInput::make('alamat')->label('Alamat')->required(),
                TextInput::make('NIK')->label('NIK')->required(),
                \Filament\Forms\Components\FileUpload::make('foto_profile')
                    ->image()
                    ->maxSize(2048)
                    ->label('Foto Profil'),
                TextInput::make('email')->email()->label('Email')->required(),
                TextInput::make('password')->password()->label('Password')->required(),
                Select::make('roles')
                ->label('Role')
                ->relationship('roles', 'name')
                ->searchable()
                ->preload()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('password'),
                TextColumn::make('email_verified_at'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Action::make('export')
                    ->label('Export to Excel')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function (array $data, Table $table) {
                        // Get current filters
                        $filters = $table->getFilters();
                        $filterData = [];
                        
                        foreach ($filters as $filter) {
                            if ($filter->getName() === 'created_at') {
                                $filterData = $filter->getState();
                            }
                        }

                        return Excel::download(
                            new UsersExport($filterData), 
                            'users-' . date('Y-m-d-H-i-s') . '.xlsx'
                        );
                    }),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
