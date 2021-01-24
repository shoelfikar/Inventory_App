<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyOnDetailTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_transactions', function (Blueprint $table) {
            $table->foreign('transaction_id')->references('id')->on('transactions')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
            $table->foreign('product_id')->references('id')->on('products')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_transactions', function (Blueprint $table) {
            $table->dropForeign(['product_id', 'transaction_id']);
        });
    }
}
