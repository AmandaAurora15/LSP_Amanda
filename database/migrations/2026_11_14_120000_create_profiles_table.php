<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('hero_description');
            $table->string('history_title');
            $table->text('history_paragraph_one');
            $table->text('history_paragraph_two');
            $table->string('client_count', 30);
            $table->string('uptime', 30);
            $table->text('principle');
            $table->text('vision');
            $table->text('mission_one');
            $table->text('mission_two');
            $table->text('mission_three');
            $table->timestamps();
        });

        DB::table('profiles')->insert([
            'hero_description' => 'Mengenal lebih dekat PT Solusi Net Nusantara sebagai penyedia layanan internet dan infrastruktur jaringan handal di Indonesia.',
            'history_title' => 'Menghubungkan Berbagai Kebutuhan Lewat Jaringan yang Stabil',
            'history_paragraph_one' => 'PT Solusi Net Nusantara hadir untuk menjawab kebutuhan konektivitas internet yang semakin tinggi di era digital saat ini. Kami fokus memberikan layanan internet broadband serta solusi penataan jaringan terbaik untuk perkantoran, instansi, sekolah, maupun pelaku usaha.',
            'history_paragraph_two' => 'Didukung oleh tim teknisi yang berpengalaman dan perangkat jaringan modern, kami berkomitmen untuk memastikan setiap pelanggan mendapatkan performa koneksi yang lancar tanpa gangguan berarti.',
            'client_count' => '500+',
            'uptime' => '99.9%',
            'principle' => 'Memberikan layanan cepat tanggap dan solusi jaringan yang bisa diandalkan setiap hari.',
            'vision' => 'Menjadi perusahaan penyedia layanan internet dan infrastruktur jaringan yang terkemuka, terpercaya, dan diandalkan dalam mendukung kemajuan teknologi di Indonesia.',
            'mission_one' => 'Menyediakan akses internet broadband berkecepatan tinggi yang stabil dan konsisten.',
            'mission_two' => 'Membangun dan merawat infrastruktur jaringan yang aman serta tahan banting.',
            'mission_three' => 'Memberikan dukungan layanan teknis yang cepat tanggap dan solutif bagi pelanggan.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
