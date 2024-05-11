@extends('management.layouts.master')
@section('title')
    Dashboard - Admin Control Panel
@endsection
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="breadcrumb breadcrumb-style ">
                    <li class="breadcrumb-item">
                        <h4 class="page-title">Dashboard</h4>
                    </li>
                    <li class="breadcrumb-item bcrumb-1">
                        <a>
                            <i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <!-- Task Info -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>
                        <strong>Recent</strong> Orders</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">

{{--                            <ul class="dropdown-menu pull-right">--}}
{{--                                <li>--}}
{{--                                    <a href="#" onClick="return false;">Action</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#" onClick="return false;">Another action</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#" onClick="return false;">Something else here</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
                        </li>
                    </ul>
                </div>
                <div class="tableBody">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th>Shipment Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(auth()->user()->hasPermissionTo('contacts-list'))
                            <?php
                            $count=1
                            ?>
                            @if(count($order)  != 0)
                            @foreach($order as $row)
                            <tr>
                                <th scope="row">

                                    <a class="text-signature" href="{{route('orders.show',$row->order_id)}}">
                                    #{{$row->order_number}}
                                    </a>
                                </th>

                                <td>{{$row->total_price}} {{$row->currency}}</td>
                                <td>
                                    {{date("d-M-Y", strtotime($row->order_date))}} <br>
                                    {{date("h:i A", strtotime($row->order_date))}}                                </td>

                                <td>
                                    @if($row->shipment_id != null)
                                        <label class="badge badge-success" > {{$row['shipment_id']}}</label>
                                    @else
                                        <label class="badge badge-warning text-white border-0 bg-signature" >Pending</label>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="text-center" colspan=4>
                                    <a href="{{url('admin/orders')}}" class="btn bg-signature text-white justify-content-center d-flex align-items-center text-center" href="">View All</a>

                                </td>
                            </tr>
                            @else

                                <tr>
                                    <td colspan="3">
                                        No Record Found

                                    </td>
                                </tr>
                            @endif
                            <?php
                            $count=1
                            ?>
                            @else
                                <tr>
                                    <td class="text-center" colspan="5">
                                UNAUTHORIZED
                                    </td>
                                </tr>
                            @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Task Info -->
        <!-- Browser Usage -->
        <div class="d-none col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="header">
{{--                    <h2>--}}
{{--                        <strong>Total</strong> Revenue</h2>--}}
{{--                    <ul class="header-dropdown m-r--5">--}}
{{--                        <li class="dropdown">--}}
{{--                            <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"--}}
{{--                               role="button" aria-haspopup="true" aria-expanded="false">--}}
{{--                                <i class="material-icons">more_vert</i>--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu pull-right">--}}
{{--                                <li>--}}
{{--                                    <a href="#" onClick="return false;">Action</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#" onClick="return false;">Another action</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#" onClick="return false;">Something else here</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                </div>
{{--                <div class="body">--}}
{{--                    <div class="body text-center">--}}
{{--                        <h4 class="m-b-20">Total Order</h4>--}}
{{--                        <h6 class="m-b-30">5,98,345</h6>--}}
{{--                        <input type="text" class="dial" value="93" data-width="120" data-height="120"--}}
{{--                               data-thickness="0.12" data-fgColor="#F3AB81">--}}
{{--                        <h4 class="m-t-30">Satisfaction Rate</h4>--}}
{{--                        <h6 class="displayblock m-t-10">36% Average</h6>--}}
{{--                        <div class="icon m-t-25">--}}
{{--                            <div class="chart chart-bar2">--}}
{{--                                6,4,8,6,8,10,5,6,7,9,5,6,4,8,6,8,10,5,6,7,9,5,10,5,6,7,9,5,6,4,8,6,8</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
        <!-- #END# Browser Usage -->
    </div>
</div>

@endsection
