<?php

namespace App\Http\Controllers;

use App\Models\Document;

class DocumentController extends Controller
{
    public function destroy(Document $document)
    {
        $document->delete();
        return redirect()
            ->route('cars.index')
            ->with('aviso', 'Arquivo removido com sucesso!');
    }
}
