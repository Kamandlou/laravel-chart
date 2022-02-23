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
}
