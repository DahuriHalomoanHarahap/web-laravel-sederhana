<?php

use App\Models\setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('label');
            $table->string('value')->nullable();
            $table->string('type');
            $table->timestamps();
        });

        setting::create([
            'key' => '_site_name',
            'label' => 'Judul Situas',
            'value' => 'Website Sederhana',
            'type' => 'text',
        ]);

        setting::create([
            'key' => '_location',
            'label' => 'Alamat',
            'value' => 'Bengkulu, Indonesia',
            'type' => 'text',
        ]);

        setting::create([
            'key' => '_youtube',
            'label' => 'Youtube',
            'value' => 'https://www.youtube.com/@DahuriID',
            'type' => 'text',
        ]);

        setting::create([
            'key' => '_instagram',
            'label' => 'Instagram',
            'value' => 'https://www.instagram.com/meow_peduli/',
            'type' => 'text',
        ]);

        setting::create([
            'key' => '_tiktok',
            'label' => 'Tiktok',
            'value' => 'https://www.tiktok.com/@meow_peduli19',
            'type' => 'text',
        ]);

        setting::create([
            'key' => '_site_description',
            'label' => 'Site Description',
            'value' => 'Website Sederhana dengan Filament',
            'type' => 'text',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
