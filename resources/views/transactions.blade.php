@extends('layouts.index')

@section('title', "Transactions || e-earners")

@section('breadtitle', "Transactions")

@section('breadli')
<li class="breadcrumb-item active">transactions</li>               
@endsection

@section('content')
                 <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                <div class="card mt-5">
                            <div class="card-body">
                                <h4 class="card-title">Transactions</h4>
                                <h6 class="card-subtitle">incoming and outgoing</h6>
                                <div class="table-responsive ">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th>Username</th>
                                                <th>Type</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($trans as $tran)
                                            <tr>
                                            <td>{{$tran->username}}</td>
                                                <td>{{$tran->type}}</td>
                                                <td>{{$tran->amount}}</td>
                                                @if($tran->status == 'pending') 
                                                <td class="btn btn-outline-danger">{{$tran->status}}</td> 
                                                @else
                                                <td class="btn btn-success waves-effect waves-light">{{$tran->status}}</td> 
                                                @endif                   
                                                <td>{{$tran->created_at}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                       

@endsection