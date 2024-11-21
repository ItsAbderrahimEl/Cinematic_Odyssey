@props(['user'])
<div x-data="profileModal()">
    {{-- Trigger --}}
    <li class="px-4 py-2 rounded hover:bg-gray-200 cursor-pointer" @click="open()">
        Profile
    </li >

    {{-- Backdrop --}}
    <div
        x-show="isModalOpen"
        style="display: none"
        class="fixed inset-0 backdrop-blur-sm z-40"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    ></div >

    {{-- Modal --}}
    <div
        x-show="isModalOpen"
        style="display: none"
        id="profile-modal"
        class="w-1/2 h-5/6 shadow-md fixed inset-0 m-auto flex items-center justify-center flex-col bg-gray-400 z-50 rounded-xl"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        {{-- Modal Header --}}
        <div class="w-full mt-2 flex justify-between items-center p-4 bg-transparent">
            <div ></div >
            <h2 class="text-xl text-center font-semibold ">Profile</h2 >
            <button @click="close()" class="text-black hover:text-gray-800">
                &#10005;
            </button >
        </div >

        <div class="w-full p-5 rounded-lg m-auto overflow-y-auto">
            @if($success)
                <span class="text-md text-green-900 font-semibold">
                {{ $success }}
                </span >
            @endif
            <form wire:submit.prevent="submit()" enctype="multipart/form-data">
                <div class="flex mb-6">
                    <div class="w-1/2 pr-2">
                        <label for="first_name" class="block text-sm font-medium text-gray-800">First Name</label >
                        <input
                            type="text"
                            id="first_name"
                            wire:model.live="first_name"
                            class="mt-2 block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-200 ease-in-out transform focus:-translate-y-1 focus:scale-102"
                        >
                        <x-form.input-error class="text-red-700 font-semibold -translate-y-7" name="first_name" />
                    </div >

                    <div class="w-1/2 pl-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-800">Last Name</label >
                        <input
                            type="text"
                            id="last_name"
                            wire:model.live="last_name"
                            class="mt-2 block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-200 ease-in-out transform focus:-translate-y-1 focus:scale-102"
                        >
                        <x-form.input-error class="text-red-700 font-semibold -translate-y-7" name="last_name" />
                    </div >
                </div >

                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-800">Email</label >
                    <input
                        type="email"
                        id="email"
                        wire:model.live="email"
                        class="mt-2 block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-200 ease-in-out transform focus:-translate-y-1 focus:scale-102"
                    >
                    <x-form.input-error class="text-red-700 font-semibold -translate-y-7" name="email" />
                </div >

                <div class="mb-4">
                    <label
                        for="current_password" class="block text-sm font-medium text-gray-800"
                    >Current Password</label >
                    <input
                        type="password"
                        id="current_password"
                        wire:model.live="current_password"
                        class="mt-2 block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-200 ease-in-out transform focus:-translate-y-1 focus:scale-102"
                    >
                    <x-form.input-error class="text-red-700 font-semibold -translate-y-7" name="current_password" />
                </div >

                <div class="mb-4">
                    <label for="new_password" class="block text-sm font-medium text-gray-800">New Password</label >
                    <input
                        type="password"
                        id="new_password"
                        wire:model.live="new_password"
                        class="mt-2 block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-200 ease-in-out transform focus:-translate-y-1 focus:scale-102"
                    >
                    <x-form.input-error class="text-red-700 font-semibold -translate-y-7" name="new_password" />
                </div >

                <div class="mb-4">
                    <label
                        for="new_password_confirmation" class="block text-sm font-medium text-gray-800"
                    >Confirm New Password</label >
                    <input
                        id="new_password_confirmation"
                        type="password"
                        wire:model.live="new_password_confirmation"
                        class="mt-2 block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-200 ease-in-out transform focus:-translate-y-1 focus:scale-102"
                    >
                    <x-form.input-error
                        class="text-red-700 font-semibold -translate-y-7" name="new_password_confirmation"
                    />
                </div >

                <div class="mb-4">
                    <label for="profile-image" class="block text-sm font-medium text-gray-800">Profile Image</label >
                    <input
                        type="file"
                        id="profile-image"
                        wire:model.live="profile_photo"
                        class="mt-2 p-2 cursor-pointer block w-full bg-white border border-gray-300 rounded-lg shadow-lg focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-200 ease-in-out transform focus:-translate-y-1 focus:scale-102"
                    >
                    <x-form.input-error class="text-red-700 font-semibold -translate-y-7" name="profile_photo" />
                </div >

                <div class="flex justify-between">
                    <span ></span >
                    <button
                        type="submit" class="w-1/3 px-4 py-2 bg-blue-500 text-white rounded"
                    >Update Profile
                    </button >
                    <span ></span >
                </div >
            </form >
        </div >
    </div >
</div >

