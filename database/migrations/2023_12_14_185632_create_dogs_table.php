<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void {
    Schema::create('dogs', function (Blueprint $table) {
      $table->unsignedBigInteger('animal_id');
      $table->boolean('is_guard')->default(false);
      $table->foreign('animal_id')->references('id')->on('animals');
    });
    DB::statement("insert into dogs(animal_id) select id from animals where type = 'Dog'");
    DB::statement('CREATE OR REPLACE VIEW dog AS SELECT animals.*, dogs.is_guard FROM animals JOIN dogs ON dogs.animal_id = animals.id;');
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('dogs');
    DB::statement('DROP VIEW IF EXISTS dog;');
  }
};
