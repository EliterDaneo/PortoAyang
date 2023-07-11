<section id="portofolio" class="pt-36 pb-16 bg-slate-100 dark:bg-slate-800">
    <div class="container">
        <div class="flex flex-wrap">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 class="font-bold text-lg uppercase text-primary mb-2">Portofolio</h4>
                    <h2 class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl dark:text-white">Project
                        terbaru</h2>
                    <p class="font-medium text-md text-secondary md:text-lg dark:text-white">Berikut adalah beberapa
                        portofolio yang sudah saya buat</p>
                </div>
            </div>
        </div>

        <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
            @forelse ($portofolio as $porto)
                <div class="mb-12 p-4 md:w-1/2">
                    <div class="rounded-md shadow-md overflow-hidden">
                        <img src="{{ asset('/storage/portofolio/' . $porto->image) }}" alt="Landing page"
                            width="w.w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3 dark:text-white">{!! $porto->judul !!}
                    </h3>
                    <p class="font-medium text-base text-secondary dark:text-white">{{ $porto->isi }}</p>
                </div>
            @empty
                <h4>data masih Kosong!!</h4>
            @endforelse
        </div>
    </div>
</section>
