@extends('frontend.layouts.master')
@section('title')
    Order Detail - {{config('app.name')}}
@endsection
@section('content')
    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #cd9cf2;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to top left, rgba(205, 156, 242, 1), rgba(246, 243, 255, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to top left, rgba(205, 156, 242, 1), rgba(246, 243, 255, 1))
        }
    </style>
    <div class="container-fluid md-shadow rounded-4">
        <div class="row">
            @include('frontend.dashboard.userSidebar')
            <div class="col-lg-10 col-xl-9">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header px-4 py-5">
                        <h5 class="text-muted mb-0">Thanks for your Order, <span
                                    style="color: #f89321;">{{auth()->user()->name}}</span>!</h5>
                    </div>
                    <style>
                        .ps-0 {
                            padding-left: 0px !important;
                            display: flex;
                            justify-content: space-between;
                        }
                    </style>
                    <div class="container-fluid px-4">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="card py-4">
                                            <div class="header">
                                                <div class="row">
                                                    <div class=" col-12">
                                                        <label for="email_address1"> <strong><a href=""
                                                                                                style="color: #0ba360">
                                                                    #{{$order->id ?? ''}}</a> </strong></label>
                                                        <div class="mt-3">
                                                            <table class="table">
                                                                <?php
                                                                $i = 0;
                                                                ?>
                                                                @foreach($products as $row)
                                                                    <tr>
                                                                        <td class="ps-0">
                                                            <span>
                                                                <a href="{{route('products.show',$row->id)}}?cur_id={{$order->currency_id}}">
                                                                {{$row->title ?? ''}}
                                                                </a>
                                                            </span>
                                                                            <span>
                                                                <strike>{{$row->compare_price}} </strike> {{$row->discounted_price}} * {{$quantity[$i]}}
                                                            </span>
                                                                            <span>
                                                                {{$row->discounted_price * $quantity[$i]}}
                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                    $i++;
                                                                    ?>
                                                                @endforeach
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card py-4">
                                            <div class="header">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="email_address1"> <strong><a href=""
                                                                                                style="color: #0ba360">PAID</a>
                                                            </strong></label>
                                                        <div class="mt-3">
                                                            <table class="table">
                                                                <tbody>
                                                                <tr>
                                                                    <td class="ps-0">
                                                      <span>
                                                          Discount:
                                                       </span>
                                                                        <span>
                                                           {{$order->currency_symbol ?? ''}} {{$order->coupon_discount ?? ''}}
                                                       </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="ps-0">
                                                         <span>
                                                             Subtotal:
                                                       </span>
                                                                        <span>
                                                           {{$order->currency_symbol ?? ''}} {{$order->pre_total ?? ''}}
                                                       </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="ps-0">
                                                         <span>
                                                             Shipping:
                                                       </span>
                                                                        <span>
                                                           {{$order->currency_symbol ?? ''}} {{$order->shipment_charges ?? ''}}
                                                       </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="ps-0" style="font-weight: bold">
                                                       <span>
                                                            Grand Total:
                                                       </span>
                                                                        <span>
                                                           {{$order->currency_symbol ?? ''}} {{$order->order_total ?? ''}}
                                                       </span>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="header">
                                                <div class="row my-1">
                                                    <div class="col-12">
                                                        <table class="table">
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div>
                                                                        <label for="email_address1"><strong>Notes</strong>
                                                                        </label>
                                                                    </div>
                                                                    <div>
                                                                        <label for="email_address1">No notes from
                                                                            customer</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div>
                                                                        <label for="email_address1"><strong>Additional
                                                                                Detail</strong>
                                                                        </label>
                                                                    </div>
                                                                    <div>
                                                                        <label for="email_address1"></label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="header">
                                                <div class="row my-1">
                                                    <div class="col-12">
                                                        <table class="table">
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div>
                                                                        <label for="email_address1"><strong>Customer</strong>
                                                                        </label>
                                                                    </div>
                                                                    <div>
                                                                        <label for="email_address1">{{$order['username']->name ?? ''}}</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div>
                                                                        <label for="email_address1"><strong>Contact
                                                                                Information</strong> </label>
                                                                    </div>
                                                                    <div>
                                                                        <label for="email_address1"><a
                                                                                    href="mailto:{{$order['username']->email ?? ''}}">{{$order['username']->email ?? ''}}</a></label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div>
                                                                        <label for="email_address1"><strong>Shipping
                                                                                Address</strong>
                                                                        </label>
                                                                    </div>
                                                                    <div>
                                                                        <label for="email_address1">{{$order->shipping_street_address ?? ''}}</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div>
                                                                        <label for="email_address1"><strong>Billing
                                                                                Address</strong>
                                                                        </label>
                                                                    </div>
                                                                    <div>
                                                                        <label for="email_address1">{{$order->billing_street_address ?? ''}}</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
