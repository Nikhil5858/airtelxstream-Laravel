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
        Schema::create('user_subscriptions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subscription_id')->constrained()->cascadeOnDelete();

            $table->date('start_date');
            $table->date('end_date');

            $table->string('status')->default('active');

            // optional / nullable (no transaction logic)
            $table->string('payment_type')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('transaction_number')->nullable();

            $table->boolean('is_autorenew')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_subscriptions');
    }
};
