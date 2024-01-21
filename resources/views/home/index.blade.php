@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <h1 class="text-center mt-5 mb-5">{{ __('home.welcome') }}</h1>
    <div class="container text-center mt-5 mb-5" >
        <div class="row   mt-5 mb-5" >
            <div class="col-4 mb-3">
                <a class="btn btn-success" href="{{ route('users.index') }}">
                    {{ __('home.Show Users') }}
                </a>
            </div>
            <div class="col-4 mb-3">
                <a class="btn btn-success" href="{{ route('items.index') }}">
                    {{ __('home.Show Items') }}
                </a>
            </div>
            <div class="col-4 mb-3">
                <a class="btn btn-success" href="{{ route('invoices.create') }}">
                    
                    {{ __('home.Create Invoice') }}
                </a>
            </div>
        </div>
    </div>
@endsection

