@extends('layouts.layout')


@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">My Transactions</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                    <tr>
                        <th>S No</th>
                        <th>Amount</th>
                        <th>Sent to</th>
                        <th>Received By</th>
                        <th>Transaction Id</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                    $c=1;
                    @endphp
                    @forelse($money as $m)
                        <tr>
                        <td>@php $c++ @endphp</td>
                        <td>{{$m->amount}}</td>
                        <td>{{$m->sentBy}}</td>
                        <td>{{$m->receivedBy}}</td>
                        <td>{{$m->id}}</td>
                        <td>{{$m->created_at}}</td>

                        </tr>
                        @empty
                        <tr>No transactions available</tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>


@endsection
