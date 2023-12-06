<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    // We dodn't need separate timestamps on our sub-table.
    Schema::table('cats', function (Blueprint $table) {
      $table->dropTimestamps();
    });

    DB::statement('CREATE OR REPLACE VIEW cat AS SELECT animals.*, cats.is_litter_trained FROM animals JOIN cats ON cats.animal_id = animals.id;');
  }

  public function down(): void {
    Schema::table('cats', function (Blueprint $table) {
      $table->timestamps();
    });

    DB::statement('DROP VIEW IF EXISTS cat;');
  }
};
