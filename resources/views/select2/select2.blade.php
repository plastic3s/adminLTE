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
        <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save"/>
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

{{-- Setup the height and font size of the plugin when using sm/lg sizes --}}
{{-- NOTE: this may change with newer plugin versions --}}

@once
    @push('css')
        <style type="text/css">

            {{-- SM size setup --}}
    .input-group-sm .select2-selection--single {
                height: calc(1.8125rem + 2px) !important
            }
            .input-group-sm .select2-selection--single .select2-selection__rendered,
            .input-group-sm .select2-selection--single .select2-selection__placeholder {
                font-size: .875rem !important;
                line-height: 2.125;
            }
            .input-group-sm .select2-selection--multiple {
                min-height: calc(1.8125rem + 2px) !important
            }
            .input-group-sm .select2-selection--multiple .select2-selection__rendered {
                font-size: .875rem !important;
                line-height: normal;
            }

            {{-- LG size setup --}}
    .input-group-lg .select2-selection--single {
                height: calc(2.875rem + 2px) !important;
            }
            .input-group-lg .select2-selection--single .select2-selection__rendered,
            .input-group-lg .select2-selection--single .select2-selection__placeholder {
                font-size: 1.25rem !important;
                line-height: 2.25;
            }
            .input-group-lg .select2-selection--multiple {
                min-height: calc(2.875rem + 2px) !important
            }
            .input-group-lg .select2-selection--multiple .select2-selection__rendered {
                font-size: 1.25rem !important;
                line-height: 1.7;
            }

        </style>
    @endpush
@endonce
