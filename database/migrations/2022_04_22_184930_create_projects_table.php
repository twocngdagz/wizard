<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->text('description');
            $table->string('audience');
            $table->boolean('is_language_preference')->default(false);
            $table->string('language_preference')->nullable()->default(null);
            $table->boolean('is_software_buildup')->default(false);
            $table->boolean('is_software_buildup_code_expert')->default(false);
            $table->boolean('is_design_element')->default(false);
            $table->boolean('is_design_element_code_expert')->default(false);
            $table->date('final_map_date')->nullable()->default(null);
            $table->date('final_design_element_date')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
