<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::insert("INSERT INTO `comments` (`id`, `comment`, `user_id`, `article_id`, `created_at`, `updated_at`)
VALUES
	(1, 'top link', 3, 5, '2017-01-08 17:28:22', '2017-01-08 17:28:22'),
	(2, 'test', 3, 5, '2017-01-08 17:40:49', '2017-01-08 17:40:49'),
	(3, '3ᵈᵉ test', 3, 5, '2017-01-08 17:53:41', '2017-01-08 17:53:41');
");
    }
}
