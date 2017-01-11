<?php

use Illuminate\Database\Seeder;

class VoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::insert("INSERT INTO `votes` (`id`, `up`, `user_id`, `article_id`, `created_at`, `updated_at`)
VALUES
	(1, 1, 2, 2, '2017-01-08 17:21:36', '2017-01-08 17:21:36'),
	(2, 0, 2, 1, '2017-01-08 17:21:39', '2017-01-08 17:21:41'),
	(3, 1, 3, 1, '2017-01-08 17:23:24', '2017-01-11 11:48:09'),
	(4, 1, 3, 4, '2017-01-08 17:23:27', '2017-01-08 17:23:27'),
	(5, 1, 3, 2, '2017-01-08 17:23:29', '2017-01-08 17:24:14'),
	(6, 1, 3, 3, '2017-01-08 17:23:38', '2017-01-08 17:54:40');
");
    }
}
