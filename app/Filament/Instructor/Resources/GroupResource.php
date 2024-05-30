<?php

namespace App\Filament\Instructor\Resources;

use App\Filament\Instructor\Resources\GroupResource\Pages;
use App\Filament\Instructor\Resources\GroupResource\RelationManagers;
use App\Models\Group;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Auth;

class GroupResource extends Resource
{
    protected static ?string $model = Group::class;

    protected static ?string $navigationIcon = 'heroicon-s-user-group';
    protected static ?string $label = 'Grupos';
    protected static ?int $navigationSort = 2;

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::user()->id);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nombre')
                    ->placeholder('Ingrese Su Nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ficha')
                    ->label('Ficha')
                    ->placeholder('Número de ficha')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('amount')
                ->label('Cantidad')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('location')
                ->label('Ubicacion')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('classroom')
                ->label('Ambiente')
                    ->required()
                    ->maxLength(255)
                   
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('Nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ficha')
                    ->searchable(),
                Tables\Columns\TextColumn::make('amount')
                ->label('Cantidad Aprendices')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                ->label('Ubicacion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('classroom')
                ->label('Ambiente')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('user.name')
                // ->label('Instructor')
                // ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('name')
                    ->options([
                        'Felipe Londono' => 'Felipe londono',
                        'admin' => 'admin',
                        
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Editar'),
                Tables\Actions\DeleteAction::make()->label('Borrar'),
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
            'index' => Pages\ListGroups::route('/'),
            'create' => Pages\CreateGroup::route('/create'),
            'edit' => Pages\EditGroup::route('/{record}/edit'),
        ];
    }
}
