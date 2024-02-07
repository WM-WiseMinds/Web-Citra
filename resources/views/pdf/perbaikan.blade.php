<div>
    <h2>Perbaikan Table</h2>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Id</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Nama User</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Jenis Barang</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Persetujuan</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Keterangan</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Kerusakan</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">tanggal Booking</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Total Biaya</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datasource as $perbaikan)
                <tr>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $perbaikan->id }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $perbaikan->user->name }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $perbaikan->bookingservice->jenis_barang}}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $perbaikan->persetujuan }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $perbaikan->keterangan }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $perbaikan->bookingservice->kerusakan }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $perbaikan->bookingservice->tanggal_booking }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $perbaikan->transaksi->total_biaya }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $perbaikan->updated_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
