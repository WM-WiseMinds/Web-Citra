<div class="p-2 bg-white border border-slate-200">
    <table class="table-auto w-full">
        <tbody>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Id</td>
                <td class="border px-4 py-2">{{ $id }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Nama User</td>
                <td class="border px-4 py-2">{{ $row->perbaikan->bookingservice->user->name }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">No HP</td>
                <td class="border px-4 py-2">{{ $row->perbaikan->bookingservice->user->no_hp }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Alamat</td>
                <td class="border px-4 py-2">{{ $row->perbaikan->bookingservice->user->alamat }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Total Biaya</td>
                <td class="border px-4 py-2">{{ $row->total_biaya_formatted }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Jumlah</td>
                <td class="border px-4 py-2">{{ $row->jumlah }}</td>
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
                <td class="border px-4 py-2 text-sm font-semibold">Keterangan</td>
                <td class="border px-4 py-2">{{ $row->perbaikan->keterangan }}</td>
            </tr>
        </tbody>
    </table>
</div>
