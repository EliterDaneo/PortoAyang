@foreach ($profile as $p)
    <section id="home" class="pt-36">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full self-center px-4 lg:w-1/2">
                    <h1 class="text-base font-semibold text-primary md:text-xl lg:text-2xl">
                        Hello Semua 👋, Nama Saya
                        <span class="block font-bold text-dark text-4xl mt-1 ">{{ $p->nama }}</span>
                    </h1>
                    <h2 class="font-medium text-slate-500 text-lg mb-5 lg:text-2xl">
                        Saya Seorang Mahasiswa
                        <span class="text-dark ">{{ $p->jurusan }}</span>
                    </h2>
                    <p class="font-medium text-secondary mb-10 leading-relaxed ">
                        {!! $p->tentang_saya !!}
                    </p><br>

                    <a href="#"
                        class="text-base font-semibold text-white bg-primary py-3 px-8 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">Hubungi
                        Saya!</a>
                </div>
                <div class="w-full self-end px-4 lg:w-1/2">
                    <div class="relative mt-10 lg:right-0 lg:mt-9">
                        <img src="{{ asset('storage/profile/' . $p->image) }}" alt="Sri Hayati Rahayu"
                            class="max-w-full mx-auto relative z-10" />
                        <span class="absolute -bottom-0 left-1/2 -translate-x-1/2 md:scale-125">
                            <svg width="400" height="400" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#5f7adb"
                                    d="M39,-28.6C50.2,-17,58.7,-0.8,56,13.3C53.2,27.5,39.1,39.7,23.6,45.9C8.2,52.1,-8.6,52.4,-24,46.3C-39.4,40.3,-53.5,27.8,-58.9,11.3C-64.4,-5.2,-61.2,-25.7,-50,-37.3C-38.7,-48.9,-19.4,-51.5,-2.7,-49.3C13.9,-47.1,27.7,-40.1,39,-28.6Z"
                                    transform="translate(100 100) scale(1.1)" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endforeach
