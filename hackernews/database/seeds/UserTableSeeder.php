<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::insert("INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1, 'Thomas', 'test@test.be', '$2y$10$1eo48RymmORLBSEw.IQBGuK497HaBXKeRsdMQL2Xn1qvDTKXxeZbS', 'J8lY6DYM1HmKVjmZJYBurDhcRbzz4beFjC0tXVsgkYXvcsX5VQJNMYHoahu8', '2017-01-08 17:18:19', '2017-01-08 17:20:07'),
	(2, 'test', 't@t.t', '$2y$10\$TJbFBqLw1PRbBG9IaKhpzenmiM6vjv6JYduBFuyMCCI0px6SyGdKi', 'ms1fZQ23A6kwuWIyMJxkeyJeSlJTCmqrWpKFlXBZ6pc0mM9lt6OdNn6mUhUH', '2017-01-08 17:20:32', '2017-01-08 17:22:49'),
	(3, 'TVke', 'teser@ted.vh', '$2y$10\$cbEC9YapcbeEs8o5CVnttOfgEkoUZ90OxNFp/Qgwvr1gDc84AcWYG', NULL, '2017-01-08 17:23:15', '2017-01-08 17:23:15');
");
    }
}
