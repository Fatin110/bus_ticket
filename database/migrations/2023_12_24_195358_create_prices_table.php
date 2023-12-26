<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Facade;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->string('from')->default('Dhaka');
            $table->string('to');
            $table->string('price');
            $table->timestamps();
        });

        DB::table('prices')->insert([
            ['from' => 'dhaka', 'to' => "cox's bazaar", 'price' => 1200],
            ['from' => 'dhaka', 'to' => 'chittagong', 'price' => 800],
            ['from' => 'dhaka', 'to' => 'comilla', 'price' => 400],
            ['from' => 'comilla', 'to' => "cox's bazaar", 'price' => 800],
            ['from' => 'comilla', 'to' => 'chittagong', 'price' => 400],
            ['from' => 'chittagong', 'to' => "cox's bazaar", 'price' => 400],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
