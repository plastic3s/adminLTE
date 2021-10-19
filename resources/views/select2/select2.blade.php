<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <h1>Select2 Example</h1>
    <strong>Select2 Dropdown: {{ $selCity }}</strong>
    <div wire:ignore>
        <select class="form-control select2-purple " id="select2" wire:model="s2">
            <option class="select2-purple" value="">-- Select City --</option>
            @foreach($cities as $city)
                <option class="select2-purple" value="{{ $city }}">{{ $city }}</option>
            @endforeach
        </select>
    </div>
    <div class="mt-2" wire:ignore>
        <div class="select2-pink">
            <x-adminlte-select2 name="sel2Basic" class="select2-pink" dataDropdownCssClass="select2-pink">
                <option>Option 1</option>
                <option>Option 2</option>
                <option selected>Option 3</option>
            </x-adminlte-select2>
        </div>
    </div>
    <div>
        <x-adminlte-button wire:click.prevent="test()" class="btn bg-gradient-primary" theme="primary" type="submit" label="Submit"/>
    </div>
</div>


@push('js')
    <script>

        $(document).ready(function() {
            $('#select2').select2();
            $('#sel2Basic').select2();

            $('#select2').on('change', function (e) {
                var data = $('#select2').select2('val');
            @this.set('s2', data);
            });
        })

    </script>
@endpush


