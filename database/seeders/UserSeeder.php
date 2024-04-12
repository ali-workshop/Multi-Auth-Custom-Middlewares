<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users=[

        ['name'=>"User",
          'email'=>'User@gmail.com' ,
          'password'=>bcrypt(1234),
          'role'=>0 

        ],
        ['name'=>"Admin",
          'email'=>'Admin@gmail.com' ,
          'password'=>bcrypt(1234),
          'role'=>1 
                 
        ],
        
        ['name'=>"Manager",
          'email'=>'Manager@gmail.com' ,
          'password'=>bcrypt(1234),
          'role'=>2
 
        ],

        ];


foreach( $users as $user){
User::create($user);

}
}
}
