<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('companename',100);
            $table->string('email',100)->nullable();
            $table->string('alt_email',100)->nullable();
            $table->string('ph_no',50)->nullable();
            $table->string('alt_ph_no',50)->nullable();
            $table->string('fax',50)->nullable();
            $table->string('alt_fax',50)->nullable();
            $table->string('whatsapp',50)->nullable();
            $table->string('website',100)->nullable();
            $table->text('address')->nullable();
            $table->text('head_address')->nullable();
            $table->string('fb_link',255)->nullable();
            $table->string('twitter_link',255)->nullable();
            $table->string('insta_link',255)->nullable();
            $table->string('youtube_link',255)->nullable();
            $table->string('linkedin_link',255)->nullable();
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
        Schema::dropIfExists('settings');
    }
}
