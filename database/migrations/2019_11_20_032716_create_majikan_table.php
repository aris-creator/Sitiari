<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMajikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('majikan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('status', ['aktif', 'nonaktif', 'blacklist']);
            $table->timestamps();
        });

        //Create majikan
        DB::table('majikan')->insert(
            array(
                'email' => 'majikan@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'aktif',
                
            )
        );

        DB::table('majikan')->insert(
            array(
                'email' => 'majikan2@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'aktif',
                
            )
        );

        DB::table('majikan')->insert(
            array(
                'email' => 'majikan3@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'aktif',
                
            )
        );

        DB::table('majikan')->insert(
            array(
                'email' => 'majikan4@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'aktif',
                
            )
        );

        DB::table('majikan')->insert(
            array(
                'email' => 'majikan5@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'aktif',
                
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
        Schema::dropIfExists('majikan');
    }
}
