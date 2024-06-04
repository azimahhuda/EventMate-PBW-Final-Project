<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->date('date');
            $table->time('time');
            $table->string('location');
            $table->string('location_link')->nullable();
            $table->integer('capacity');
            $table->string('dresscode');
            $table->string('contact_person');
            $table->string('social_media_link')->nullable();
            $table->string('event_hashtag')->nullable();
            $table->boolean('attendance')->default(false);
            $table->boolean('polling')->default(false);
            $table->string('event_code', 6)->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}
