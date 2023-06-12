<!doctype html>
<html>

<head>
    @include('includes.head')
</head>

<body class="leading-normal tracking-normal" style="font-family: 'Source Sans Pro', sans-serif;">
    <div class="pt-24 header-keranjang">
        {{-- <div class="layout px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center h-screen ">
        </div> --}}
    </div>
    <div class="">
        <div id="main" class="row">
            <div>
                <form action="{{ route('register.store') }}" method="POST"
                    class="flex flex-col items-center justify-center py-4">
                    @csrf
                    <div class="w-3/4">
                        {{-- @error('status')
                            <div class="text-red-500 text-center p-2 rounded">
                                {{ $message }}
                            </div>
                        @enderror --}}

                        <div class="w-5/6 sm:w-1/2 p-6">
                            <h3 class="text-3xl text-white font-bold leading-none mb-3">
                                Tiket
                            </h3>
                        </div>




                        {{-- Belum di Buat LIST TIKET untuk ditampilin di Keranjnag --}}



                        <div style="display: flex; justify-content: space-between;">
                            {{-- tombol kembali belum di styling --}}
                            <a href="/form" class="mt-5 underline text-blue-500">Kembali</a>
                            <x-button class="mt-5" color="blue" label="Bayar" type="submit" href="/pembayaran" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
