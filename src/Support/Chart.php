<?php

namespace Kamandlou\LaravelChart\Support;

class Chart
{
    protected string $id;
    protected array $parameters = [];

    public function chart(string $id, array $parameters): Chart
    {
        $this->id = $id;
        $this->parameters = $parameters;
        return $this;
    }

    public function id(string $id): Chart
    {
        $this->id = $id;
        return $this;
    }

    public function type(string $type): Chart
    {
        $this->parameters['type'] = $type;
        return $this;
    }

    public function labels(array $labels): Chart
    {
        $this->parameters['data']['labels'] = $labels;
        return $this;
    }

    public function datasets(array $dataasets): Chart
    {
        $this->parameters['data']['datasets'] = $dataasets;
        return $this;
    }

    public function options(array $options): Chart
    {
        $this->parameters['options'] = $options;
        return $this;
    }

    public function render(string $view, array $data = [])
    {
        $data = $this->reformatData($data);
        return view($view, $data);
    }

    protected function reformatData(array $data)
    {
        if (key_exists('chartScript', $data)) {
            throw new Exception('chartScript key is exists in array, please rename it');
        }
        return array_merge($data, [
            'chartScript' => $this->script()
        ]);
    }

    protected function parameters(): string
    {
        return json_encode($this->parameters);
    }

    protected function script()
    {
        return "
            const ctx{$this->id} = document.getElementById('{$this->id}').getContext('2d');
            const {$this->id} = new Chart(ctx{$this->id},{$this->parameters()});
        ";
    }
}




