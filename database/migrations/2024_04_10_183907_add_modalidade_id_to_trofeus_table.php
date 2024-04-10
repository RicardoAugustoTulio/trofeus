<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::table('trofeus', function (Blueprint $table) {
      $table->foreignId('modalidade_id');
      $table->foreign('modalidade_id')->references('id')->on('modalidades');

    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('trofeus', function (Blueprint $table) {
      $table->dropForeign('modalidade_id');
      $table->dropColumn('modalidade_id');
    });
  }
};
