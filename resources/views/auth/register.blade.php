<x-layouts.main :hide="true">
    <div class="w-4/5 m-auto mt-14 mb-10">
        <div class="flex flex-row bg-gray-800 text-white rounded-xl mx-auto shadow-lg overflow-hidden">

            <img class=" block w-1/2" src="{{ asset('images/cinema4.jpeg') }}" alt="">

            <div class=" w-1/2 pt-16 px-12">

                <h2 class="text-3xl mb-4 font-bold">Register</h2 >
                <p class="mb-4">Create your account. It’s free and only take a minute</p >

                <form action="{{ route('register.post') }}" method="POST">
                    @csrf
                    <div class="flex gap-x-5">
                        <span class="flex flex-col class= w-1/2">
                            <x-form.large-input
                                name="first_name" type="text" value="{{ old('first_name') }}" placeholder="First Name"
                            />
                            <x-form.input-error name="first_name" />
                        </span >
                        <span class="flex flex-col class= w-1/2">
                            <x-form.large-input
                                name="last_name" type="text" value="{{ old('last_name') }}" placeholder="First Name"
                            />
                            <x-form.input-error name="last_name" />
                        </span >
                    </div >
                    <div class="mt-5">
                        <x-form.large-input
                            name="email" type="email" value="{{ old('email') }}" class="w-full" placeholder="Email"
                        />
                        <x-form.input-error name="email" />
                    </div >
                    <div class="mt-5">
                        <x-form.large-input name="password" type="password" class="w-full" placeholder="Password" />
                        <x-form.input-error name="password" />
                    </div >
                    <div class="mt-5">
                        <x-form.large-input
                            name="password_confirmation" type="password" class="w-full" placeholder="Confirm Password"
                        />
                    </div >

                    <div class="mt-5">
                        <x-main.primary class="w-full">Register</x-main.primary>
                    </div >
                </form >
                <div class=" text-sm mt-14 border-t p-5 border-gray-500 border-opacity-50 flex justify-between items-center container-mr">
                    <p class="mr-3 md:mr-0 text-gray-100 opacity-70">If you already have an account, please log in. </p >
                    <x-main.secondary href="{{ route('login') }}">Login</x-main.secondary >
                </div >
            </div >
        </div >
    </div >
</x-layouts.main >
