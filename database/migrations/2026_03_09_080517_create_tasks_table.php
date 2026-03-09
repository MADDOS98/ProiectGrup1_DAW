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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Acesta este ID-ul (Identificator unic)
            $table->string('nume'); // Numele activității
            $table->text('descriere')->nullable(); // Descrierea activității
            // Starea sub formă de Enum
            $table->enum('stare', ['In curs', 'Finalizata', 'Anulata'])->default('In curs');
            $table->timestamps(); // Generază automat data_crearii (created_at) și updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
