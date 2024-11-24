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
        if (!Schema::connection($this->connection)->hasTable('assets')) {
            Schema::connection($this->connection)->create('assets', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('computer_name');
                $table->enum('type', ['Laptop', 'Desktop']);
                $table->string('serial_number');
                $table->enum('manufacturer', ['Lenovo', 'Dell']);
                $table->string('model');
                $table->enum('os', ['Windows 10', 'Windows 11']);
                $table->string('description');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::connection($this->connection)->hasTable('assets')) {
            Schema::connection($this->connection)->dropIfExists('assets');
        }
    }
};
