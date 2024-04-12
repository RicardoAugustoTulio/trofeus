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
    Schema::create('trofeus', function (Blueprint $table) {
      $table->id();
      $table->string('nome', 255);
      $table->unsignedBigInteger('campus_id');
      $table->year('ano');
      $table->tinyInteger('colocacao');
      $table->unsignedBigInteger('status_id');
      $table->text('obs')->nullable();
      $table->string('url_imagem')->nullable();
      $table->timestamps();

      $table->foreign('campus_id')->references('id')->on('campus');
      $table->foreign('status_id')->references('id')->on('status_trofeus');
    });

  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('trofeus');
  }
};
