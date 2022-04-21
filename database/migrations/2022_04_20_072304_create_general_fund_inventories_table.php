<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_fund_inventories', function (Blueprint $table) {
            $table->id();
            $table->string('property_number');
            $table->string('quantity');
            $table->string('article');
            $table->string('description');
            $table->string('unit_value');
            $table->string('total_value');
            $table->string('location');
            $table->string('department');
            $table->string('enduser');
            $table->string('supplier');
            $table->string('account_code');
            $table->string('obr_number');
            $table->string('purchase_order_number');
            $table->string('date');
            $table->string('status');
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
        Schema::dropIfExists('general_fund_inventories');
    }
};
