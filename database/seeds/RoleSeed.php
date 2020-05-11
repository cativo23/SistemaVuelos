<?php

use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Bouncer::role()->firstOrCreate([
            'name' => 'super',
            'title' => 'Super Administrator',
        ]);

        $dest_admin = Bouncer::role()->firstOrCreate([
            'name' => 'admin-destinations',
            'title' => 'Administrador de Destinos',
        ]);

        $airline_admin = Bouncer::role()->firstOrCreate([
            'name' => 'admin-airline',
            'title' => 'Administrador de Airline',
        ]);

        $airport_admin = Bouncer::role()->firstOrCreate([
            'name' => 'admin-airport',
            'title' => 'Administrador de Airport',
        ]);

        $manage_destinations = Bouncer::ability()->firstOrCreate([
            'name' => 'manage-destinations',
            'title' => 'Manage Destinations',
        ]);

        $manage_itineraries = Bouncer::ability()->firstOrCreate([
            'name' => 'manage-itineraries',
            'title' => 'Manage Itineraries',
        ]);

        $manage_airports = Bouncer::ability()->firstOrCreate([
            'name' => 'manage-airports',
            'title' => 'Manage Airports',
        ]);

        $manage_clients = Bouncer::ability()->firstOrCreate([
            'name' => 'manage-clients',
            'title' => 'Manage Clients',
        ]);

        $manage_airplanes = Bouncer::ability()->firstOrCreate([
            'name' => 'manage-airplanes',
            'title' => 'Manage Airplanes',
        ]);

        $manage_airlines = Bouncer::ability()->firstOrCreate([
            'name' => 'manage-airlines',
            'title' => 'Manage Airlines',
        ]);

        $ban_users = Bouncer::ability()->firstOrCreate([
            'name' => 'ban-users',
            'title' => 'Ban Users',
        ]);

        $super_dash = Bouncer::ability()->firstOrCreate([
            'name' => 'super-admin-dash',
            'title' => 'Ability To See Super Dash',
        ]);

        $super_dash = Bouncer::ability()->firstOrCreate([
            'name' => 'super-admin-dash',
            'title' => 'Ability To See Super Dash',
        ]);

        $manage_users = Bouncer::ability()->firstOrCreate([
            'name' => 'manage-users',
            'title' => 'Manage Users',
        ]);

        Bouncer::allow($super_admin)->to($manage_users);

        Bouncer::allow($airline_admin)->to($manage_airlines);
        Bouncer::allow($dest_admin)->to($manage_destinations);
        Bouncer::allow($airport_admin)->to($manage_airports);
    }
}
