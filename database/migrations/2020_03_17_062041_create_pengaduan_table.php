<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengaduanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pengaduan', function (Blueprint $table) {
            $table->string('kode_pengaduan')->primary();
            $table->date('tgl_pengaduan');
            $table->date('tgl_tanggapan');
            $table->integer('user_id');
            $table->string('isi_laporan');
            $table->string('alamat');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('tanggapan')->default('0');
            $table->string('foto_pengaduan');
            $table->enum('kategori',['pengajuan','aspirasi']);
            $table->enum('status',['0','proses','diterima','ditolak']);
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
        Schema::dropIfExists('tb_pengaduan');
    }
}
