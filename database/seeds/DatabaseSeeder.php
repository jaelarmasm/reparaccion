<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Traits\Seedable;

class DatabaseSeeder extends Seeder
{
    use Seedable;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->seed('VoyagerDatabaseSeeder');
    }
}
