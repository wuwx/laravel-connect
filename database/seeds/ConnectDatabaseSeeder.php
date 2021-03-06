<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ConnectDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(ConnectProvidersTableSeeder::class);
    }
}
