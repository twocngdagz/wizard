<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $cast = [
        'audience' => 'array',
        'is_language_preference' => 'boolean',
        'is_software_buildup' => 'boolean',
        'is_software_buildup_code_expert' => 'boolean',
        'is_design_element' => 'boolean',
        'is_design_element_code_expert' => 'boolean',
        'final_map_date' => 'date',
        'final_design_element_date' => 'date',
    ];
}
