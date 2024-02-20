<div>
    <h2>Tabel Transaksi</h2>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Id</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Nama</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Jumlah</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Total Biaya</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Tanggal Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datasource as $transaksi)
                <tr>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $transaksi->id }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">
                        {{ $transaksi->perbaikan->bookingservice->user->name }}
                    </td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $transaksi->jumlah }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $transaksi->total_biaya }}
                    </td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $transaksi->created_at }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
