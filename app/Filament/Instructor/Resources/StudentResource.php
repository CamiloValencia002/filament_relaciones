<?php

namespace App\Filament\Instructor\Resources;

use App\Filament\Instructor\Resources\StudentResource\Pages;
use App\Filament\Instructor\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-s-user';
    protected static ?string $label = 'Estudiante';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nombre')
                    ->placeholder('Ingrese Su Nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('document')
                    ->label('documento')
                    ->placeholder('Número de documento')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\Select::make('group_id')
                    ->relationship(name: 'group', titleAttribute:'name') // el title sirve para mostrar el campo de la bd
                    ->label('Grupo')
                    ->placeholder('Seleccione el grupo')
                    ->required(),
                    Forms\Components\Select::make('group_id')
                    ->relationship(name: 'group', titleAttribute:'location') // el title sirve para mostrar el campo de la bd
                    ->label('Ambiente')
                    ->placeholder('Seleccione el ambiente')
                    ->required(),
                Forms\Components\Select::make('group_id')
                ->relationship(name: 'group', titleAttribute:'ficha') // el title sirve para mostrar el campo de la bd
                ->label('Ficha')
                ->placeholder('Seleccione la ficha')
                    ->required()
                   
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('Nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('document')
                    ->searchable(),
                Tables\Columns\TextColumn::make('group')
                ->label('Grupo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('group.amount')
                ->label('Cantidad Aprendices')
                ->searchable(),
                Tables\Columns\TextColumn::make('classroom')
                ->label('Ambiente')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            // ->filters([
            //     SelectFilter::make('name')
            //         ->options([
            //             'Felipe Londono' => 'Felipe londono',
            //             'admin' => 'admin',
                        
            //         ])
            // ])
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
