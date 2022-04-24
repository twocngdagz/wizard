<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Steps\Projects\StepOne;
use App\Steps\Projects\StepTwo;
use Livewire\WithFileUploads;
use Vildanbina\LivewireWizard\WizardComponent;
use WireUi\Traits\Actions;

class ProjectWizard extends WizardComponent
{
    use WithFileUploads, Actions;
    public Project $project;

    public $pdf_software_buildup;
    public $pdf_software_designs;

    public array $steps = [
        StepOne::class,
        StepTwo::class,
    ];

    public function model() : Project
    {
        return new Project();
    }

    public function afterSave()
    {
        if ($this->pdf_software_buildup) {
            $this->getModel()->addMedia($this->pdf_software_buildup)->toMediaCollection('buildup');
        }
        if ($this->pdf_software_designs) {
            $this->getModel()->addMedia($this->pdf_software_designs)->toMediaCollection('designs');
        }

        $this->resetForm();
        $this->notification()->notify([
            'title'       => 'Project saved!',
            'description' => 'Your project was successfull saved',
            'icon'        => 'success'
        ]);
    }
}
