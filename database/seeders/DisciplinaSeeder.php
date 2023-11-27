<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisciplinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disciplinas')->insert([
            'nome' => 'Funções Orgânicas',
        ]);
        
        DB::table('disciplinas')->insert([
            'nome' => 'Biologia Molecular',
        ]);
        
        DB::table('disciplinas')->insert([
            'nome' => 'Hematologia',
        ]);
        
        DB::table('disciplinas')->insert([
            'nome' => 'Introdução à Programação',
        ]);
        
        DB::table('disciplinas')->insert([
            'nome' => 'Algoritmos e Programação',
        ]);
        
        DB::table('disciplinas')->insert([
            'nome' => 'Estatísticas e Métodos Quantitativos',
        ]);
        
        DB::table('disciplinas')->insert([
            'nome' => 'Redes de Computadores',
        ]);
        
        DB::table('disciplinas')->insert([
            'nome' => 'Empreendedorismo e Negócios Digitais',
        ]);
        
        DB::table('disciplinas')->insert([
            'nome' => 'Sistemas Lineares',
        ]);
        
        DB::table('disciplinas')->insert([
            'nome' => 'Gerenciamento de Projeto de Software',
        ]);
        
        DB::table('disciplinas')->insert([
            'nome' => 'Introdução ao direito',
        ]);
        
        DB::table('disciplinas')->insert([
            'nome' => 'Direito Civil',
        ]);
        
        DB::table('disciplinas')->insert([
            'nome' => 'Direito do trabalho',
        ]);
        
        DB::table('disciplinas')->insert([
            'nome' => 'Ciência política',
        ]);
        
        DB::table('disciplinas')->insert([
            'nome' => 'Prática jurídica',
        ]);
        
        DB::table('disciplinas')->insert([
            'nome' => 'Anatomia Humana',
        ]);
        
        DB::table('disciplinas')->insert([
            'nome' => 'Anatomia de Cabeça e Pescoço',
        ]);
        
        DB::table('disciplinas')->insert([
            'nome' => 'Histologia Bucal',
        ]);
        
        DB::table('disciplinas')->insert([
            'nome' => 'Patologia Geral',
        ]);
        
        DB::table('disciplinas')->insert([
            'nome' => 'História e Fundamentos da Psicologia',
        ]);
        
        DB::table('disciplinas')->insert([
            'nome' => 'Comunicação e Expressão',
        ]);
        
        DB::table('disciplinas')->insert([
            'nome' => 'Psicopatologia',
        ]);
        
    }
}
