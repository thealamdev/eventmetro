<?php

namespace Database\Seeders;

use App\Enums\Roles;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name'              => 'Super Admin',
            'email'             => "superadmin@gmail.com",
            'email_verified_at' => now(),
            'password'          => Hash::make('password@987'),
            'remember_token'    => Str::random(10),
        ]);

        $attendee = User::factory()->create([
            'name'              => 'Attendee',
            'email'             => "attendee@gmail.com",
            'email_verified_at' => now(),
            'password'          => Hash::make('password@987'),
            'remember_token'    => Str::random(10),
        ]);

        $organizer = User::factory()->create([
            'name'              => 'Organizer',
            'email'             => "organizer@gmail.com",
            'email_verified_at' => now(),
            'password'          => Hash::make('password@987'),
            'remember_token'    => Str::random(10),
        ]);

        $organizerAttendeeUser = User::factory()->create([
            'name'              => 'organizer Attendee',
            'email'             => "organizerattendee@gmail.com",
            'email_verified_at' => now(),
            'password'          => Hash::make('password@987'),
            'remember_token'    => Str::random(10),
        ]);

        $role           = Role::create(['name' => Roles::SUPERADMIN->value]);
        $attendeeRole   = Role::create(['name' => Roles::ATTENDEE->value]);
        $organizerRole  = Role::create(['name' => Roles::ORGANIZER->value]);

        $user->assignRole($role);
        $attendee->assignRole($attendeeRole);
        $organizer->assignRole($organizerRole);
        $organizerAttendeeUser->assignRole([Roles::ORGANIZER->value, Roles::ATTENDEE->value]);
    }
}
