<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('variable');
            $table->string('value');
        });

        DB::table('settings')->insert([
            [
                'variable' => 'title',
                'value' => 'O-School',
            ],
            [
                'variable' => 'description',
                'value' => 'This is a description',
            ],
            [
                'variable' => 'keyword',
                'value' => 'This is a keyword',
            ],
            [
                'variable' => 'hero_text_header',
                'value' => 'Selamat datang di O-School',
            ],
            [
                'variable' => 'hero_text_description',
                'value' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat possimus aliquam rerum veritatis dolor ad, est sapiente voluptatem eum rem, aut sint repudiandae in. Ducimus nemo dolorem animi perspiciatis libero.',
            ],
            [
                'variable' => 'portfolio_text_description',
                'value' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat possimus aliquam rerum veritatis dolor ad, est sapiente voluptatem eum rem, aut sint repudiandae in. Ducimus nemo dolorem animi perspiciatis libero.',
            ],
            [
                'variable' => 'gallery_text_description',
                'value' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat possimus aliquam rerum veritatis dolor ad, est sapiente voluptatem eum rem, aut sint repudiandae in. Ducimus nemo dolorem animi perspiciatis libero.',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
