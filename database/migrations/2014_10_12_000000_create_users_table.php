<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('avatar');
            $table->string('login');
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();

            $table->string('phone', 100)->nullable();
            
            $table->date('dob')->nullable();

            $table->enum('gender', ['male', 'female', 'other'])->nullable()->default('other');
            
            $table->bigInteger('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');           
            
            $table->json('contact_options')->nullable();
            
            $table->string('website', 255)->nullable();
            
            $table->string('fax', 100)->nullable();
            
            $table->json('location');
            $table->json('social_links');
            
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
