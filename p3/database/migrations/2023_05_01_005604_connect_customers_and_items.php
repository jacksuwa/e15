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
        Schema::table('items', function (Blueprint $table) {


            # nullable so you can have an item without an existing customer or membership
            $table->bigInteger('customer_id')->unsigned()->nullable();

            # The foreign key that connects the `customers` table based in 'id'
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {


            $table->dropForeign('items_customer_id_foreign');

            $table->dropColumn('customer_id');
        });
    }
};