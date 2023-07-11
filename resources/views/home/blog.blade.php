<section id="blog" class="pt-36 pb-32 bg-slate-100">
    <div class="container">
        <div class="w-full pg-4">
            <div class="max-w-xl mx-auto text-center mb-16">
                <h4 class="font-bold text-lg uppercase text-primary mb-2">Blog</h4>
                <h2 class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl">Blog terbaru
                </h2>
                <p class="font-medium text-md text-secondary md:text-lg">Berikut adalah beberapa tulisan terbaru yang
                    saya buat.</p>
            </div>
        </div>

        <div class="flex flex-wrap">
            @forelse ($blog as $b)
                <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-10 dark:bg-slate-800">
                        <img src="{{ asset('storage/blog/' . $b->image) }}" alt="programming" class="w-full">
                        <div class="py-8 px-6">
                            <h3>
                                <a href="#"
                                    class="block mb-3 font-semibold text-xl text-dark hover:text-primary truncate dark:text-white">{{ $b->judul }}
                            </h3></a>
                            <p class="font-medium text-secondary text-base mb-4 dark:text-white">{{ $b->isi }}</p>
                            <a href="#"
                                class="font-medium text-sm text-white bg-primary py-3 px-4 rounded-lg hover:opacity-80">Baca
                                Selengkapnya..</a>
                        </div>
                    </div>
                </div>
            @empty
                <h4>Data Masih Kosong</h4>
            @endforelse
        </div>
    </div>
</section>
