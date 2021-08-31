<?php

namespace App\Http\Livewire;

use App\Models\Document;
use Livewire\Component;

class DisplayDocumentsComponent extends Component
{
    public $index;

    protected $listeners = ['tab_seleted' => 'getDocuments'];

    public function mount()
    {
        //
    }

    public function getDocuments()
    {
        return Document::where('document_type_id', $this->index)->get();
    }

    public function render()
    {
        return view(
            'livewire.display-documents-component',
            ['documents' => $this->getDocuments()]
        );
    }
}
