<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('city');
            $table->string('password');
            $table->integer('number_of_objects')->default(1);
            $table->string('contact_person');
            $table->string('email')->nullable($value = true);
            $table->string('phone')->nullable($value = true);
            $table->date('started_at');
            $table->double('one_institution_price', 10, 2);
            $table->date('paid_to');
            $table->double('paid_all', 10, 2);
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
        Schema::dropIfExists('customers');
    }
}
