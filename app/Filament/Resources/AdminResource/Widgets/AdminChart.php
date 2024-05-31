<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use Filament\Widgets\ChartWidget;

class AdminChart extends ChartWidget
{
    protected static ?string $heading = 'Crecimiento Institucional';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Meses Del Año',
                    'data' => [0, 2, 5, 10, 20, 30, 45, 55, 67, 73, 77, 89],
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
