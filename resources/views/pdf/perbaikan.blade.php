<div>
    <h2>Perbaikan Table</h2>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Id</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">persetujuan</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Keeterangan</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Kerusakan</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">tanggal Booking</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datasource as $perbaikan)
                <tr>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $perbaikan->id }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $perbaikan->persetujuan }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $perbaikan->keterangan }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $perbaikan->kerusakan }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $perbaikan->tanggal_booking }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">
                        {{ $perbaikan->user }}
                    </td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">
                        {{ $perbaikan->created_at }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
