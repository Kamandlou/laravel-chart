<?php

namespace Kamandlou\LaravelChart\Support;

class Chart
{
    /**
     * @param string $view
     * @param array $data
     * @return mixed
     */
    public function render(string $view, array $chartData, array $data = [])
    {
        return view($view, array_merge([
            'chartData' => json_encode($chartData),
        ], $data));
    }

    protected function defaultData()
    {
        return [
            'type' => 'bar',
            'data' => [
                'labels' => ['Red', 'Blue', 'Yellow'],
                'datasets' => [
                    [
                        'label' => '# of Votes',
                        'data' => [12, 19, 3],
                        'backgroundColor' => [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                        ],
                        'borderColor' => [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                        ],
                        'borderWidth' => 1
                    ]
                ]
            ],
            'options' => [
                'scales' => [
                    'y' => [
                        'beginAtZero' => true
                    ]
                ]
            ]
        ];
    }
}
