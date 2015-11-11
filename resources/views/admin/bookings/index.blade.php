@extends('admin.layouts.admin')

@section('pageTitle', 'Bookings')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <h1 class="page-header">Bookings</h1>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Booking</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Status</th>
                        <th>&nbsp;</th>
                    </tr>   
                </thead>

                <tbody>

                    @forelse( $userWithBookings as $user )

                        <tr>
                            @foreach($user->bookings as $booking) 
                                <td>{{ $booking->booking_reference }}</td>
                            @endforeach
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->city }}</td>
                            <td>{{ $user->country }}</td>
                            <td>
                                @foreach( $user->bookings as $booking )
                                    {{ $booking->status }}
                                @endforeach
                            </td>
                            <td>
                                <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#bookingInformation{{$user->id}}">
                                    View Booking
                                </button>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="6">No bookings yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @foreach( $userWithBookings as $user )

                <div class="modal fade" id="bookingInformation{{$user->id}}" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">{{ $user->name }}</h4>
                            </div>
                            <div class="modal-body">
                                <div class="cart">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Package</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th class="text-right">Subtotal</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $total = 0; ?>
                                            @foreach($user->bookings as $booking)
                                                @foreach($booking->packages as $package)
                                                    <tr>
                                                        <td width="500">
                                                            <p>
                                                                {{ $package->name }}
                                                            </p>
                                                            <p class="text-muted">
                                                                <i class="fa fa-calendar"></i> 
                                                                {{ $package->pivot->date }}
                                                            </p>

                                                            <ul class="collection">
                                                                <li class="collection-item">
                                                                    Child:
                                                                    {{ $package->pivot->child_quantity }} &times; 
                                                                    {{ number_format($package->child_price) }} <span class="current-currency">AED</span>
                                                                </li>
                                                            </ul>
                                                            
                                                        </td>

                                                        <td class="nowrap">{{ number_format($package->adult_price) }}  <span class="current-currency">AED</span></td>
                                                        
                                                        <td>
                                                            {{ $package->pivot->adult_quantity }}
                                                        </td>

                                                        <td class="text-right nowrap">
                                                            <?php
                                                            $subtotal =  ($package->adult_price * $package->pivot->adult_quantity) + ($package->child_price * $package->pivot->child_quantity);
                                                            ?>
                                                            {{ number_format($subtotal) }} <span class="current-currency">AED</span>
                                                        </td>

                                                        <?php 
                                                            $total += $subtotal; 
                                                        ?>
                                                    </tr>
                                                @endforeach
                                            @endforeach

                                            <tr>
                                                <td colspan="4">
                                                    <h4 class="text-right">Total: {{ number_format($total) }} <span class="current-currency">AED</span></h4>
                                                </td>
                                            </tr>

                                        </tbody>   
                                    </table>

                                    <h4>Comments</h4>

                                    @foreach($user->bookings as $booking)
                                        {{ $booking->comments }}
                                    @endforeach
                                </div>                            

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach



{{--             <table class="table table-hover">
            	<thead>
            		<tr>
                        <th>Name</th>
            			<th>Package</th>
            			<th>Quantity</th>
            			<th>Price</th>
            			<th>Child</th>
            			<th>Total</th>
            			<th>Booked Date</th>
            		</tr>	
            	</thead>

            	<tbody>

            		@foreach( $bookings as $item )

            		<tr>
                        <td><a href="#" data-toggle="modal" data-target="#user{{$item->user->id}}">{{ $item->user->name }}</a></td>
            			<td><a href="{{ route('package', str_slug($item->name, '-')) }}">{{ $item->name }}</a></td>
            			<td>{{ $item->quantity }}</td>
            			<td>{{ $item->price }} AED</td>
            			<td>{{ $item->child_quantity }}</td>
            			<td>{{ $item->total }} AED</td>
            			<td>{{ $item->date }}</td>
            		</tr>

                    <div class="modal fade" id="user{{$item->user->id}}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">{{ $item->user->name }}</h4>
                                </div>
                                <div class="modal-body">

                                    <dl class="dl-horizontal">
                                        <dt>Name:</dt>
                                        <dd>{{ $item->user->name }}</dd>
                                        
                                        <dt>Email:</dt>
                                        <dd><a href="mailto:{{ $item->user->email }}">{{ $item->user->email }}</a></dd>

                                        <dt>Phone:</dt>
                                        <dd>{{ $item->user->phone }}</dd>

                                        <dt>City:</dt>
                                        <dd>{{ $item->user->city }}</dd>

                                        <dt>Country:</dt>
                                        <dd>{{ $item->user->country }}</dd>                                        

                                    </dl>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

            		@endforeach
            	</tbody>
            </table> --}}
        </div>
    </div>
@endsection