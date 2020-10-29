<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'slug' => 'admin-user',
            'password'=> '$2y$10$dJNiQNwSfikHaF23dFBhluXW5Yhb1upIjQyWYqYeVKYHFrxPbKRPO',
            'type' => 'admin'
        ]);

        Admin::create([
            'name' => 'Biplav Raj Raut',
            'email' => 'biplavraut@gmail.com',
            'slug' => 'biplav-raj-raut',
            'password'=> '$2y$10$zBX0ZT602Q9yjvqDAQOaUOuCQMahTgTTTPP41vL9nD2IpmEyYaTj2',
            'type' => 'supdev'
        ]);
    }
}
