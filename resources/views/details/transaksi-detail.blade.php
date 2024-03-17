{{-- <div class="p-2 bg-white border border-slate-200">
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
</div> --}}

<div class="p-5 bg-white border border-slate-200 rounded-lg">
    <h2 class="text-2xl font-bold mb-5 text-center">Invoice</h2>

    <div class="flex justify-between mb-5">
        <div>
            <h3 class="font-semibold text-lg">Customer Details</h3>
            <hr class="border-slate-200 my-2">
            <p>Nama User: {{ $row->perbaikan->bookingservice->user->name }}</p>
            <p>No HP: {{ $row->perbaikan->bookingservice->user->no_hp }}</p>
            <p>Alamat: {{ $row->perbaikan->bookingservice->user->alamat }}</p>
        </div>
        <div>
            <h3 class="font-semibold text-lg">Transaction Details</h3>
            <hr class="border-slate-200 my-2">
            <p>Id: {{ $id }}</p>
            <p>Jenis Barang: {{ $row->perbaikan->bookingservice->jenis_barang }}</p>
        </div>
    </div>

    <div class="mb-5">
        <h3 class="font-semibold text-lg">Kerusakan</h3>
        <hr class="border-slate-200 my-2">
        <div class="flex justify-between">
            <p>{{ $row->perbaikan->bookingservice->kerusakan }}</p>
            <p>Keterangan: {{ $row->perbaikan->keterangan }}</p>
        </div>
    </div>

    <div class="mb-5">
        <h3 class="font-semibold text-lg">Jenis Perbaikan:</h3>
        <hr class="border-slate-200 my-2">
        <ul class="">
            @foreach ($row->perbaikan->detailperbaikan as $perbaikan)
                <li class="flex justify-between">
                    <span>{{ $perbaikan->jenis_perbaikan }}</span>
                    <span>{{ 'Rp ' . number_format($perbaikan->biaya, 0, ',', '.') }}</span>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="flex justify-between">
        <div>
            <h3 class="font-semibold text-lg">Payment Details</h3>
            <hr class="border-slate-200 my-2">
            <p>Jumlah: {{ $row->jumlah }}</p>
        </div>
        <div>
            <h3 class="font-semibold text-lg text-right">Total Biaya</h3>
            <hr class="border-slate-200 my-2">
            <p class="text-right text-2xl font-bold">{{ $row->total_biaya_formatted }}</p>
        </div>
    </div>
</div>
