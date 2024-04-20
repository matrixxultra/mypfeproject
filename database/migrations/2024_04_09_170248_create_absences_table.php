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
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("stagiaire_id");
            $table->unsignedBigInteger("formateur_id");
            $table->unsignedBigInteger("module_id");
            $table->string("la_date")->default(date("d-m-Y"));
            $table->string("matin1",10)->default('P')->nullable();
            $table->string("matin2",10)->default('P')->nullable();
            $table->string("soir1",10)->default('P')->nullable();
            $table->string("soir2",10)->default('P')->nullable();
            $table->string("status",15)->nullable();
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
        Schema::dropIfExists('absences');
    }
};
