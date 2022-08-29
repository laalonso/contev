<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_companies', function (Blueprint $table) {
            $table->id();
            $table->string('street',100);
            $table->string('zip_code',20);
            $table->bigInteger('number');
            $table->text('description');
           $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->unsignedbigInteger('locality_id');
            $table->foreign('locality_id')->references('id')->on('localities')->onDelete('cascade');
            $table->unsignedbigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_companies');
    }
}
