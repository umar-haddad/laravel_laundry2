@extends('app')
@section('content')
<div class="row ">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Data Pelanggan :</h3>
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td>{{ $details->customer->name }}</td>
                            </tr>
                            <tr>
                                <th>No. Telp</th>
                                <td>:</td>
                                <td>{{ $details->customer->phone }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td>{{ $details->customer->address }}</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>


    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Data Transaksi :</h3>
                <table class="table ">
                        <thead>
                            <tr>
                                <th>No. Transaksi</th>
                                <td>:</td>
                                <td>{{ $details->order_code }}</td>
                            </tr>
                            <tr>
                                <th>estimasi pengambilan</th>
                                <td>:</td>
                                <td>{{ date('d F y', strtotime($details->order_end_date)) }}</td>
                            </tr>
                            <tr>
                                <th>status</th>
                                <td>:</td>
                                <td>{{ $details->status_text }}</td>
                            </tr>
                        </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">PEMESANAN</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>paket</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details->transOrderDetail as $index => $detail)
                        <tr>
                            <td>{{ $index += 1 }}</td>
                            <td>{{ $detail->service->service_name }}</td>
                            <td>{{ $detail->qty }}</td>
                            <td>{{ number_format($detail->service->price) }}</td>
                            <td>{{ $detail->subtotal }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Grand Total</th>
                            <td colspan="2" id="grand_total" class="text-right" align="right">Rp {{ number_format($details->total) }}</td>
                        </tr>
                        <tr>
                            <th colspan="3">Bayar :</th>
                            <td colspan="2" class="text-right" align="right">
                                <input type="number" class="form-control" id="order_pay" name="order_pay" required>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="3">Kembali :</th>
                            <td colspan="2" class="text-right" align="right">
                                <input type="text" class="form-control" id="order_change_display" name="order_change_display" readonly>
                                <input type="hidden" class="form-control" id="order_change" name="order_change" required>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    const orderPay = document.getElementById('order_pay');
    const orderChange = document.getElementById('order_change');
    const orderChangeDisplay = document.getElementById('order_change_display');
    const grandTotal = document.getElementById('grand_total');

    grandTotal.value = grandTotal.toLocaleString('id-ID', {
        style: 'currency',
        currency: 'IDR',
    });

    orderPay.addEventListener('input', function() {
        const total = {{ $details->total }};
        const pay = parseInt(orderPay.value) || 0;
        const change = pay - total;

        orderChangeDisplay.value = change.toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR',
        });
        orderChange.value = change;
    });
</script>
@endsection
