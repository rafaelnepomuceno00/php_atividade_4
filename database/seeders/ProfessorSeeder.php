<?php

namespace Database\Seeders;

use App\Models\Professor;
use Illuminate\Database\Seeder;

class ProfessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Professor::create(['nome' => 'Luciano Soares', 'idade' => 30, 'email' => 'luciano@gmail.com', 'telefone' => 389412412998, 'obs' => 'Efetivo']);
        Professor::create(['nome' => 'Silvio Rodrigo', 'idade' => 29, 'email' => 'silvio@gmail.com', 'telefone' => 38923223998, 'obs' => 'Substituto']);
        Professor::create(['nome' => 'Alessandro Carneiro', 'idade' => 35, 'email' => 'alessanro@gmail.com', 'telefone' => 3893123123, 'obs' => 'Efetivo']);
    }
}
