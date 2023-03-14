<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->string('cep');
            $table->string('address');
            $table->string('complement')->nullable();
            $table->integer('number');
            $table->string('district');
            $table->string('state');
            $table->string('city');
            $table->timestamps();

            $table->foreign('patient_id')
            ->references('id')
            ->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('address', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);
        });

        Schema::dropIfExists('address');
    }
};
