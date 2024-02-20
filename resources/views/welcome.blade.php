<x-guest-layout>
    <div class="flex flex-col min-h-screen">
        @livewire('navbar')
        <div class="flex-grow">

            <div class="hero h-[75vh]"
                style="background-image: url(https://images.unsplash.com/photo-1581092921461-eab62e97a780?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);">
                <div class="hero-overlay bg-opacity-60"></div>
                <div class="hero-content text-center text-neutral-content">
                    <div class="max-w-md">
                        <h1 class="mb-5 text-5xl font-bold">Mari Perbaiki Elektronik Anda Bersama Kami!
                        </h1>
                        <p class="mb-5">Citra Electronic Service, solusi terbaik untuk kebutuhan perbaikan elektronik
                            Anda!</p>
                        <a class="btn btn-primary" href="{{ route('register') }}">Daftar Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="hero min-h-fit bg-gray-300 py-10">
                <div class="hero-content flex-col lg:flex-row-reverse">
                    <div>
                        <h1 class="text-5xl font-bold text-center">Citra Elektronik Service</h1>
                        <p class="py-6 text-center">
                            Citra Electronic Service adalah tempat terbaik untuk memperbaiki peralatan elektronik Anda
                            yang rusak. Kami melayani berbagai jenis elektronik, seperti televisi, radio, setrika, rice
                            cooker, blender, dan alat elektronik rumah tangga lainnya.
                        </p>
                    </div>
                </div>
            </div>
            <div class="hero min-h-fit py-10 bg-base-200">
                <div class="hero-content flex-col lg:flex-row-reverse">
                    <img src="{{ asset('landing-page/ces.png') }}" alt="hero image"
                        class="max-w-sm rounded-lg shadow-2xl" />
                    <div>
                        <h1 class="text-5xl font-bold">Keunggulan Citra Elektronik Service</h1>
                        <ul class="list-none p-0 mt-4 text-gray-700">
                            <li class="border-b border-gray-200 py-2">
                                <span class="text-xl font-bold">Teknisi berpengalaman dan profesional</span>
                                <p>Sejak 2017, telah membantu banyak pengusaha di Bali.</p>
                            </li>
                            <li class="border-b border-gray-200 py-2">
                                <span class="text-xl font-bold">Harga terjangkau</span>
                                <p>Bahan baku berkualitas tinggi dan mengikuti standar internasional.</p>
                            </li>
                            <li class="border-b border-gray-200 py-2">
                                <span class="text-xl font-bold">Proses Mudah</span>
                                <p>Pesan dan kelola pesanan online dengan mudah dan efisien.</p>
                            </li>
                            <li class="border-b border-gray-200 py-2">
                                <span class="text-xl font-bold">Garansi</span>
                                <p>Temukan informasi lengkap tentang produk, layanan, dan panduan pengemasan ekspor.</p>
                            </li>
                            <li class="border-b border-gray-200 py-2">
                                <span class="text-xl font-bold">Layanan cepat dan ramah</span>
                                <p>Dapatkan harga terbaik untuk kebutuhan pengemasan Anda.</p>
                            </li>
                            <li class="py-2">
                                <span class="text-xl font-bold">Layanan Terbaik</span>
                                <p>Tim kami siap membantu Anda memilih solusi pengemasan yang tepat untuk produk Anda.
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @livewire('footer')
    </div>
</x-guest-layout>
