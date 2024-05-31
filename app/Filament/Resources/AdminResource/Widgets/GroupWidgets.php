<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Group;
use App\Models\Student;
use Filament\Forms\Components\Card;
use App\Models\User;


class GroupWidgets extends BaseWidget
{
    protected function getStats(): array
    {
       $TotalStudents = Student::count();
       $TotalUsers = User::count();
       $TotalGroups = Group::count();

        return [
        Stat::make('Total De Usuarios Registrados:', $TotalUsers)
            ->color('success')
            ->description('Instructores Totales')
            ->icon('heroicon-o-user-group'),
        
        Stat::make('Total De Grupos Registrados: ', $TotalGroups)
            ->color('primary')
            ->description('Grupos Totales')
            ->icon('heroicon-o-user-group'),
        
               
        Stat::make('Total De Estudiantes Registrados: ', $TotalStudents)
        ->color('warning')
        ->description('Estudiantes Totales')
        ->icon('heroicon-o-user-group'),
            


        ];
    }
}
