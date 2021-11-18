<?php

use App\Models\DocumentType;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DocumentType::updateOrCreate([
            'id' => 1,
        ],[
            'name' => 'Documento Do Carro',
        ]);
        
        DocumentType::updateOrCreate([
            'id' => 2,
        ],[
            'name' => 'Fotos Em Geral',
        ]);
    }
}
