<div>
    <h2>Tabel Komentar</h2>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Id</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Nama</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Rating</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Komentar</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datasource as $review)
                <tr>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $review->id }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $review->user->name }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">
                        {{ $review->rating }}
                    </td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">
                        {{ $review->comment }}
                    </td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">
                        {{ $review->created_at }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
