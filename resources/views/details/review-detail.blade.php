<div class="p-2 bg-white border border-slate-200">
    <table class="table-auto w-full">
        <tbody>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Id</td>
                <td class="border px-4 py-2">{{ $id }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Nama</td>
                <td class="border px-4 py-2">{{ $row->user->name }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Jenis Barang</td>
                <td class="border px-4 py-2">{{ $row->perbaikan->bookingservice->jenis_barang }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Kerusakan</td>
                <td class="border px-4 py-2">{{ $row->perbaikan->bookingservice->kerusakan }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Rating</td>
                <td class="border px-4 py-2">{{ $row->rating }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Komentar</td>
                <td class="border px-4 py-2">{{ $row->comment }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Tanggal Review</td>
                <td class="border px-4 py-2">{{ $row->created_at }}</td>
            </tr>
        </tbody>
    </table>
</div>
