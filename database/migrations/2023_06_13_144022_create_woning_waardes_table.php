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
        Schema::create('woning_waardes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->string('naam');
            $table->string('email');
            $table->string('postcode');
            $table->string('huisnummer');
            $table->string('woningtype');
            $table->string('onderhoud');
            $table->float('woonoppervlakte');
            $table->float('perceeloppervlakte');
            $table->decimal('waarde', 13, 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('woning_waardes');
    }
};
