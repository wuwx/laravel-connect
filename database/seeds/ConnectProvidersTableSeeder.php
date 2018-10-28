<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Wuwx\LaravelConnect\Provider;

class ConnectProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Provider::create(['name' => 'github']);
        Provider::create(['name' => 'google']);
        Provider::create(['name' => 'weixin']);
        Provider::create(['name' => 'renren']);
    }
}
