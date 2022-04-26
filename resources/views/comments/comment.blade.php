@extends('home')

@section('contents')

@if ($message = Session::get('success'))
<div class="bg-red-500 p-4">
    <strong class="text-white text-3xl pl-4">{{ $message }}</strong>
</div>
@endif

<div class="my-3">
    <div class="text-center">
        <h1 class="text-5xl">
            Comment
        </h1>
    </div>
    <div>

        <div class="flex justify-center pt-3">
            <form action="{{ route('send') }}" method="POST">
                @csrf
                <div class="block">
                    <div>
                        <label for="name" class="text-lg">Name</label>
                        <input type="text" class="block shadow-5xl p-2 my-3 w-full" id="name" name="name"
                            placeholder="Full Name" value="{{old('name')}}">
                    </div>

                    <div>
                        <label for="email" class="text-lg">Email</label>
                        <input type="text" class="block shadow-5xl p-2 my-3 w-full" id="email" name="email"
                            placeholder="Email" value="{{old('email')}}">
                    </div>

                    <div>
                        <label for="feedback" class="text-lg">Feedback</label>
                        <textarea id="feedback" name="feedback" class="block shadow-5xl p-2 my-3 w-full" rows="4"
                            cols="50" placeholder="Leave Your Message Here" value="{{old('feedback')}}"></textarea>
                    </div>

                    {{-- <div style="position: absolute; left: 100%;"> --}}
                        <div>
                            <select name="service_id" id="service_id" class="block shadow-5xl  w-full">
                                @foreach ($services as $id => $service)
                                <option value="{{ $id }}">{{ $service }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-2 w-full">
                            <button type="submit" class="bg-green-800 text-white font-bold p-2 mt-5">
                                Submit
                            </button>
                            <a href="{{url()->previous()}}"
                                class="bg-gray-800 text-white font-bold p-2 mt-5 text-center" role="button">Go Back</a>
                        </div>
                    </div>
            </form>
        </div>

        @endsection