<?php

use App\Models\User;
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
            $table->string('avatar')->nullable();
            $table->string('login');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();

            $table->string('phone', 100)->nullable();
            
            $table->date('dob')->nullable();

            $table->enum('gender', ['male', 'female', 'other'])->nullable()->default('other');
            
            // Country Id
            $table->bigInteger('country_id')->unsigned()->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');    
            
            // Role Id
            $table->bigInteger('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            
            $table->string('company', 250)->nullable();

            $table->enum('status', User::ACCOUNT_STATUSES)->nullable()->default('active');
            
            $table->json('contact_options')->nullable();
            
            $table->string('website', 250)->nullable();
            $table->boolean('is_verified')->default(false);
            
            $table->string('fax', 100)->nullable();
            
            $table->json('location')->nullable();
            $table->json('social_links')->nullable();
            
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
