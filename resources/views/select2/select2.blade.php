<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <h1>Select2 Example</h1>
    <strong>Select2 Dropdown: {{ $selCity }}</strong>
    <div wire:ignore>
        <select class="form-control" id="select2" wire:model="s2">
            <option value="">-- Select City --</option>
            @foreach($cities as $city)
                <option value="{{ $city }}">{{ $city }}</option>
            @endforeach
        </select>
    </div>
    <div class="mt-2" wire:ignore>
    </div>
    <div>
        <x-adminlte-button wire:click.prevent="test()" class="btn-flat" type="submit" label="Submit" theme="success"/>
    </div>
</div>


@push('js')
    <script>

        $(document).ready(function() {
            $('#select2').select2();
            $('#select2').on('change', function (e) {
                var data = $('#select2').select2('val');
            @this.set('s2', data);
            });
        })

    </script>
@endpush


