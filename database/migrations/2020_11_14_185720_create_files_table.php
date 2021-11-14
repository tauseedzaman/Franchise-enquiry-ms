<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('files')) {
            Schema::create('files', function (Blueprint $table) {
                $table->id();
                $table->uuid('uuid')->index();
                $table->string('name');
                $table->string('server_name');
                $table->string('extension');
                $table->string('disk');
                $table->string('path');
                $table->foreignId('ticket_reply_id')->nullable()->constrained('ticket_replies')->nullOnDelete();
                $table->foreignId('my_job_mattor_id')->nullable()->constrained('my_job_mattors')->nullOnDelete();
                $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
                $table->timestamps();
            });
        }
    }





    /**
     *
     *
     *
     * reply -> many files
     *
     *
     *
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
