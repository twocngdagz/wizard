<?php

namespace App\Steps\Projects;

use Illuminate\Validation\Rule;
use Vildanbina\LivewireWizard\Components\Step;

class StepTwo extends Step
{
    protected string $view = 'projects.wizard.step_two';

    public function mount()
    {
        $this->mergeState([
            'is_language_preference' => $this->model->is_language_preference ?? 'false',
            'language_preference' => $this->model->language_preference,
            'is_software_buildup' => $this->model->is_software_buildup ?? 'true',
            'is_software_buildup_code_expert' => $this->model->is_software_buildup_code_expert ?? 'true',
            'is_design_element' => $this->model->is_design_element ?? 'true',
            'is_design_element_code_expert' => $this->model->is_design_element_code_expert ?? 'true',
            'final_map_date' => $this->model->final_map_date,
            'final_design_element_date' => $this->model->final_design_element_date,
        ]);
    }

    public function icon(): string
    {
        return 'check';
    }

    public function validate()
    {
        return [
            [
                'state.is_language_preference' => ['required', 'string', Rule::in(['true', 'false'])],
                'state.language_preference' => [
                    Rule::requiredIf($this->getLivewire()->getState()['is_language_preference'] === 'true'),
                    'nullable',
                    'max:255'
                ],
                'state.is_software_buildup_code_expert' => [
                    Rule::requiredIf($this->getLivewire()->getState()['is_software_buildup'] === 'false')
                ],
                'state.final_map_date' => [
                    Rule::requiredIf($this->getLivewire()->getState()['is_software_buildup_code_expert'] === 'false')
                ],
                'state.final_design_element_date' => [
                    Rule::requiredIf($this->getLivewire()->getState()['is_design_element_code_expert'] === 'false')
                ]
            ],
            [],
            [
                'state.language_preference' => __('Coding Language Preference'),
                'state.final_map_date' => __('Final Map Date'),
                'state.final_design_element_date' => __('Final Design Element Date'),
            ],
        ];
    }

    public function title(): string
    {
        return __('2');
    }

    public function save($state)
    {
        $project = $this->model;
        $project->type = $state['type'];
        $project->description = $state['description'];
        $project->audience = json_encode($state['audience']);
        $project->is_language_preference = $state['is_language_preference'] === 'true' ? true:false;
        $project->language_preference = $state['language_preference'];
        $project->is_software_buildup = $state['is_software_buildup'] === 'true'?true:false;
        $project->is_software_buildup_code_expert = $state['is_software_buildup_code_expert'] === 'true'?true:false;
        $project->is_design_element = $state['is_design_element'] === 'true'?true:false;
        $project->is_design_element_code_expert = $state['is_design_element_code_expert'] === 'true'?true:false;
        $project->final_map_date = $state['final_map_date'];
        $project->final_design_element_date = $state['final_design_element_date'];

        $project->save();
    }
}
