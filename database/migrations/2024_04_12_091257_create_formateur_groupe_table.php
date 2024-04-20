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
        Schema::create('formateur_groupe', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("formateur_id");
            $table->unsignedBigInteger("groupe_id");
            $table->foreign("groupe_id")->references("id")->on("groupes")->onDelete("cascade");
            $table->foreign("formateur_id")->references("id")->on("formateurs")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formateur_groupe');
    }
};
