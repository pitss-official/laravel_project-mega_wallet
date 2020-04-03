@extends('layouts.layout')

@section('content')


    <div class="col-md-6">

        <div class="card card-primary">
            <div class="card-header">s
                <h3 class="card-title">Add Money</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('money.update', Auth::user())}}" method="POST">

                @csrf
                @method('PUT')
                <div class="card-body">

                    <!-- select -->
                    <div class="form-group">
                        <label>Select User</label>
                        <select class="form-control" name="user">
                            @forelse($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @empty
                                <p>No other users available</p>
                            @endforelse
                        </select>
                    </div>


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

@endsection
