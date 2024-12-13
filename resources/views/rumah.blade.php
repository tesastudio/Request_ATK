@extends('layouts.backend.blankpage')

@push('styles')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
    <script>
        Livewire.on('productStore', () =>{
            $('#Modal1').modal('hide');
        });
    </script>
@endpush

@section('content')
    <div class="container">
        <h1>Laravel Livewire</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-3">
                    @livewire('product-form')
                </div>
                <div class="card">
                    <div class="card-header">
                        Product
                    </div>
                    <div class="card-body">
                        @livewire('product-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection