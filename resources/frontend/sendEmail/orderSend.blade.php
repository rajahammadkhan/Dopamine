<style>
    .truncated  {
    text-overflow: ellipsis;
    white-space: nowrap;
    display: block;
    overflow: hidden;
    width: 30em;
    }

</style>
                <div class="card">
                    <div class="header">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <p>Hi
{{--                                {{auth()->check() ? auth()->user()->name : '' }}--}}
                            </p>
                            <p>Your Order has been successfully placed.</p>
                        </div>
                        <div class="body table-responsive">
                            <table class="table" id="myTable">
                                <thead>
                                <tr>
                                    <th class="col-lg-3 text-center" style="padding-inline: 12px">Image</th>
                                    <th class="col-lg-3 text-center" style="padding-inline: 12px">Name</th>
                                    <th class="col-lg-3 text-center" style="padding-inline: 12px">Quantity</th>
                                    <th class="col-lg-3 text-center" style="padding-inline: 12px">Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                 $i=0;
                                 ?>
                                @foreach($order_detail as $row)
                                    <tr>
                                        <td>
                                            @if($row->image!= null)
                                                <img style="" src="{{asset('images/media'.'/'.$row->image)}}" height="60px" width="60px">
                                            @else

                                            @endif
                                        </td>
                                        <td class="truncated">{{$row->title}}</td>
                                        <td class="text-center">{{$quantity[$i]}}</td>
                                        <td class="">{{$row->currency_symbol}}{{$row->discounted_price * $quantity[$i]}}</td>
                                    </tr>
                                <?php
                                $i++;
                                ?>
                                @endforeach
                                <tr>
                                    <td colspan="3"></td>
                                    <td style="font-size: 15px;font-weight: bold;border-top: 1px solid #ccc">Subtotal : {{$total['currency_symbol']}} {{$total['pre_total']}} </td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td style="font-size: 15px;font-weight: bold;">Coupon Discount : {{$total['currency_symbol']}} {{$total['coupon_discount']}} </td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td style="font-size: 15px;font-weight: bold;">Shipping : {{$total['currency_symbol']}} {{$total['shipment_charges']}} </td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td style="font-size: 22px;font-weight: bold;">Total : {{$total['currency_symbol']}} {{$total['order_total']}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
