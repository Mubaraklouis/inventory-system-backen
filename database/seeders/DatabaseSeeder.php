<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use Illuminate\Database\Seeder;
use   \App\Models\User;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    /**
     * truncateTable() : truncates the database before seeding
     * disableForiegnKey() : disables foriengn key constains before seeding
     * enableForiegnKey() : enables foriengn key constains after seeding
     */



    //  use traits\ForiegnKeyCheck;

    public function enableForeignKey(){
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    public function disableForeignKey(){
          DB::statement('SET FOREIGN_KEY_CHECKS=0');
    }

    public function truncateTable($table)
    {
        DB::table($table)->truncate();

    }

    public function run(): void
    {

        //truncate the table bafore seeding

        $this->disableForeignKey();
        $this->truncateTable('users');
        User::factory(10)->create();
        User::factory()->create([
            'name' => 'mkay_dev',
            'email' => 'mubaraklouis@admin.com',
            'is_admin'=>1,
            'password' => bcrypt('dev12')
        ]);


        //call all the seeder classes here
        $this->call(
            [
                ProductSeeder::class,
                OutproductSeeder::class,
                CategorySeeder::class
            ]
            );

        $this->enableForeignKey();
    }
}
