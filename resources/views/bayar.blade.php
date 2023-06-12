<!doctype html>
<html>

<head>
    @include('includes.head')
</head>

<body class="leading-normal tracking-normal"
    style="font-family: 'Source Sans Pro', sans-serif; background-color: #0077B6;">
    <div class="">
        <div id="main" class="row">
            <div>
                <form action="{{ route('register.store') }}" method="POST"
                    class="flex flex-col items-center justify-center py-4">
                    @csrf
                    <div class="w-3/4">


                        <div class="w-5/6 sm:w-1/2 p-6">
                            <h3 class="text-5xl text-white font-bold leading-none mb-3">
                                Pembayaran
                            </h3>
                        </div>


                        {{-- @error('status')
                            <div class="text-red-500 text-center p-2 rounded">
                                {{ $message }}
                            </div>
                        @enderror --}}


                        {{-- Nama Bank, Detail Tiket, Foto atau Bukti Pembayaran, dll belum disesuain --}}

                        <x-input id="bank_id" label="Nama Bank" type="text" name="bank_id" :value="old('bank_id')"
                            required autofocus placeholder="Nama Bank" class="block mt-1 w-full text-white" />

                        <x-input id="last_name" label="Detail Tiket" type="text" name="last_name" :value="old('last_name')"
                            required autofocus placeholder="Nama Belakang" class="block mt-1 w-full " />

                        <x-input id="phone_number" label="Foto atau Bukti Pembayaran" type="text" name="phone_number"
                            :value="old('phone_number')" required autofocus placeholder="Your Phone Number"
                            class="block mt-1 w-full " />

                        <x-button class="mt-5 w-full" color="blue" label="Kirim" type="submit" />
                    </div>

            </div>
            </form>
        </div>
    </div>
    </div>
</body>

</html>
