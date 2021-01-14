<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPekerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pekerja', function (Blueprint $table) {
            $table->bigIncrements('id_detail_pekerja');
            $table->unsignedBigInteger('id_pekerja');
            $table->string('nama');
            $table->string('nomorKTP');
            $table->string('usia');
            $table->string('tel');
            $table->string('alamat');
            $table->string('keahlian');
            $table->string('kondisiKhusus')->nullable();
            $table->string('agama');
            $table->string('fotoKTP');
            $table->string('fotoDiri');
            $table->string('gaji')->default('1500000');
            $table->double('rating')->default(5);
            $table->timestamp('tanggalMasuk');
            $table->timestamp('tanggalKeluar')->nullable();
            $table->timestamps();
            $table->foreign('id_pekerja')->references('id')->on('pekerja');
        });

        //Create pembantu
        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '1',
                'nama' => 'Lani',
                'nomorKTP' => '3208573452890031',
                'usia' => '22',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '2',
                'nama' => 'Maimunah',
                'nomorKTP' => '3208573452890031',
                'usia' => '22',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '3',
                'nama' => 'Tuti',
                'nomorKTP' => '3208573452890031',
                'usia' => '22',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '4',
                'nama' => 'Tita',
                'nomorKTP' => '3208573452890031',
                'usia' => '22',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '5',
                'nama' => 'Tati',
                'nomorKTP' => '3208573452890031',
                'usia' => '22',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '6',
                'nama' => 'Zainab',
                'nomorKTP' => '3208573452890031',
                'usia' => '22',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '7',
                'nama' => 'Sri Hartati',
                'nomorKTP' => '3208573452890031',
                'usia' => '22',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '8',
                'nama' => 'Sumanti',
                'nomorKTP' => '3208573452890031',
                'usia' => '22',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '9',
                'nama' => 'Maryanah',
                'nomorKTP' => '3208573452890031',
                'usia' => '22',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '10',
                'nama' => 'Sri Ayu',
                'nomorKTP' => '3208573452890031',
                'usia' => '22',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        //Create babysitter
        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '11',
                'nama' => 'Lilia',
                'nomorKTP' => '3208573452890031',
                'usia' => '25',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '12',
                'nama' => 'Shea',
                'nomorKTP' => '3208573452890031',
                'usia' => '25',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '13',
                'nama' => 'Mediana',
                'nomorKTP' => '3208573452890031',
                'usia' => '25',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '14',
                'nama' => 'Laudia',
                'nomorKTP' => '3208573452890031',
                'usia' => '25',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '15',
                'nama' => 'Laias',
                'nomorKTP' => '3208573452890031',
                'usia' => '25',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '16',
                'nama' => 'Mirianne',
                'nomorKTP' => '3208573452890031',
                'usia' => '25',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '17',
                'nama' => 'Cassandra',
                'nomorKTP' => '3208573452890031',
                'usia' => '25',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '18',
                'nama' => 'Frey',
                'nomorKTP' => '3208573452890031',
                'usia' => '25',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '19',
                'nama' => 'Rephy',
                'nomorKTP' => '3208573452890031',
                'usia' => '25',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '20',
                'nama' => 'Artemia',
                'nomorKTP' => '3208573452890031',
                'usia' => '25',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        //Create perawat
        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '21',
                'nama' => 'Nana',
                'nomorKTP' => '3208573452890031',
                'usia' => '27',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '22',
                'nama' => 'Lina',
                'nomorKTP' => '3208573452890031',
                'usia' => '27',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '23',
                'nama' => 'Irina',
                'nomorKTP' => '3208573452890031',
                'usia' => '27',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '24',
                'nama' => 'Arni',
                'nomorKTP' => '3208573452890031',
                'usia' => '27',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '25',
                'nama' => 'Eva',
                'nomorKTP' => '3208573452890031',
                'usia' => '27',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '26',
                'nama' => 'Salsa',
                'nomorKTP' => '3208573452890031',
                'usia' => '27',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '27',
                'nama' => 'Ayu',
                'nomorKTP' => '3208573452890031',
                'usia' => '27',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '28',
                'nama' => 'Lastri',
                'nomorKTP' => '3208573452890031',
                'usia' => '27',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '29',
                'nama' => 'Ningsih',
                'nomorKTP' => '3208573452890031',
                'usia' => '27',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'id_pekerja' => '30',
                'nama' => 'Nami',
                'nomorKTP' => '3208573452890031',
                'usia' => '27',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'banyak',
                'kondisiKhusus' => 'tidak ada',
                'agama' => 'islam',
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
        Schema::dropIfExists('detail_pekerja');
    }
}
