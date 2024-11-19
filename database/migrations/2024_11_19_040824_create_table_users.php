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
        // Check if the 'users' table doesn't exist before creating it
        if (!Schema::connection($this->connection)->hasTable('users')) {
            Schema::connection($this->connection)->create('users', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('profile_image')->nullable();
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                $table->enum('role', ['super_admin', 'company_admin', 'employee', 'customer', 'vendor', 'user']);
                $table->timestamp('user_disabled_at')->nullable();
                $table->timestamp('email_verified_at')->nullable();
                $table->rememberToken();
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
        // Drop the 'users' table if it exists
        if (Schema::connection($this->connection)->hasTable('users')) {
            Schema::connection($this->connection)->dropIfExists('users');
        }
    }
};
