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
                <td class="border px-4 py-2 text-sm font-semibold">No Hp</td>
                <td class="border px-4 py-2">{{ $row->user->no_hp }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Alamat</td>
                <td class="border px-4 py-2">{{ $row->user->alamat }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Jenis Barang</td>
                <td class="border px-4 py-2">{{ $row->jenis_barang }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Kerusakan</td>
                <td class="border px-4 py-2">{{ $row->kerusakan }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Tanggal Booking</td>
                <td class="border px-4 py-2">{{ $row->tanggal_booking }}</td>
            </tr>
        </tbody>
    </table>
</div>
