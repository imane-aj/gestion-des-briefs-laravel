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
        Schema::create('student_briefs', function (Blueprint $table) {
            $table->string('student_token')->index()->unique();
            $table->string('brief_token')->index();
            $table->foreign('student_token')->references('token')->on('students')->onDelete('cascade');
            $table->foreign('brief_token')->references('token')->on('briefs')->onDelete('cascade');
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
        Schema::dropIfExists('student_briefs');
    }
};
