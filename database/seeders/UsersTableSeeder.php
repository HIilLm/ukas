<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'bendahara',
                'nisn' => '0123134',
                'absen' => 1,
                'kelas_id' => 1,
                'role_id' => 2,
                'email' => 'bendahara@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$MvY2u94xHnp74dTRJ73fmOrl3gV6JAmomu4le/QAOpqNdpD6N3Yla',
                'remember_token' => NULL,
                'created_at' => '2022-11-13 06:21:35',
                'updated_at' => '2022-12-05 06:24:38',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'siswa',
                'nisn' => '0241231',
                'absen' => 2,
                'kelas_id' => 1,
                'role_id' => 3,
                'email' => 'siswa@siswa.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$4fuWktDCjF56aP5D69FIH.8z2YliVU4uky7dLGyzHEIbf6CvokOOu',
                'remember_token' => NULL,
                'created_at' => '2022-11-13 06:22:36',
                'updated_at' => '2022-12-05 06:24:34',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'siswa2',
                'nisn' => '2481034',
                'absen' => 3,
                'kelas_id' => 1,
                'role_id' => 2,
                'email' => 'siswa@siswa2.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$BdsNm8B12ZQUMG2G8L2feeklaIqvUdmRJem9CioXniEZpkA.eI7X.',
                'remember_token' => NULL,
                'created_at' => '2022-11-13 06:23:57',
                'updated_at' => '2022-12-05 06:23:02',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'ADMIN',
                'nisn' => '2312321',
                'absen' => NULL,
                'kelas_id' => NULL,
                'role_id' => 1,
                'email' => 'ADMIN1@admin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$nL9XQJW8cuRg0BppQQ/gxu4piGLxiaTTl7z1.QEyP6kRAoJEKTuB2',
                'remember_token' => NULL,
                'created_at' => '2022-11-13 06:25:58',
                'updated_at' => '2022-11-13 06:25:58',
            ),
        ));
        
        
    }
}