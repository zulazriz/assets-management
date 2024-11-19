<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Specify the database connection.
     */
    protected $connection = 'mysql';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if the 'notifications' table doesn't exist before creating it
        if (!Schema::connection($this->connection)->hasTable('notifications')) {
            Schema::connection($this->connection)->create('notifications', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('user_id')->index('notifications_user_id_foreign');
                $table->enum('type', ['info', 'warning', 'danger', 'success']);
                $table->string('title');
                $table->text('description');
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
        // Drop the 'notifications' table if it exists
        if (Schema::connection($this->connection)->hasTable('notifications')) {
            Schema::connection($this->connection)->dropIfExists('notifications');
        }
    }
};
