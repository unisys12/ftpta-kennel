<div class="grid grid-cols-3 gap-4">
    @foreach ($documents as $document)
            <div class="card text-center shadow-2xl">
                <div class="card-body">
                    <h2 class="card-title">{{ $document->name }}</h2>
                    {{-- <p>Replace with sample content from file</p> --}}
                </div>
                <div class="justify-center card-actions">
                    <button class="btn btn-outline btn-accent">View</button>
                </div>
            </div>
        @endforeach
</div>
