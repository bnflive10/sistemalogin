<?php

namespace Database\Seeders;

use App\Models\Usuario as ModelsUsuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class usuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new ModelsUsuario();
        $usuario->usuario = 'bnflive10@gmail.com';
        $usuario->senha = Hash::make('bnf123');
        $usuario->save();
    }
}
