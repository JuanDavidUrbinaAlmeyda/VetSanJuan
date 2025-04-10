<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentoSeeder extends Seeder
{
    public function run()
    {
        $departamentos = ['Lima', 'Arequipa', 'Cusco', 'Piura', 'Junín'];

        foreach ($departamentos as $departamento) {
            Departamento::create([
                'nombre_departamento' => $departamento,
            ]);
        }
    }
}
