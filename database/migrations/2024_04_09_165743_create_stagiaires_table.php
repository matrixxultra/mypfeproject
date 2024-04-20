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
        Schema::create('stagiaires', function (Blueprint $table) {
            $table->id();
            $table->string("name",20);
            $table->string("prenom",20);
            $table->string("email",30)->unique();
            $table->string("password");
            $table->string("phone_number", 20);
            $table->string("Cin",10)->unique();
            $table->string("addresse", 80);
            $table->unsignedBigInteger("groupe_id");
            $table->unsignedBigInteger("filiere_id");
            $table->foreign("groupe_id")->references("id")->on("groupes")->onDelete("cascade") ;
            $table->foreign("filiere_id")->references("id")->on("filieres")->onDelete("cascade") ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stagiaires');
    }
};
