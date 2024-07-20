@extends('layout')

@section('content')
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width: 50% ;">Product</th>
                <th style="width: 10% ;">Price</th>
                <th style="width: 8% ;">Quantity</th>
                <th style="width: 22% ;" class="text-center">Subtotal</th>
                <th style="width: 10% ;"></th>
            </tr>
        </thead>

        <tbody>

            @php
                $total = 0;
            @endphp

            @if (session('cart'))
                @foreach ((array) session('cart') as $id => $details)
                    @php
                        $total += $details['quantity'] * $details['price'];
                    @endphp

                    <tr data-id="{{ $id }}">
                        <td>
                            <div class="row">
                                <div class="col-sm-3 hidden-xs">
                                    <img src="{{ asset('img/' . $details['photo']) }}" width="70" height="70"
                                        alt="">
                                </div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['product_name'] }}</h4>
                                </div>
                            </div>
                        </td>

                        <td>
                            ${{ $details['price'] }}
                        </td>

                        <td>
                            <input type="number" value="{{ $details['quantity'] }}"
                                class="form-control quamtity cart_update" min="1">
                        </td>

                        <td class="text-center">
                            ${{ $details['price'] * $details['quantity'] }}
                        </td>

                        <td class="actions">
                            <button class="btn btn-danger btn-sm cart_remove">
                                <i class="fa-solid fa-trash"></i> Delete
                            </button>
                        </td>


                    </tr>
                @endforeach
            @endif


        </tbody>

        <tfoot>
            <tr>

                <td colspan="5" class="text-end">
                    <h3><strong>Total ${{ $total }}</strong></h3>
                </td>
            </tr>

            <tr>
                <td colspan="5" class="text-end">
                    <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa-solid fa-arrow-left"></i> Continue Shopping</a>
                    <button class="btn btn-success"><i class="fa-solid fa-money"></i> Checkout</button>
                </td>
            </tr>

        </tfoot>

    </table>
@endsection

@section('scripts')
    <script>

        $('.cart_remove').click(function(e){
            e.preventDefault();

            var ele = $(this);

            if (confirm('Do you really want to remove ?')) {
                $.ajax({
                    url:'{{ route('remove_from_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>
@endsection
