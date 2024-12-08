@extends('components.template')
@section('title', 'homepage')
@section('content')

<div class="relative min-h-screen bg-cover bg-top flex flex-col items-center justify-center" style="background-image: url(https://images.pexels.com/photos/3201763/pexels-photo-3201763.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);">
    <h1 class="text-7xl text-top font-bold mb-10 text-white">Book your room now</h1>
    <div class="bg-white bg-opacity-90 p-8 rounded-lg shadow-lg w-full max-w-[550px]">
        <form>
            <!-- First and Last Name -->
            <div class="-mx-3 flex flex-wrap">
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="fName" class="mb-3 block text-base font-medium text-[#07074D]">
                            First Name
                        </label>
                        <input type="text" name="fName" id="fName" placeholder="First Name"
                            class="w-full rounded-md border border-[#e0e0e0] py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="lName" class="mb-3 block text-base font-medium text-[#07074D]">
                            Last Name
                        </label>
                        <input type="text" name="lName" id="lName" placeholder="Last Name"
                            class="w-full rounded-md border border-[#e0e0e0] py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
            </div>

            <!-- Number of Guests -->
            <div class="mb-5">
                <label for="guest" class="mb-3 block text-base font-medium text-[#07074D]">
                    How many guests are you bringing?
                </label>
                <input type="number" name="guest" id="guest" placeholder="5" min="0"
                    class="w-full rounded-md border border-[#e0e0e0] py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>

            <div class="mb-5">
                <label for="guest" class="mb-3 block text-base font-medium text-[#07074D]">
                    How many rooms do you want to book?
                </label>
                <input type="number" name="room" id="room" placeholder="5" min="0"
                    class="w-full rounded-md border border-[#e0e0e0] py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>

            <!-- Date and Time -->
            <div class="-mx-3 flex flex-wrap">
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="checkin" class="mb-3 block text-base font-medium text-[#07074D]">
                            Check In
                        </label>
                        <input type="date" name="checkin" id="checkin"
                            class="w-full rounded-md border border-[#e0e0e0] py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="checkout" class="mb-3 block text-base font-medium text-[#07074D]">
                            Check Out
                        </label>
                        <input type="date" name="checkout" id="checkout"
                            class="w-full rounded-md border border-[#e0e0e0] py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button
                class="w-full rounded-md bg-teal-700 py-3 px-8 text-center text-base font-semibold text-white hover:bg-[#554ad5] outline-none mt-6">
                Search
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
