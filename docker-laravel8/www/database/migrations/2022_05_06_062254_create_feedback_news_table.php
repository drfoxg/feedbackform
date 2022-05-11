<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_news', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('countryId');
            $table->string('username', 40);
            $table->decimal('phone', 10, 0);
            $table->string('message', 5000);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback_news');
    }
}
