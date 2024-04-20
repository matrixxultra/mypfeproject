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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("stagiaire_id");
            $table->unsignedBigInteger("formateur_id");
            $table->unsignedBigInteger("module_id");
            $table->string("controle_1",10)->nullable();
            $table->string("controle_2",10)->nullable();
            $table->string("controle_3",10)->nullable();
            $table->string("EFM",10)->dafault("-")->nullable();
            $table->string("EFR",10)->dafault("-")->nullable();
            $table->foreign("module_id")->references("id")->on("modules")->onDelete("cascade");
            $table->foreign("formateur_id")->references("id")->on("formateurs")->onDelete("cascade");
            $table->foreign("stagiaire_id")->references("id")->on("stagiaires")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
