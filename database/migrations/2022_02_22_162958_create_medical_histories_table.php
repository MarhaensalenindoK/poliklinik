<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('examiner_id')->nullable();
            $table->uuid('patient_id');
            $table->date('date_checkup');
            $table->string('allergic')->nullable();
            $table->jsonb('been_diagnosed')->nullable();
            $table->jsonb('hospitalization_surgery')->nullable();
            $table->string('anamnesis');
            $table->longText('diagnosis')->nullable();
            $table->longText('physical_exam')->nullable();
            $table->longText('vital_sign')->nullable();
            $table->longText('description_action')->nullable();
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
        Schema::dropIfExists('medical_histories');
    }
}
