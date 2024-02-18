<?php

use App\Models\CardType;
use App\Models\Section;
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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('body');
            $table->foreignIdFor(CardType::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Section::class, 'section_id')->nullable()->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('counter_number')->nullable();
            $table->json('counter_text')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
