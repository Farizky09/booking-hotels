@extends('components.template')
@section('title', 'welcomepage')
@section('content')

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <section class="relative bg-cover bg-center h-screen" style="background-image: url(https://images.pexels.com/photos/3201763/pexels-photo-3201763.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);">
        <div class="absolute inset-0 bg-black opacity-70"></div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-white">
            <h1 class="text-5xl font-bold mb-4">Welcome to Develine Hotel</h1>
            <p class="text-xl mb-8">Experience luxury and comfort like never before.</p>
            <a href="/login" class="bg-teal-700 px-6 py-3 rounded-full text-white hover:bg-teal-900">Book Now</a>
        </div>
    </section>
    
    <!-- Rooms Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-8 text-gray-800">Our Rooms</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Room Card -->
                
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/447357319.jpg?k=910a068901eab1d1b31d1463fc04d2ede1633730ceab34ac4cadc96107c06e06&o=">
                        <h3 class="text-2xl font-semibold mb-2">Standard Room</h3>
                        <p class="text-gray-600 mb-4">Enjoy a luxurious stay in our standart rooms.</p>
                        
                    </div>
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/447357319.jpg?k=910a068901eab1d1b31d1463fc04d2ede1633730ceab34ac4cadc96107c06e06&o=">
                        <h3 class="text-2xl font-semibold mb-2">Deluxe Room</h3>
                        <p class="text-gray-600 mb-4">Enjoy a luxurious stay in our deluxe rooms.</p>
                    </div>
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/447357319.jpg?k=910a068901eab1d1b31d1463fc04d2ede1633730ceab34ac4cadc96107c06e06&o=">
                        <h3 class="text-2xl font-semibold mb-2">Luxurious Room</h3>
                        <p class="text-gray-600 mb-4">Enjoy a special and luxurious stay in our luxurious rooms.</p>
                    </div>
                
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="bg-teal-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Develine Resort. All Rights Reserved.</p>
        </div>
    </footer>
    
</body>
</html>


@endsection