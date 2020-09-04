
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
              $table->bigIncrements('id');
              $table->date('tanggal_order');
              $table->integer('jml_pesanan');
              $table->integer('total_harga');
              $table->unsignedBigInteger('id_cs');
              $table->unsignedBigInteger('id_p');

              $table->foreign('id_cs')->references('id_cs')->on('cs');
              $table->foreign('id_p')->references('id_p')->on('product');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
