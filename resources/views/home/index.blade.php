@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <h1>Welcome to the Home Page!</h1>
     <div class="container">
        <div class="col-md-12 d-flex">
            <div class="col-md-4">
                <a class="btn btn-success" href="{{ route('users.index') }}">
                    Show Users
                </a>
            </div>
            <div class="col-md-4">
                <a class="btn btn-success" href="{{ route('items.index') }}">
                    Show Items
                </a>
            </div>
            <div class="col-md-4">
                <a class="btn btn-success" href="{{ route('invoices.create') }}">
                    Create Invoice
                </a>
            </div>
        </div>
     </div>
@endsection
