<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CraeteVendorProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_profile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('web_url')->nullable();
            $table->string('contact_no')->nullable();
            $table->longText('image');
            $table->integer('auth_id');
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
        Schema::dropIfExists('vendor_profile');
    }
}
