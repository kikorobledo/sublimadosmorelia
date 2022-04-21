<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::create([
            'name' => 'Bautizo',
            'url' => 'https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FSublimadosmorelia%2Fvideos%2F521609105622737%2F&show_text=false&width=560&t=0',
        ]);

        Video::create([
            'name' => 'Primera comunion',
            'url' => 'https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FSublimadosmorelia%2Fvideos%2F169869817978594%2F&show_text=false&width=560&t=0',
        ]);

        Video::create([
            'name' => 'Cumpleaños',
            'url' => 'https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FSublimadosmorelia%2Fvideos%2F650586145670366%2F&show_text=false&width=560&t=0',
        ]);

        Video::create([
            'name' => 'Funebres',
            'url' => 'https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FSublimadosmorelia%2Fvideos%2F180471400564132%2F&show_text=false&width=560&t=0',
        ]);
    }
}
