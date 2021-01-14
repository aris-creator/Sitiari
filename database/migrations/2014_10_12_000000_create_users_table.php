<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
                'name' => 'admin',
                'email' => 'admin@me.com',
                'password' => Hash::make('qwertyuiop'),
                'created_at' => '2019-12-02',
            )
        );

        DB::table('users')->insert(
            array(
                'name' => 'Admin Magang',
                'email' => 'admin-magang@me.com',
                'password' => Hash::make('qwertyuiop'),
                'created_at' => '2019-12-02',
            )
        );

        DB::table('users')->insert(
            array(
                'name' => 'Admin Magang Juga',
                'email' => 'admin-magang-juga@me.com',
                'password' => Hash::make('qwertyuiop'),
                'created_at' => '2019-12-02',
            )
        );

        DB::table('users')->insert(
            array(
                'name' => 'Admin Magang Lagi',
                'email' => 'admin-magang-lagi@me.com',
                'password' => Hash::make('qwertyuiop'),
                'created_at' => '2019-12-02',
            )
        );

        DB::table('users')->insert(
            array(
                'name' => 'Admin Magang Terus',
                'email' => 'admin-magang-terus@me.com',
                'password' => Hash::make('qwertyuiop'),
                'created_at' => '2019-12-02',
            )
        );
        
        DB::table('users')->insert(
            array(
                'name' => 'Admin Magang Aja',
                'email' => 'admin-magang-aja@me.com',
                'password' => Hash::make('qwertyuiop'),
                'created_at' => '2019-12-02',
            )
        );
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
