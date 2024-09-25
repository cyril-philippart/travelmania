<?php

namespace Database\Seeders;

use App\Models\Trips;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        $admin = User::factory()->create([
            'email' => 'admin@gmail.com',
            'name' => 'admin',
            'password' => Hash::make('root'),
        ]);
        $admin->assignRole($adminRole);
        

        $user = User::factory()->create([
            'email' => 'user@gmail.com',
            'name' => 'user',
            'password' => Hash::make('root'),
        ]);
        $user->assignRole($userRole);

        $user = User::factory()->create([
            'email' => 'user2@gmail.com',
            'name' => 'user2',
            'password' => Hash::make('root'),
        ]);
        $user->assignRole($userRole);

        Trips::factory()->create([
            'title' => 'Premier voyage',
            'slug' => 'premier-voyage',
            'user_id' => 1
        ]);

        Trips::factory()->create([
            'title' => 'Deuxième voyage',
            'slug' => 'deuxieme-voyage',
            'user_id' => 1
        ]);

        $trip_1 = Trips::where(['title' => 'Premier voyage'])->first();
        $trip_2 = Trips::where(['title' => 'Deuxième voyage'])->first();

        $trip_1->steps()->create([
            'type' => 'plane',
            'number' => 'SK22',
            'departure' => 'Stockholm',
            'arrival'=> 'New York JFK',
            'seat'=> '7B',
            'gate'=> '22',
            'baggage_drop'=> '',
        ]);

        $trip_1->steps()->create([
            'type' => 'plane',
            'number' => 'SK455',
            'departure' => 'New York JFK',
            'arrival'=> 'Gerona Airport',
            'seat'=> '3A',
            'gate'=> '45B',
            'baggage_drop'=> '344',
        ]);

        $trip_1->steps()->create([
            'type' => 'train',
            'number' => '78A',
            'departure' => 'Gerona Airport',
            'arrival'=> 'Barcelona',
            'seat'=> '45B',
            'gate'=> '',
            'baggage_drop'=> '',
        ]);

        $trip_2->steps()->create([
            'type' => 'bus',
            'number' => 'B1',
            'departure' => 'Grasse',
            'arrival'=> 'Cannes',
            'seat'=> '',
            'gate'=> '',
            'baggage_drop'=> '',
        ]);
        $trip_2->steps()->create([
            'type' => 'train',
            'number' => 'TER-A',
            'departure' => 'Cannes',
            'arrival'=> 'Nice Riquier',
            'seat'=> '',
            'gate'=> '',
            'baggage_drop'=> '',
        ]);
        $trip_2->steps()->create([
            'type' => 'bus',
            'number' => 'B2',
            'departure' => 'Nice Riquier',
            'arrival'=> 'Nice',
            'seat'=> '',
            'gate'=> '',
            'baggage_drop'=> '',
        ]);

        $trip_2->steps()->create([
            'type' => 'plane',
            'number' => 'P455',
            'departure' => 'Nice',
            'arrival'=> 'Paris',
            'seat'=> '3A',
            'gate'=> '45B',
            'baggage_drop'=> '',
        ]);
        $trip_2->steps()->create([
            'type' => 'plane',
            'number' => 'P42',
            'departure' => 'Paris',
            'arrival'=> 'Londres',
            'seat'=> '96B',
            'gate'=> '12',
            'baggage_drop'=> '123',
        ]);
        $trip_2->steps()->create([
            'type' => 'train',
            'number' => 'T9 3/4',
            'departure' => 'Londres',
            'arrival'=> 'Hogwarts Castle',
            'seat'=> '6',
            'gate'=> '',
            'baggage_drop'=> '',
        ]);


    }
}
