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
        Schema::create('signatures', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->foreignId('requester_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->foreignUuid('document_uuid')
                ->constrained('documents')
                ->references('uuid')
                ->onDelete('cascade');
            $table->foreignId('signer_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->integer('status')->default(0);
            $table->timestamp('requested_at')->default(now());
            $table->timestamp('signed_at')->nullable();
            $table->text('signature')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signatures');
    }
};
