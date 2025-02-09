<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailDrafts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_drafts', function (Blueprint $table) {
            $table->id();
            $table->string('mail_subject');
            $table->string('description');
            $table->string('body');
            $table->string('blog_created_at');
            $table->string('is_test_mail_sent');
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
        Schema::dropIfExists('mail_drafts');
    }
}
