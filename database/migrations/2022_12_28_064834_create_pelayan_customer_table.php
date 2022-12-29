<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelayanCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelayan_customer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id') -> constrained() -> onDelete('cascade');
            $table->foreignId('pelayan_id') -> constrained() -> onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelayan_customer');
    }
}
