<div class="p-2 bg-white border border-slate-200">
    <table class="table-auto w-full">
        <tbody>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Id</td>
                <td class="border px-4 py-2">{{ $id }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Jenis Barang</td>
                <td class="border px-4 py-2">{{ $row->bookingservice->jenis_barang }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Nama</td>
                <td class="border px-4 py-2">{{ $row->user->name}}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Persetujuan</td>
                <td class="border px-4 py-2">{{ $row->persetujuan }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Keterangan</td>
                <td class="border px-4 py-2">{{ $row->keterangan }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">kerusakan</td>
                <td class="border px-4 py-2">{{ $row->bookingservice->kerusakan }}</td>
            </tr>                
        </tbody>
    </table>
</div>
