@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Select2 Example test</h1>
@stop

@section('plugins.Select2', true)

@section('content_nav_right')
    <x-main-menu></x-main-menu>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{--                    <p class="mb-0">Products page!</p>--}}
                    <livewire:select2 />
                </div>
            </div>
        </div>
    </div>
@stop



