<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('order_id');
            $table->decimal('price')->default(0);
            $table->decimal('delivery_price')->default(0);
            $table->longText('description')->nullable();
            $table->integer('duration')->default(0);
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->date('accepted_date')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('provider_id')
                ->references('id')
                ->on('providers')
                ->onDelete('Cascade');

            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
