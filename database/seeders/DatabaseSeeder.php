<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

	    DB::table('users')->insert([
		    'name' => 'Admin',
		    'email' => 'admin@gmail.com',
		    'role' => 'admin',
		    'password' => Hash::make('password')
	    ]);

	    DB::table('temas')->insert([
		    'title' => 'Dummy Tema'
	    ]);

	    DB::table('temas')->insert([
		    'title' => 'Dummy Tema 2'
	    ]);

	    DB::table('temas')->insert([
		    'title' => 'Dummy Tema 3'
	    ]);

	    DB::table('tema_seccion')->insert([
		    'title' => 'Testing Sub tema',
		    'status' => 'active',
		    'tema_id' => 1,
		    'type' => 'true_or_false',
		    'difficulty' => 'easy',
		    'description' => 'Sit obcaecati aut quam tempore voluptates? Maiores nisi recusandae necessitatibus error nobis Obcaecati pariatur adipisci rerum ab voluptatibus possimus Quisquam doloremque distinctio similique nesciunt sint laborum. Dolorum provident ipsa placeat'
		    
	    ]);


	    DB::table('tema_seccion')->insert([
		    'title' => 'Testing Sub tema',
		    'status' => 'inactive',
		    'tema_id' => 1,
		    'type' => 'multiple_choice',
		    'difficulty' => 'medium',
		    'description' => 'Sit obcaecati aut quam tempore voluptates? Maiores nisi recusandae necessitatibus error nobis Obcaecati pariatur adipisci rerum ab voluptatibus possimus Quisquam doloremque distinctio similique nesciunt sint laborum. Dolorum provident ipsa placeat'
		    
	    ]);

	    DB::table('tema_seccion')->insert([
		    'title' => 'Testing Sub tema 3',
		    'status' => 'active',
		    'tema_id' => 1,
		    'type' => 'flashcards',
		    'difficulty' => 'hard',
		    'description' => 'Sit obcaecati aut quam tempore voluptates? Maiores nisi recusandae necessitatibus error nobis Obcaecati pariatur adipisci rerum ab voluptatibus possimus Quisquam doloremque distinctio similique nesciunt sint laborum. Dolorum provident ipsa placeat'
		    
	    ]);
    }
}
