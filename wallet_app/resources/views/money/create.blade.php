@extends('layouts.layout')


@section('content')

        <!-- left column -->
<div class="col-md-6">

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add Money</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('money.store')}}" method="POST">
    @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Enter Amount</label>
                <input type="text" class="form-control" id="amount" placeholder="Enter amount" name="amount">
                @error('amount')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
</div>
</div>

             <!-- /.card -->
@endsection
