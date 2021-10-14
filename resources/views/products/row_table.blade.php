<x-livewire-tables::bs4.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->desc }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $row->id }})" class="btn btn-primary btn-sm">Edit</button>
    <button wire:click="delete({{ $row->id }})" class="btn btn-danger btn-sm">Delete</button>
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>

</x-livewire-tables::bs4.table.cell>
