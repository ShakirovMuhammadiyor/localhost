<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            "title" => "Quick guide on business with friends.",
            "body" => "There is now an abundance of readable dummy texts. These are usually used when a text is required purely to fill a space.",
            "subject" => "Marketing",
            "image" => "https://www.europeanfinancialreview.com/wp-content/uploads/2014/06/family-tree-business1.png",
            "lang" => "en"
        ]);

        Post::create([
            "title" => "Do'stlar bilan biznes bo'yicha tezkor qo'llanma.",
            "body" => "Endi o'qilishi mumkin bo'lgan qo'g'irchoq matnlar ko'p. Ular odatda matn faqat bo'sh joyni to'ldirish uchun kerak bo'lganda ishlatiladi.",
            "subject" => "Marketing",
            "image" => "https://www.europeanfinancialreview.com/wp-content/uploads/2014/06/family-tree-business1.png",
            "lang" => "uz"
        ]);
    }
}
