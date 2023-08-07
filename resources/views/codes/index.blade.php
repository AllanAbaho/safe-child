@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Create Codes</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif()

            <a href="{{route('codes.create')}}" class="btn btn-primary"> Create <i class="fa fa-plus"></i>
            </a>
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Account Number</th>
                        <th scope="col">File Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">File</th>
                    </tr>
                </thead>
                <tbody>

                    <?php


                    for ($i = 0; $i < count($codes); $i++) :
                    ?>
                        <tr>
                            <th scope="row">{{$i+1}}</th>
                            <td>{{$codes[$i]->account_number}}</td>
                            <td>{{$codes[$i]->file}}</td>
                            <td>{{$codes[$i]->created_at}}</td>
                            <td><a href="{{ asset('images/'.$codes[$i]->file) }}" download>Download<i class="bi bi-0-circle"></i></a></td>

                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection