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
        Schema::create('images', function (Blueprint $table) {
            $table->id();

            $table -> string('Description');
            $table -> longText('imageUrl'); 
            $table -> string('creationUser')->default('user');

            $table->timestamp('creationDate')->nullable();
            $table->timestamp('modificationDate')->nullable();
            $table -> boolean('status')->default(true);  

            $table -> boolean('is_Active')->default(true);  

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
