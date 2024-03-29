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
        Schema::create('tbl_admin', function (Blueprint $table) {
            $table->increments('admin_id');
            $table->string('admin_email',100);//max 100
            $table->string('admin_password'); 
            $table->string('admin_name');
            $table->string('admin_phone');      
            $table->timestamps();
        });
    }

    /**
     * php artisan make:migration create_tbl_admin_table --create=tbl_admin
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_admin');
    }
};
