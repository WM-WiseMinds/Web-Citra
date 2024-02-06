<div class="p-2 bg-white border border-slate-200">
    <table class="table-auto w-full">
        <tbody>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Id</td>
                <td class="border px-4 py-2">{{ $id }}</td>
            </tr>
            {{-- @if ($row->foto)
                <tr>
                    <td class="border px-4 py-2 text-sm font-semibold">Foto</td>
                    <td class="border px-4 py-2">
                        <img src="{{ asset('storage/' . $row->foto) }}" alt="Foto" class="w-32 h-32 object-cover">
                    </td>
                </tr>
            @endif --}}
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">alamat</td>
                <td class="border px-4 py-2">{{ $row->alamat }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">kerusakan</td>
                <td class="border px-4 py-2">{{ $row->kerusakan }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">no_hp</td>
                <td class="border px-4 py-2">{{ $row->no_hp }}</td>
            </tr>
        </tbody>
    </table>
</div>
