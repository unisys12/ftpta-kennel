<div class="mt-4">
    <div class="tabs">
        @foreach ($document_types as $type)
            {{-- There has to an easier way to do this! --}}
            <a
            id="tab-{{ $type->id }}"
            {{-- wire:click="select_tab({{$type->id}})" --}}
            wire:click="select_tab({{ $type->id }})"
            @if ($selected_tab == $type->id)
                class="tab tab-lifted tab-active transition"
            @else
                class="tab tab-lifted transition"
            @endif
            >
                {{ $type->name }}
            </a>
        @endforeach
    </div>
    @if (count($documents) > 0)
    {{-- Would like to change this to dynamic component for reuse on Client Profile --}}
    @livewire('display-documents-component', ['index' => $selected_tab])
    @endif
</div>
