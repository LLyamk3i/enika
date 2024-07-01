<?php

namespace App\Filament\Widgets;

use App\Models\Sector;
use App\Models\Category;
use Filament\Widgets\ChartWidget;

class ReportsChart extends ChartWidget
{
    protected static ?string $heading = 'Graphique des secteurs';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        // Récupérer les données pour le graphique
        $categories = Category::all();
        $sectors = Sector::all();

        $categoryData = [];
        $sectorData = [];
        $labels = [];

        // Récupérer les données par catégorie
        foreach ($categories as $category) {
            $labels[] = $category->name;
            $categoryData[] = 23;
        }

        // Récupérer les données par secteur
        foreach ($sectors as $sector) {
            $labels[] = $sector->name;
            $sectorData[] = 10;
        }

        $data['labels'] = $labels;
        $data['datasets'] = [
            [
                'label' => 'Reports by Category',
                'data' => $categoryData,
                'backgroundColor' => [
                    '#FF6384',
                    '#36A2EB',
                    '#FFCE56',
                    '#4BC0C0',
                    '#9966FF',
                    '#FF9F40'
                ],
            ],
            [
                'label' => 'Reports by Sector',
                'data' => $sectorData,
                'backgroundColor' => [
                    '#FF9F40',
                    '#4BC0C0',
                    '#FF6384',
                    '#9966FF',
                    '#36A2EB',
                    '#FFCE56',
                ],
            ],
        ];

        return $data;
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
