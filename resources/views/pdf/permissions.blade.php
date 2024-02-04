<div>
    <h2>Permissions Table</h2>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Id</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Nama</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datasource as $permissions)
                <tr>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $permissions->id }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $permissions->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
