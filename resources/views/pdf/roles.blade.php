<div>
    <h2>Permissions Table</h2>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Id</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Nama</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Permissions</th>
                <th style="border: 1px solid black; padding: 5px; text-align: left;">Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datasource as $roles)
                <tr>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $roles->id }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">{{ $roles->name }}</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">
                        {{ $roles->permissions }}
                    </td>
                    <td style="border: 1px solid black; padding: 5px; text-align: left;">
                        {{ $roles->created_at }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
