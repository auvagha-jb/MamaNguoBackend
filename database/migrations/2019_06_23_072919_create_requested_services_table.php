<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestedServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requested_services', function (Blueprint $table) {
            $table->bigIncrements('serviceId');
            $table->integer('userId');//MamaNguo Id
            $table->integer('requesteeId');
            $table->string('description');
            $table->integer('quantity');
            $table->integer('cost');
            $table->double('longitude');
            $table->double('latitude');
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
        Schema::dropIfExists('requested_services');
    }
}
