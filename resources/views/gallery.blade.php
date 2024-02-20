<x-guest-layout>
    <div class="flex flex-col min-h-screen">
        @livewire('navbar')
        <div class="flex-grow">

            <div class="text-xl">
                <h1 class="text-center text-4xl font-bold mt-10">Galeri</h1>
            </div>
            <div class="flex justify-center mt-5 carousel carousel-center rounded-box">
                <div class="carousel-item">
                    <img src="{{ asset('landing-page/tv.jpg') }}" alt="Drink" class="object-cover w-72 h-96" />
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('landing-page/iron.jpg') }}" alt="Drink" class="object-cover w-72 h-96" />
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('landing-page/ricecooker.jpg') }}" alt="Drink"
                        class="object-cover w-72 h-96" />
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('landing-page/radio.jpg') }}" alt="Drink" class="object-cover w-72 h-96" />
                </div>
            </div>
        </div>
        @livewire('footer')
    </div>
</x-guest-layout>
