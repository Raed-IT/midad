<?php

namespace App\Filament\Widgets;

use App\Models\Study;
use Carbon\Carbon;
use DB;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class StudtChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'studtChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected function getHeading(): ?string
    {
        return __('headers.studies');
    }

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {


        $data = Study::whereBetween('created_at', [Carbon::now()->subMonth()->format('Y-m-d') . " 00:00:00", Carbon::now()->format('Y-m-d') . " 23:59:59"])
            ->groupBy('date')
            ->orderBy('date')
            ->get([
                DB::raw('DATE_FORMAT(created_at, "%m-%d")   as date'),
                DB::raw('count(*) as total')
            ])
            ->pluck('total', 'date')->toArray();

        return [
            'chart' => [
                'type' => 'area',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => '',
                    'data' => array_values($data),

                ],

            ],
            'xaxis' => [
                'categories' => array_keys($data),
                'labels' => [
                    'style' => [
                        'colors' => '#f59e0b',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'colors' => '#f59e0b',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'colors' => ['#f59e0b'],
            'stroke' => [
                'curve' => 'smooth',
            ],
            'dataLabels' => [
                'enabled' => true,
            ],
        ];
    }
}
