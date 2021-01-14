<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailMajikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_majikan', function (Blueprint $table) {
            $table->bigIncrements('id_detail_majikan');
            $table->unsignedBigInteger('id_majikan');
            $table->string('nama');
            $table->string('nomorKTP');
            $table->string('tel');
            $table->string('alamat');
            $table->string('fotoKTP');
            $table->string('fotoDiri');
            $table->timestamp('tanggalMasuk');
            $table->timestamp('tanggalKeluar')->nullable();
            $table->timestamps();
            $table->foreign('id_majikan')->references('id')->on('majikan');
        });

        DB::table('detail_majikan')->insert(
            array(
                'id_majikan' => '1',
                'nama' => 'Majikan 1',
                'nomorKTP' => '3208573452890031',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_majikan')->insert(
            array(
                'id_majikan' => '2',
                'nama' => 'Majikan 2',
                'nomorKTP' => '3208573452890031',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_majikan')->insert(
            array(
                'id_majikan' => '3',
                'nama' => 'Majikan 3',
                'nomorKTP' => '3208573452890031',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_majikan')->insert(
            array(
                'id_majikan' => '4',
                'nama' => 'Majikan 4',
                'nomorKTP' => '3208573452890031',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_majikan')->insert(
            array(
                'id_majikan' => '5',
                'nama' => 'Majikan 5',
                'nomorKTP' => '3208573452890031',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
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
        Schema::dropIfExists('detail_majikan');
    }
}
