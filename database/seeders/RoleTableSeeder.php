<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role')->delete();
        
        \DB::table('role')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role' => 'ADMIN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'role' => 'BENDAHARA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'role' => 'SISWA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}