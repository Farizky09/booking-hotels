@extends('components.template')
@section('title', 'homepage')
@section('content')

<div class="max-w-screen-lg mx-auto px-9 mt-20">
    <div class="flex flex-col gap-7 md:flex-row items-center justify-center">
        <div class="md:w-1/3 p-6 rounded-lg border">
            <!-- Tambahkan gambar di sini -->
            <img src="https://ik.imagekit.io/tvlk/generic-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20044885-4ff78c9e600458e64e7be7dce420e848.jpeg?_src=imagekit&tr=c-at_max,f-jpg,h-460,pr-true,q-40,w-724" alt="Luxurious Room" class="w-full h-48 object-cover rounded-t-lg mb-4">
            
            <h2 class="text-lg font-bold mb-2">Standart Room</h2>
            <p class="text-gray-700 mb-4">Custom plans for large organizations</p>
            <p class="text-4xl font-bold mb-4">Rp. 200,000<span class="text-gray-500 text-lg">/night</span></p>
            
            <ul class="text-sm text-gray-700">
                <li>Double Bed</li>
                <li>Air Conditioning</li>
                <li>Shower</li>
            </ul>
            
            <button class="mt-8 py-3 px-6 bg-teal-700 text-white font-bold rounded-full hover:bg-teal-500 focus:outline-none focus:shadow-outline-blue transition duration-200">Booking</button>
        </div>
        
        <div class="md:w-1/3 p-6 rounded-lg border">
            <!-- Tambahkan gambar di sini -->
            <img src="https://ik.imagekit.io/tvlk/generic-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20044885-448205546084da3af05d88ba23f622cd.jpeg?_src=imagekit&tr=c-at_max,f-jpg,h-460,pr-true,q-40,w-724" alt="Luxurious Room" class="w-full h-48 object-cover rounded-t-lg mb-4">
            
            <h2 class="text-lg font-bold mb-2">Deluxe Room</h2>
            <p class="text-gray-700 mb-4">Custom plans for large organizations</p>
            <p class="text-4xl font-bold mb-4">Rp. 280.0000<span class="text-gray-500 text-lg">/night</span></p>
            
            <ul class="text-sm text-gray-700">
                <li>Queen Bed</li>
                <li>Mini Kitchen</li>
                <li>AIr Conditioning</li>
                <li>Shower</li>
            </ul>
            
            <button class="mt-8 py-3 px-6 bg-teal-700 text-white font-bold rounded-full hover:bg-teal-500 focus:outline-none focus:shadow-outline-blue transition duration-200">Booking</button>
        </div>
        
        <div class="md:w-1/3 p-6 rounded-lg border">
            <!-- Tambahkan gambar di sini -->
            <img src="https://ik.imagekit.io/tvlk/generic-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20044885-a87455920207c926c4fd91e184ec6763.jpeg?_src=imagekit&tr=c-at_max,f-jpg,h-460,pr-true,q-40,w-724" alt="Luxurious Room" class="w-full h-48 object-cover rounded-t-lg mb-4">
            
            <h2 class="text-lg font-bold mb-2">Luxurious Room</h2>
            <p class="text-gray-700 mb-4">Custom plans for large organizations</p>
            <p class="text-4xl font-bold mb-4">Rp. 350.000<span class="text-gray-500 text-lg">/night</span></p>
            <ul class="text-sm text-gray-700">
                <li>King Bed</li>
                <li>Mini Kitchen</li>
                <li>Air Conditioning</li>
                <li>Shower</li>
                <li>Include Breakfast</li>
            </ul>
            <button class="mt-8 py-3 px-6 bg-teal-700 text-white font-bold rounded-full hover:bg-teal-500 focus:outline-none focus:shadow-outline-blue transition duration-200">Booking</button>
        </div>
        
    </div>
</div>
@endsection