<section id="client" class="pt-36 pb-32 bg-slate-700 dark:bg-slate-300">
    <div class="container">
        <div class="w-full px-4">
            <div class="mx-auto text-center mb-16">
                <h4 class="font-bold text-lg uppercase text-primary">Client</h4>
                <h2 class="font-bold text-white text-3xl mb-2 sm:text-4xl lg:text-5xl dark:text-dark">Yang Pernah
                    Bekerja Sama</h2>
                <p class="font-medium text-md text-slate-400">Berikut adalah Client Yang terlah bekerja sama dengan saya
                </p>
            </div>
        </div>
        <div class="w-full px-4">
            <div class="flex flex-wrap items-center justify-center">
                @forelse ($client as $c)
                    <a href="#"
                        class="max-w-[120px] mx-4 py-4 grayscale opacity-60 transition hover:grayscale-0 hover:opacity-100 duration-500 lg:mx-6 xl:mx-8">
                        <img src="{{ asset('storage/client/' . $c->image) }}" alt="google">
                    </a>

                @empty
                    <h4>Data belum diisi</h4>
                @endforelse
            </div>
        </div>
    </div>
</section>
