<div>
    <h2>Transaksi Table</h2>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Id</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Judul</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Agenda</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Tanggal</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Waktu</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Peserta</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datasource as $rapat)
                <tr>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $rapat->id }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $rapat->judul }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $rapat->agenda }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $rapat->tanggal }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $rapat->waktu }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">
                        {{ $rapat->peserta }}
                    </td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">
                        {{ $rapat->created_at }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
