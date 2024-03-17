<x-guest-layout>
    <div class="flex flex-col min-h-screen">
        @livewire('navbar')
        <div class="flex-grow">

            <div class="text-xl">
                <h1 class="text-center text-4xl font-bold mt-10">Reviews</h1>
            </div>
            <div class="flex flex-col justify-center mt-5 rounded-box mx-10">
                @foreach ($review as $item)
                    <div class="card card-side bg-slate-300 shadow-xl w-full mb-4">
                        <div class="card-body">
                            <h2 class="card-title">{{ $item->user->name }}</h2>
                            <p>{{ $item->comment }}</p>
                            <div class="card-actions justify-between">
                                <div class="rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <input type="radio" name="rating-{{ $item->id }}"
                                            class="mask mask-star-2 bg-orange-400"
                                            {{ $i <= $item->rating ? 'checked' : '' }} disabled />
                                    @endfor
                                </div>
                                <p class="text-end">{{ $item->created_at }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @livewire('footer')
    </div>
</x-guest-layout>
