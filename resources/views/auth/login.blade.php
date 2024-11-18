<x-layouts.main :hide="true">

    <section class=" min-h-screen bg-gray-900 flex box-border justify-center items-center">
        <div class="bg-gray-800 rounded-2xl flex max-w-7xl  items-center">
            <div class="w-1/2 p-11">
                <h2 class="font-bold text-3xl text-white">Login</h2 >
                <p class="text-sm mt-4 text-white">If you already a member, easily log in now.</p >

                <form action="{{ route('login.post') }}" method="POST" class="flex flex-col gap-4 text-black">
                    @csrf
                    <span >
                    <input
                        class="p-3 mt-8 w-full bg-gray-300 placeholder-gray-700 rounded-xl border focus:outline-none focus:ring-4 focus:ring-cyan-900 "
                        type="email"
                        name="email"
                        placeholder="Email"
                        value="{{ old('email') }}"
                    >
                <x-form.input-error name="email" />
                </span >

                    <span >
                    <input
                        class="p-3 bg-gray-300 placeholder-gray-700 rounded-xl border w-full focus:outline-none focus:ring-4 focus:ring-cyan-900 "
                        autocomplete="off"
                        type="password"
                        name="password"
                        placeholder="Password"
                    >
                   <x-form.input-error name="password" />
               </span >

                    <div >
                        <label
                            for="hr" class="flex flex-row items-center gap-2.5 text-white cursor-pointer"
                        >
                            <input id="hr" type="checkbox" name="remember_me" class="peer hidden" />
                            <div
                                for="hr"
                                class="h-5 w-5 flex rounded-md border border-[#a2a1a833] bg-gray-700 peer-checked:bg-[#7152f3] transition"
                            >
                                <svg
                                    fill="none" viewBox="0 0 24 24" class="w-5 h-5 stroke-gray-700"
                                >
                                    <path
                                        d="M4 12.6111L8.92308 17.5L20 6.5"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    ></path >
                                </svg >
                            </div >
                            Remember Me
                        </label >
                    </div >

                    <x-main.primary >Login</x-main.primary >
                </form >

                <a class="inline-block mt-5 cursor-pointer text-white text-sm">Forget password?</a >

                <a
                    href="{{ url()->previous() }}"
                    class=" w-fit flex gap-x-1.5 items-center -mb-10 mt-10 rounded-md hover:bg-gray-700 py-2 px-4 transition-all duration-500 group"
                >
                    <div class="transition-transform duration-200 ease-in-out group-hover:-translate-x-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 text-gray-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 6l-6 6 6 6"
                            />
                        </svg >
                    </div >
                </a >

                <div class="mt-14 text-sm border-t p-5 border-gray-500 border-opacity-50 flex justify-between items-center container-mr">
                    <p class="mr-3 md:mr-0 text-gray-100 opacity-70">If you don't have an account..</p >
                    <x-main.secondary href="{{ route('register') }}">Register</x-main.secondary >
                </div >
            </div >
            <div class="w-1/2">
                <img class=" min-h-full rounded-r-2xl" src="{{ asset('images/cinema3.jpeg') }}" alt="login form image">
            </div >
        </div >
    </section >

</x-layouts.main >
