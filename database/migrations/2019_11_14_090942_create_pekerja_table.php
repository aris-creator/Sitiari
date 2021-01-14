<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreatePekerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerja', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('status', ['tersedia', 'bekerja', 'resign','blacklist', 'pending'])->default('pending');
            $table->enum('jenisPekerjaan', ['pembantu', 'babysitter', 'perawat']);
            $table->timestamps();
        });

        //Create pembantu
        DB::table('pekerja')->insert(
            array(
                'email' => 'pembantu@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'pembantu',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'pembantu2@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'pembantu',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'pembantu3@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'pembantu',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'pembantu4@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'pembantu',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'pembantu5@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'pembantu',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'pembantu6@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'pembantu',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'pembantu7@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'pembantu',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'pembantu8@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'pembantu',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'pembantu9@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'pembantu',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'pembantu10@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'pembantu',
                
            )
        );

        //Create babysitter
        DB::table('pekerja')->insert(
            array(
                'email' => 'babysitter@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'babysitter',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'babysitter2@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'babysitter',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'babysitter3@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'babysitter',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'babysitter4@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'babysitter',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'babysitter5@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'babysitter',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'babysitter6@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'babysitter',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'babysitter7@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'babysitter',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'babysitter8@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'babysitter',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'babysitter9@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'babysitter',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'babysitter10@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'babysitter',
                
            )
        );

        //Create perawat
        DB::table('pekerja')->insert(
            array(
                'email' => 'perawat@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'perawat',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'perawat2@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'perawat',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'perawat3@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'perawat',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'perawat4@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'perawat',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'perawat5@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'perawat',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'perawat6@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'perawat',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'perawat7@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'perawat',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'perawat8@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'perawat',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'perawat9@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'perawat',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'email' => 'perawat10@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'perawat',
                
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
        Schema::dropIfExists('pekerja');
    }
}
