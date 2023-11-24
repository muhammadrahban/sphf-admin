<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('victims', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->integer('filled_da_form_id');
            $table->string('da_cnic');
            $table->string('da_occupant_name');
            $table->string('gender');
            $table->string('district');
            $table->string('tehsil');
            $table->string('union_council');
            $table->string('deh');
            $table->string('widows')->default(false);
            $table->string('women_with_disable_husband');
            $table->string('divorced_abandoned_unmarried_older_dependent_on_others');
            $table->string('people_with_disability_physically_or_mentally');
            $table->string('unaccompained_minors_i_e_orphans');
            $table->string('unaccompained_elders_over_the_age_of_60');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('victims');
    }
};
