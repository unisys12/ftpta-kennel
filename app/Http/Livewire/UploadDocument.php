<?php

namespace App\Http\Livewire;

use App\Models\Canine;
use Livewire\Component;
use App\Models\Document;
use Illuminate\Support\Str;
use App\Models\DocumentType;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class UploadDocument extends Component
{
    use WithFileUploads;

    public $document;
    public $document_types;
    public $name;
    public $type;
    public $canine;

    protected $rules = [
        'document' => 'required|mimes:doc,docx,xls,xlsx,odt,pdf,wpd,txt',
        'name' => 'required|string',
        'type' => 'required|integer'
    ];

    public function mount()
    {
        $this->document_types = DocumentType::all();
    }

    public function save()
    {
        $this->validate();

        $dir = DocumentType::find($this->type);

        $path = $this->document->store('documents/' . Str::slug($dir->name));

        Document::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'path' => $path,
            'document_type_id' => $this->type,
            'canine_id' => $this->canine->id,
            'user_id' => $this->canine->user->id
        ]);

        return redirect()->route('canines.show', $this->canine->id);
    }

    public function render()
    {
        return view('livewire.upload-document');
    }
}
