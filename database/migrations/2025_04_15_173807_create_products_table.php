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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                ->nullable()->constrained('categories')
                ->onDelete('set null');
            $table->string('name', 100);
            $table->string('image', 255)->nullable();
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('unit', 100);
            $table->unsignedInteger('vat');
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
