<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use App\Models\User;
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
//         \App\Models\User::factory(5)->create();
        $user = User::factory()->create([
            'name' => 'john Doe',
            'email' => 'john@gmail.com'
        ]);
        Listing::factory(6)->create([
            'user_id'=>$user->id
        ]);
//
//Listing::create([
//    'title'=>'Laravel Senior Developer',
//    'tags'=>'larvel, javascript',
//    'company'=>'Acm Corp',
//    'website'=>'https://www.acme.com',
//    'location'=>'Boston ,Ma',
//    'email'=>'ola.dandashli5@gmail.com',
//    'description'=>'lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attribute']);
//
//        Listing::create([
//            'title'=>'Laravel Junior Developer',
//            'tags'=>'larvel, javascript',
//            'company'=>'Acme Corp',
//            'website'=>'https://www.acme.com',
//            'location'=>'Boston ,Ma',
//            'email'=>'ola.dandashli544gmail.com',
//            'description'=>'lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attribute']);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
