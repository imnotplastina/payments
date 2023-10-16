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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->uuid();

            $table->string('status');

            $table->string('currency_id');
            $table->foreign('currency_id')
                ->references('id')
                ->on('currencies');

            $table->decimal('amount', 12, 2);

            $table->morphs('payable');

            $table->foreignId('method_id')
                ->index()
                ->nullable()
                ->constrained('payment_methods');

            $table->string('driver')
                ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
