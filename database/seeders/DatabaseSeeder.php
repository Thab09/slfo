<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Team;
use App\Models\User;
use App\Models\Player;
use App\Models\PlayerAchievement;
use App\Models\TeamAchievement;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Ibraheem bin Ahmed',
            'email' => 'ibraheem.thab@gmail.com',
            'password' => '123'
        ]);

        Team::factory(10)->create();
        Team::factory(5)->create([
            'status' => 'Inactive'
        ]);
        Team::factory(1)->create([
            'name' => 'Former Player'
        ]);
        Team::factory(1)->create([
            'name' => 'Unassigned'
        ]);

        Player::factory(10)->create([
            'team_id' => 1,
            'is_leader' => 0,
        ]);

        Player::factory(1)->create([
            'team_id' => 1,
            'is_leader' => 1,
        ]);
        Player::factory(10)->create([
            'team_id' => 2,
            'is_leader' => 0,
        ]);

        Player::factory(1)->create([
            'team_id' => 2,
            'is_leader' => 1,
        ]);
        Player::factory(10)->create([
            'team_id' => 3,
            'is_leader' => 0,
        ]);

        Player::factory(1)->create([
            'team_id' => 3,
            'is_leader' => 1,
        ]);
        Player::factory(10)->create([
            'team_id' => 4,
            'is_leader' => 0,
        ]);

        Player::factory(1)->create([
            'team_id' => 4,
            'is_leader' => 1,
        ]);

        TeamAchievement::factory(3)->create();
        TeamAchievement::factory(3)->create([
            'team_id' => 2
        ]);
        TeamAchievement::factory(3)->create([
            'team_id' => 3
        ]);
        TeamAchievement::factory(3)->create([
            'team_id' => 4
        ]);
        TeamAchievement::factory(3)->create([
            'team_id' => 5
        ]);

        PlayerAchievement::factory(3)->create();
        PlayerAchievement::factory(3)->create([
            'player_id' => 1
        ]);
        PlayerAchievement::factory(3)->create([
            'player_id' => 2
        ]);
        PlayerAchievement::factory(3)->create([
            'player_id' => 3
        ]);
        PlayerAchievement::factory(3)->create([
            'player_id' => 4
        ]);
        PlayerAchievement::factory(3)->create([
            'player_id' => 5
        ]);



        // Team::create([
        //     'name' => 'Slfo Main',
        //     'description' => 'main team',
        //     'logo' => 'logo/CIJFImE79ZU1sXh7Z5fOlIqegaqnUn2D86R0kzmM.png',
        //     'status' => 'active'
        // ]);
        // Team::create([
        //     'name' => 'Slfo Kanmathi Defence',
        //     'description' => 'kd team',
        //     'logo' => 'logo/CIJFImE79ZU1sXh7Z5fOlIqegaqnUn2D86R0kzmM.png',
        //     'status' => 'active'
        // ]);
        // Team::create([
        //     'name' => 'Slfo Maxis',
        //     'description' => 'maxis team',
        //     'logo' => 'logo/CIJFImE79ZU1sXh7Z5fOlIqegaqnUn2D86R0kzmM.png',
        //     'status' => 'active'
        // ]);
        // Team::create([
        //     'name' => 'Slfo Global',
        //     'description' => 'global team',
        //     'logo' => 'logo/CIJFImE79ZU1sXh7Z5fOlIqegaqnUn2D86R0kzmM.png',
        //     'status' => 'active'
        // ]);
    }
}
