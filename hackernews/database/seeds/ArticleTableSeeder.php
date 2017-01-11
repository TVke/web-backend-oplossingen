<?php

use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	    DB::insert("INSERT INTO `articles` (`id`, `title`, `url`, `user_id`, `created_at`, `updated_at`)
VALUES
	(1, 'eerste nieuwe artikel', 'http://google.be', 1, '2017-01-08 17:18:48', '2017-01-08 17:18:48'),
	(2, 'Repelsteeltje', 'https://repelsteeltje.org', 1, '2017-01-08 17:19:26', '2017-01-08 17:19:26'),
	(3, 'GitHub ', 'https://github.com', 2, '2017-01-08 17:21:16', '2017-01-08 17:21:16'),
	(4, 'originele periode opdracht', 'http://pascalculator.be/hackernews/public/', 2, '2017-01-08 17:22:25', '2017-01-08 17:22:25'),
	(5, 'blackboard', 'https://bb.kdg.be', 3, '2017-01-08 17:25:54', '2017-01-08 17:25:54');
");
    }
}
