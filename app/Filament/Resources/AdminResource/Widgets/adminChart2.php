<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use App\Models\Group;
use App\Models\Student;
use App\Models\User;
use Filament\Widgets\ChartWidget;

class AdminChart2 extends ChartWidget
{
    protected static ?string $heading = 'Total';

    protected function getData(): array
    {
        $totalUsers = User::count();
        $totalGroups = Group::count();
        $totalStudents = Student::count();

        return [
            'datasets' => [
                [
                    'label' => 'Usuarios registrados',
                    'data' => [$totalUsers],
                    'backgroundColor' => [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    'borderColor' => [
                        'rgba(155, 208, 245, 1)',
                        'rgba(255, 154, 162, 1)',
                        'rgba(255, 235, 153, 1)',
                    ],
                ],

                [
                    'label' => 'Grupo',
                    'data' => [ $totalGroups],
                    'backgroundColor' => [

                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    'borderColor' => [
  
                        'rgba(255, 154, 162, 1)',
                        'rgba(255, 235, 153, 1)',
                    ],
                ],

                [
                    'label' => 'Estudiantes',
                    'data' => [ $totalStudents],
                    'backgroundColor' => [


                        'rgba(255, 206, 86, 0.2)',
                    ],
                    'borderColor' => [
  

                        'rgba(255, 235, 153, 1)',
                    ],
                ],
            ],

            'labels' => ['Total usuarios registrados '],

            
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}