<?php

namespace App\Steps\Projects;

use Vildanbina\LivewireWizard\Components\Step;

class StepOne extends Step
{
    protected string $view = 'projects.wizard.step_one';

    public function mount()
    {
        $this->mergeState([
            'type' => $this->model->type,
            'description' => $this->model->description,
            'audience' => $this->model->audience,
        ]);
    }

    public function icon(): string
    {
        return 'check';
    }

    public function title(): string
    {
        return __('1');
    }

    public function validate()
    {
        return [
            [
                'state.type' => ['required', 'string', 'max:255'],
                'state.description' => ['required', 'string', 'max:255'],
                'state.audience' => ['required', 'array'],
            ],
            [],
            [
                'state.type' => __('Product Type'),
                'state.description' => __('Solution Description'),
                'state.audience' => __('Audience'),
            ],
        ];
    }
}
