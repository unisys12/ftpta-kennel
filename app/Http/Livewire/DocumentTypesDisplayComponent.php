<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Document;
use App\Models\DocumentType;
use Illuminate\Support\Facades\Storage;

class DocumentTypesDisplayComponent extends Component
{
    public $document_types;
    public $selected_tab;

    public function mount()
    {
        $this->document_types = DocumentType::all();
    }

    public function render()
    {
        return view('livewire.document-types-display-component', ['documents' => $this->getDocuments()]);
    }

    public function select_tab($index)
    {
        $this->selected_tab = $index;

        $this->emit('tab_selected', ['index' => $this->selected_tab]);
    }

    public function getDocuments()
    {
        // $documents = Document::where('document_type_id', $this->selected_tab)->get();
        // foreach ($documents as $document) {
        //     Storage::get($document->path);
        // }

        return Document::where('document_type_id', $this->selected_tab)->get();
    }
}
