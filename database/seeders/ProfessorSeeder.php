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
        Professor::create(['nome'=>'Luciano Soares','idade'=> 30,'dfc_vs'=>false,'email' =>'luciano@gmail.com','telefone'=>389412412998]);
        Professor::create(['nome'=>'Silvio Rodrigo','idade'=> 29,'dfc_vs'=>false,'email' =>'silvio@gmail.com','telefone'=>38923223998]);
        Professor::create(['nome'=>'Alessandro Carneiro','idade'=> 35,'dfc_vs'=>false,'email' =>'alessanro@gmail.com','telefone'=>3893123123]);
    }
}
