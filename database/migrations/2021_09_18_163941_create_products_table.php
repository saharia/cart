<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('content');
            $table->double('price', 8, 2);
            $table->double('scale_price', 8, 2);
            $table->integer('quantity');
            $table->boolean('with_storehouse');
            $table->boolean('allow_checkout_when_out_of_stock');
            $table->double('weight', 8, 2);
            $table->double('length', 8, 2);
            $table->double('wide', 8, 2);
            $table->double('height', 8, 2);
            $table->boolean('is_featured');
            $table->bigInteger('added_by');
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
