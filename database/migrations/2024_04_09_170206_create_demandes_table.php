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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string("name",20);
            $table->string("email",30)->unique();
            $table->integer("age");
            $table->unsignedBigInteger("filiere_id");
            $table->foreign("filiere_id")->references("id")->on("filieres")->onDelete("cascade");
            $table->unsignedBigInteger("bac_id");
            $table->integer("note_bac");
            $table->foreign("bac_id")->references("id")->on("bacs") ;
            $table->string("status",15)->default("en_cours");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
