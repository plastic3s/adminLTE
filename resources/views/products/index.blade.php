@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Products</h1>
@stop

@section('content_nav_right')
    <x-main-menu></x-main-menu>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
{{--                    <p class="mb-0">Products page!</p>--}}
                    <livewire:products />
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
<script type="text/javascript">
    window.livewire.on('productStore', () => {
        $('#exampleModal').modal('hide');
        Swal.fire(
            "Success!",
            "Products Created Successfully.",
            "success"
        )
    });
    window.livewire.on('productUpdated', () => {
        Swal.fire(
            "Success!",
            "Products Updated Successfully.",
            "success"
        )
    });
    window.livewire.on('productDeleted', () => {
        Swal.fire(
            "Success!",
            "Products Deleted Successfully.",
            "success"
        )
    });



</script>
@endpush
