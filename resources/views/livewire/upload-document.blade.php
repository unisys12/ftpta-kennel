<div class="mt-4">
    <hr>
    <h2 class="text-4xl mb-4">Documents</h2>
    <form wire:submit.prevent="save">
        <div class="form-control">
            <label class="label">Attach a document to this profile</label>
            <input type="file" name="document_upload" wire:model="document">
            @error("document")
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-control">
            <label class="label">Document Name</label>
            <input type="text" placeholder="Give a name for this file" wire:model="name" />
            @error("name")
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-control">
            <select wire:model='type' class="mt-4">
                <option value="0"></option>
                @foreach ($document_types as $type)
                    <option value="{{ $type->id }}"">{{ $type->name }}</option>
                @endforeach
            </select>
            @error("type")
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-control">
            <button type="submit" class="btn btn-primary mt-4" wire:loading.class='loading'>Upload Documents</button>
        </div>
    </form>
    <span class="text-sm">Document form is a seperate form from the profile form above</span>

    {{-- <div x-show="isUploading">
        <progress max="100" x-bind:value="progress"></progress>
    </div> --}}
</div>
