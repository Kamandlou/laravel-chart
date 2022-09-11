# Laravel Chart

Laravel chart is a customizable and flexible package for creating chart in Laravel.

# Installation

1. Install the package and its dependencies using Composer:

   `composer require kamandlou/laravel-chart`
2. Publish package files using Artisan command:

   `php artisan chart:install`

# Usage Guide

### Add scripts to your page:
- `<script src="{{ asset('js/chart.js/dist/chart.min.js') }}"></script>`
- ```
  <script>
    {!! $chartScript !!}
  </script>
  ```
### Create a canvas in your page:
- `<canvas id="myChart"></canvas>`
### You have two way to use
   ```
     return Chart::chart('myChart', [
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
    ])->render('index');
   ```
### Or
```
return Chart::id('myChart')
        ->type('bar')
        ->labels(['Red', 'Blue', 'Yellow'])
        ->datasets([
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
        ])
        ->options([
            'scales' => [
                'y' => [
                    'beginAtZero' => true
                ]
            ]
        ])
        ->render('index');
```
### for see more option go to chart.js documention

[Chart.js Document](https://www.chartjs.org/docs/latest/getting-started/)
