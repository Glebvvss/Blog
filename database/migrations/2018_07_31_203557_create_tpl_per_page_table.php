<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTplPerPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tpl_vars_per_page', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->unsignedInteger('page_id');
            $table->string('var_name', 255);
            $table->text('var_value');
            $table->string('var_type', 255);
            $table->unique(['page_id', 'var_name']);
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
        Schema::dropIfExists('tpl_vars_per_page');
    }
}
