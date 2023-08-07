@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Create Codes</h5>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('codes.store') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Account Numbers</label>
                    <input type="text" name="account_numbers" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection