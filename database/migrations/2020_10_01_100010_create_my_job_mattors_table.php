<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyJobMattorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_job_mattors', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("description");
            $table->string("category")->nullable();
            $table->string("subcategory")->nullable();
            $table->string("location");
            $table->string("website");
            $table->string("email");
            $table->string("phone");
            $table->string("whatsapp");
            $table->string("price");
            $table->foreignId("user_id")->nullable()->constrained();
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
        Schema::dropIfExists('my_job_mattors');
    }
}
