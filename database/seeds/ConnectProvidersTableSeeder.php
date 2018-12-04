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

        Provider::create(['name' => 'twitter']);

        Provider::create(['name' => 'google']);
        Provider::create(['name' => 'github']);
        Provider::create(['name' => 'linkedin']);
        Provider::create(['name' => 'facebook']);
        Provider::create(['name' => 'bitbucket']);
        Provider::create(['name' => 'gitlab', 'enabled' => true, 'options' => ['client_id' => '11111111', 'client_secret' => '22222222', 'redirect' => '33333333']]);
    }
}
