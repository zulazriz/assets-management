<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Specify the database connection.
     */
    protected $connection = 'mysql'; // Set your desired connection here

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if the 'supports' table doesn't exist before creating it
        if (!Schema::connection($this->connection)->hasTable('supports')) {
            Schema::connection($this->connection)->create('supports', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('initiate_user_id')->index('supports_initiate_user_id_foreign');
                $table->string('subject');
                $table->enum('status', ['sent', 'reviewed', 'closed', 'solved'])->default('sent');
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the 'supports' table if it exists
        if (Schema::connection($this->connection)->hasTable('supports')) {
            Schema::connection($this->connection)->dropIfExists('supports');
        }
    }
};
