<div>
    <h2>BookingService Table</h2>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Id</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Jenis Barang</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Nama</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">No hp</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Alamat</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Kerusakan</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">tanggal Booking</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datasource as $bookingservice)
                <tr>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $bookingservice->id }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $bookingservice->jenis_barang }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $bookingservice->nama }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $bookingservice->no_hp }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $bookingservice->alamat }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $bookingservice->kerusakan }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $bookingservice->tanggal_booking }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $bookingservice->creatd_at }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">
                        {{ $bookingservice->user }}
                    </td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">
                        {{ $bookingservice->created_at }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
