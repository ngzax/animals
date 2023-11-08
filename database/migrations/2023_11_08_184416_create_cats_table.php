<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::table('animals', function (Blueprint $table) {
      $table->dropColumn('is_litter_trained')->default(false);
    });

    Schema::create('cats', function (Blueprint $table) {
      $table->unsignedBigInteger('animal_id');
      $table->boolean('is_litter_trained')->default(false);
      $table->timestamps();
      $table->foreign('animal_id')->references('id')->on('animals');
    });
    DB::statement("insert into cats(animal_id) select id from animals where type = 'Cat'");
  }

  public function down(): void {
    Schema::dropIfExists('cats');
  }
};
