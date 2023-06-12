<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Content::create([
            "title" => "Moshina haydovchisi",
            "img" => "https://storage.kun.uz/source/8/rixQAw8drFcDTM7aWqHNpzKyRyq2g7sf.jpg",
            "desc" => "Andijonda ushbu halokat sodir boldi"
        ]);

        Content::create([
            "title" => "Toshkentdagi holat",
            "img" => "https://storage.kun.uz/source/7/-T9xv7Hayd00wmEBClxcYFtTROGq5VM_.jpg",
            "desc" => "Hamma yoq chang bosdi"
        ]);
    }
}
