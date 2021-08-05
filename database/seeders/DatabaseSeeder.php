<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //$this->call('transmission_TableSeeder');
        \DB::table('transmission')->delete();
        $data = [
            ['transmission' => 'automatic'],
            ['transmission' => 'manual'],
            //...
        ];
        \DB::table('transmission')->insert($data); // Query Builder approach
        $this->command->info('Transmission table seeded!');

        //$this->call('makeTableSeeder');
        \DB::table('make')->delete();
        $data = [
            ['make' => 'Acura CL'],
            ['make' => 'Acura RL'],
            //...
        ];
        \DB::table('make')->insert($data); // Query Builder approach
        $this->command->info('make table seeded!');

        //$this->call('LocationTableSeeder');
        \DB::table('location')->delete();
        $data = [
            ['location' => 'Nakuru'],
            ['location' => 'Nairobi'],
            ['location' => 'Kisii'],
            ['location' => 'Kajiado'],
            //...
        ];
        \DB::table('location')->insert($data); // Query Builder approach
        $this->command->info('Location table seeded!');

        //$this->call('InteriorTableSeeder');
        \DB::table('interior')->delete();
        $data = [
            ['interior' => 'Cloth'],
            ['interior' => 'Leather'],
            ['interior' => 'other'],
            //...
        ];
        \DB::table('interior')->insert($data); // Query Builder approach
        $this->command->info('Interior table seeded!');

        //$this->call('DutyTableSeeder');
        \DB::table('duty')->delete();
        $data = [
            ['duty' => 'Paid'],
            ['duty' => 'Not Paid'],
            ['duty' => 'exempted'],
            //...
        ];
        \DB::table('duty')->insert($data); // Query Builder approach
        $this->command->info('Duty table seeded!');

        //$this->call('FuelTableSeeder');
        \DB::table('fuel')->delete();
        $data = [
            ['fuel' => 'Electricity'],
            ['fuel' => 'Petrol'],
            ['fuel' => 'Diesel'],
            //...
        ];
        \DB::table('fuel')->insert($data); // Query Builder approach
        $this->command->info('Fuel table seeded!');

        //$this->call('ContitionTableSeeder');
        \DB::table('contition')->delete();
        $data = [
            ['contition' => 'New'],
            ['contition' => 'Locally Used'],
            ['contition' => 'Foreign Used'],
            //...
        ];
        \DB::table('contition')->insert($data); // Query Builder approach
        $this->command->info('Condition table seeded!');

        //$this->call('BodyTableSeeder');
        \DB::table('body')->delete();
        $data = [
            ['body' => 'Pickup'],
            ['body' => 'Trucks'],
            ['body' => 'Convertibles'],
            //...
        ];
        \DB::table('body')->insert($data); // Query Builder approach

        $this->command->info('Body table seeded!');

        //$this->call('ColorTableSeeder');
        \DB::table('color')->delete();
        $data = [
            ['color' => 'Red'],
            ['color' => 'Blue'],
            ['color' => 'Green'],
            //...
        ];
        \DB::table('color')->insert($data); // Query Builder approach

        $this->command->info('Color table seeded!');

        //$this->call('AllvehfeaturesTableSeeder');
        \DB::table('allvehfeatures')->delete();
        $data = [
            ['feature' => 'Bullet Proof'],
            ['feature' => 'CD Player'],
            //...
        ];
        \DB::table('allvehfeatures')->insert($data); // Query Builder approach
        $this->command->info('Vehicle Features table seeded!');

    }
}

class transmission_TableSeeder extends Seeder
{
    public function run()
    {
        DB::table('transmission')->delete();
        $data = [
            ['transmission' => 'automatic'],
            ['transmission' => 'manual'],
            //...
        ];
        DB::table('transmission')->insert($data); // Query Builder approach
    }
}
class makeTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('make')->delete();
        $data = [
            ['make' => 'Acura CL'],
            ['make' => 'Acura RL'],
            //...
        ];
        DB::table('make')->insert($data); // Query Builder approach

    }

}
class LocationTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('location')->delete();
        $data = [
            ['location' => 'Nakuru'],
            ['location' => 'Nairobi'],
            ['location' => 'Kisii'],
            ['location' => 'Kajiado'],
            //...
        ];
        DB::table('location')->insert($data); // Query Builder approach

    }

}
class InteriorTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('interior')->delete();
        $data = [
            ['interior' => 'Cloth'],
            ['interior' => 'Leather'],
            ['interior' => 'other'],
            //...
        ];
        DB::table('interior')->insert($data); // Query Builder approach

    }

}

class DutyTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('duty')->delete();
        $data = [
            ['duty' => 'Paid'],
            ['duty' => 'Not Paid'],
            ['duty' => 'exempted'],
            //...
        ];
        DB::table('duty')->insert($data); // Query Builder approach

    }

}
class FuelTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('fuel')->delete();
        $data = [
            ['fuel' => 'Electricity'],
            ['fuel' => 'Petrol'],
            ['fuel' => 'Diesel'],
            //...
        ];
        DB::table('fuel')->insert($data); // Query Builder approach

    }

}

class ContitionTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('contition')->delete();
        $data = [
            ['contition' => 'New'],
            ['contition' => 'Locally Used'],
            ['contition' => 'Foreign Used'],
            //...
        ];
        DB::table('contition')->insert($data); // Query Builder approach

    }

}

class BodyTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('body')->delete();
        $data = [
            ['body' => 'Pickup'],
            ['body' => 'Trucks'],
            ['body' => 'Convertibles'],
            //...
        ];
        DB::table('body')->insert($data); // Query Builder approach

    }

}
class ColorTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('color')->delete();
        $data = [
            ['color' => 'Red'],
            ['color' => 'Blue'],
            ['color' => 'Green'],
            //...
        ];
        DB::table('color')->insert($data); // Query Builder approach

    }

}

class AllvehfeaturesTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('allvehfeatures')->delete();
        $data = [
            ['allvehfeatures' => 'Bullet Proof'],
            ['allvehfeatures' => 'CD Player'],
            //...
        ];
        DB::table('allvehfeatures')->insert($data); // Query Builder approach

    }

}