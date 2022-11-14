<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KelasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('kelas')->delete();

        \DB::table('kelas')->insert(array (
            0 =>
            array (
                'id' => 1,
                'nama_kelas' => '12 RPL 1',
                'created_at' => '2022-11-12 09:23:29',
                'updated_at' => '2022-11-12 09:23:29',
            ),
        ));


    }
}
