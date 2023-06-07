@extends('layouts.app')

@section('content')
    {{-- Hero --}}
    <section class="pt-24 event-background">
        <div class="layout px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center h-[calc(100vh-6rem)]">
            <!--Left Col-->
            <div class="flex flex-col w-full justify-center items-start text-center md:text-left">
                <h1 class="my-4 text-5xl font-bold leading-tight" style="font-family: Titania;">
                    TiKo
                </h1>
                <h2 class="leading-normal text-2xl mb-8">
                    Temukan Artis Favoritmu & Event Konser Saat Ini Juga!
                </h2>
                <div class="w-1/2 flex ">
                    <input type="text" placeholder="Cari Event"
                        class="w-full px-3 py-2 mr-2 text-sm text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500" />
                    <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Cari
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Artis --}}
    <section class="bg-white border-b py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12">
            <h2 class="w-full my-2 text-3xl font-bold leading-tight text-center text-gray-800">
                Artis
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="flex flex-grow">
                <x-artis />
                <x-artis />
                <x-artis />
            </div>
    </section>

    {{-- Event --}}
    <section class="bg-white border-b py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12">
            <h2 class="w-full my-2 text-3xl font-bold leading-tight text-center text-gray-800">
                Event
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="flex flex-grow">
                <x-event />
                <x-event />
                <x-event />
            </div>
    </section>
@endsection
