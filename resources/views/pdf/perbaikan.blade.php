<div>
    <h2>Tabel Perbaikan</h2>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Id</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Nama User</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Jenis Barang</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Kerusakan</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Keterangan</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Persetujuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datasource as $perbaikan)
                <tr>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $perbaikan->id }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $perbaikan->user->name }}
                    </td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">
                        {{ $perbaikan->bookingservice->jenis_barang }}</td>
                    </td>
                    </td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">
                        {{ $perbaikan->bookingservice->kerusakan }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $perbaikan->keterangan }}
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $perbaikan->persetujuan }}
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
