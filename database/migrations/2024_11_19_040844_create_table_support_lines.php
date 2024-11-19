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
        // Check if the 'support_lines' table doesn't exist before creating it
        if (!Schema::connection($this->connection)->hasTable('support_lines')) {
            Schema::connection($this->connection)->create('support_lines', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('sender_user_id')->index('support_lines_sender_user_id_foreign');
                $table->unsignedBigInteger('support_id')->index('support_lines_support_id_foreign');
                $table->text('message');
                $table->text('attachments')->nullable();
                $table->timestamp('read_at')->nullable();
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
        // Drop the 'support_lines' table if it exists
        if (Schema::connection($this->connection)->hasTable('support_lines')) {
            Schema::connection($this->connection)->dropIfExists('support_lines');
        }
    }
};
