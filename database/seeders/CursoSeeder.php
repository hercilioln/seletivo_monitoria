<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert([
            'nome' => 'Sistemas de Informação',
        ]);

        DB::table('cursos')->insert([
            'nome' => 'Biomedicina',
        ]);

        DB::table('cursos')->insert([
            'nome' => 'Direito',
        ]);
        
        DB::table('cursos')->insert([
            'nome' => 'Engenharia de Software',
        ]);

        DB::table('cursos')->insert([
            'nome' => 'Odontologia',
        ]);

        DB::table('cursos')->insert([
            'nome' => 'Psicologia',
        ]);
    }
}
