<style>
    body {
        font-family: Arial, sans-serif;
    }

    .invoice {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
    }

    .invoice h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .invoice-section {
        margin-bottom: 20px;
    }

    .invoice-section h3 {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .invoice-section hr {
        border: none;
        border-top: 1px solid #ccc;
        margin: 10px 0;
    }

    .invoice-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 5px;
    }

    .invoice-row span {
        flex: 1;
    }

    .total-biaya {
        text-align: right;
        font-size: 24px;
        font-weight: bold;
    }
</style>

<div class="invoice">
    <h2>Invoice</h2>

    <div class="invoice-section">
        <div class="invoice-row">
            <div>
                <h3>Customer Details</h3>
                <hr>
                <p>Nama User: {{ $transaksi->perbaikan->bookingservice->user->name }}</p>
                <p>No HP: {{ $transaksi->perbaikan->bookingservice->user->no_hp }}</p>
                <p>Alamat: {{ $transaksi->perbaikan->bookingservice->user->alamat }}</p>
            </div>
            <div>
                <h3>Transaction Details</h3>
                <hr>
                <p>Id: {{ $transaksi->id }}</p>
                <p>Jenis Barang: {{ $transaksi->perbaikan->bookingservice->jenis_barang }}</p>
            </div>
        </div>
    </div>

    <div class="invoice-section">
        <h3>Kerusakan</h3>
        <hr>
        <div class="invoice-row">
            <p>{{ $transaksi->perbaikan->bookingservice->kerusakan }}</p>
            <p>Keterangan: {{ $transaksi->perbaikan->keterangan }}</p>
        </div>
        <div>
            <h4>Jenis Perbaikan:</h4>
            <ul>
                @foreach ($transaksi->perbaikan->detailperbaikan as $perbaikan)
                    <li class="invoice-row">
                        <span>{{ $perbaikan->jenis_perbaikan }}</span>
                        <span>{{ 'Rp ' . number_format($perbaikan->biaya, 0, ',', '.') }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="invoice-section">
        <div class="invoice-row">
            <div>
                <h3>Payment Details</h3>
                <hr>
                <p>Jumlah: {{ $transaksi->jumlah }}</p>
            </div>
            <div>
                <h3>Total Biaya</h3>
                <hr>
                <p class="total-biaya">{{ 'Rp ' . number_format($transaksi->total_biaya, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
</div>
