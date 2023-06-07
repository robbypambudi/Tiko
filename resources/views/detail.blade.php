@extends('layouts.app')

@section('content')
    <section class="pt-10 event-artis">
        <div class="layout px-3 mx-auto max-w-screen-lg">
            <div class="flex flex-wrap flex-col md:flex-row items-center h-[calc(100vh-6rem)]">
                <!--Left Col-->
                <div class="flex flex-col w-full justify-center items-start text-center md:text-left">
                    <!-- Konten di sini -->
                </div>
            </div>
        </div>
    </section>

    {{-- <div class="w-full font-bold text-xl text-gray-800 px-6">
                    Mahalini
                </div>
                <p class="text-gray-800 text-base px-6 mb-5">
                    lokasi
                    <br />
                    tanggal
                    <br />
                    waktu
                    <br />
                    tiket
                </p> --}}
    {{-- </a> --}}
    </div>
    <p class="text-gray-800 text-base px-6 mb-5" style="display: flex; align-items: center;">
        <img src="{{ asset('images/detail/location.png') }}" style="margin-right: 5px;" />Jakarta, Indonesia
        <img src="{{ asset('images/detail/date.png') }}" style="margin-right: 5px;" />28 Mei 2023
        <img src="{{ asset('images/detail/time.png') }}" style="margin-right: 5px;" />16.00 - 21.00
        <img src="{{ asset('images/detail/ticket.png') }}" style="margin-right: 5px;" />30 Ticket
    </p>

    <div class="flex flex-wrap">
        <div class="w-1/4">
            <div class="bg-red-500 text-white h-26 flex">
                <p>
                    <img src="{{ asset('images/detail/location.png') }}" style="margin-right: 5px;" />Jakarta, Indonesia
                </p>
            </div>
        </div>
        <div class="w-1/4">
            <div class="bg-blue-500 text-white h-26 flex">
                <p>
                    <img src="{{ asset('images/detail/date.png') }}" style="margin-right: 5px;" />28 Mei 2023
                </p>
            </div>
        </div>
        <div class="w-1/4">
            <div class="bg-yellow-500 text-white h-26 flex">
                <p>
                    <img src="{{ asset('images/detail/time.png') }}" style="margin-right: 5px;" />16.00 - 21.00
                </p>
            </div>
        </div>
        <div class="w-1/4">
            <div class="bg-green-500 text-white h-26 flex">
                <p>
                    <img src="{{ asset('images/detail/ticket.png') }}" style="margin-right: 5px;" />30 Ticket
                </p>
            </div>
        </div>
    </div>

    {{-- <h3 class="text-x1 text-gray-800 font-bold leading-none mb-3">
            <span class="mr-2"><img src="{{ asset('images/detail/location.png') }}" />lokasi</span>
            <span class="mr-2"><img src="{{ asset('images/detail/date.png') }}" />tanggal</span>
            <span class="mr-2"><img src="{{ asset('images/detail/time.png') }}" />waktu</span>
            <span class="mr-2"><img src="{{ asset('images/detail/ticket.png') }}" />tiket</span>
        </h3> --}}
    </div>
    <div class="container mx-auto flex flex-wrap pt-4 pb-0">
        <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
            Mahalini
        </h3>
    </div>
    <div class="container mx-auto flex flex-wrap pt-4 pb-12">
        <h3 class="text-2xl text-gray-800 leading-none mb-3">
            Tentang Event
        </h3>
        <p class="text-gray-600 mb-8">
            Schematics adalah acara konser musik yang diadakan oleh departemen teknik informatika. Konser ini mengundang
            artis terkenal Indonesia untuk tampil di panggung. Penonton akan menikmati penampilan live yang mengagumkan
            dari artis-artis tersebut, sambil merasakan semangat dan kegembiraan dalam musik. Schematics menjadi wadah
            bagi para pecinta musik dan penggemar artis untuk berkumpul dan menikmati pengalaman musik yang tak
            terlupakan.
            <br />
            <br />
        </p>
        <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
            Timeline Event
        </h3>
        <p class="text-gray-600 mb-8">
            <br />
            <br />
        </p>
    </div>
    <div class="container mx-auto flex flex-wrap pt-4 pb-12">
        <p class="text-gray-600 mb-8">
            Penukaran Tiket & Open Gate
            <br />
            12.00 - 12.30
            <br />
            Tukar tiketmu dengan gelang ke panitia
            <br />
            <br />
        </p>
        <br />
        <p class="text-gray-600 mb-8">
            Penukaran Tiket & Open Gate
            <br />
            12.00 - 12.30
            <br />
            Tukar tiketmu dengan gelang ke panitia
            <br />
            <br />
        </p>
    </div>
    <div class="flex items-center justify-center">
        <button
            class="w-[95%] mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            Masukkan Keranjang
        </button>


    </div>
@endsection
