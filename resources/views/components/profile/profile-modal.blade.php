@props(['user'])
<div x-data="profileModal()" x-init="init">
    <!-- Trigger for opening the modal -->
    <li class="px-4 py-2 rounded hover:bg-gray-200 cursor-pointer" @click="open()">
        Profile
    </li>

    <!-- Backdrop -->
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
    ></div>

    <!-- Modal -->
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
        <!-- Modal Header -->
        <div class="w-full mt-2 flex justify-between items-center p-4 bg-transparent">
            <div></div>
            <h2 class="text-xl text-center font-semibold">Profile</h2>
            <button @click="close()" class="text-black hover:text-gray-800">
                &#10005;
            </button>
        </div>

        <div class="w-full p-5 rounded-lg m-auto overflow-y-auto">
            <template x-if="success">
                <span class="text-sm text-green-700" x-text="success"></span>
            </template>

            <form id="profile_form" @submit.prevent="updateProfile" enctype="multipart/form-data">
                <div class="flex mb-6">
                    <!-- First Name -->
                    <div class="w-1/2 pr-2">
                        <label for="first-name" class="block text-sm font-medium text-gray-800">First Name</label>
                        <input
                            type="text"
                            id="first-name"
                            value="{{ old('first_name', auth()->user()->first_name) }}"
                            name="first_name"
                            class="mt-2 block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-200 ease-in-out transform focus:-translate-y-1 focus:scale-102"
                        >
                        <template x-if="errors.first_name">
                            <span class="text-red-500 text-sm" x-text="errors.first_name[0]"></span>
                        </template>
                    </div>

                    <!-- Last Name -->
                    <div class="w-1/2 pl-2">
                        <label for="last-name" class="block text-sm font-medium text-gray-800">Last Name</label>
                        <input
                            type="text"
                            id="last-name"
                            value="{{ old('last_name', auth()->user()->last_name) }}"
                            name="last_name"
                            class="mt-2 block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-200 ease-in-out transform focus:-translate-y-1 focus:scale-102"
                        >
                        <template x-if="errors.last_name">
                            <span class="text-red-500 text-sm" x-text="errors.last_name[0]"></span>
                        </template>
                    </div>
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-800">Email</label>
                    <input
                        type="email"
                        id="email"
                        value="{{ old('email', auth()->user()->email) }}"
                        name="email"
                        class="mt-2 block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-200 ease-in-out transform focus:-translate-y-1 focus:scale-102"
                    >
                    <template x-if="errors.email">
                        <span class="text-red-500 text-sm" x-text="errors.email[0]"></span>
                    </template>
                </div>

                <div class="mb-6">
                    <label for="current-password" class="block text-sm font-medium text-gray-800">Current Password</label>
                    <input
                        type="password"
                        id="current-password"
                        name="current_password"
                        class="mt-2 block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-200 ease-in-out transform focus:-translate-y-1 focus:scale-102"
                    >
                    <template x-if="errors.current_password">
                        <span class="text-red-500 text-sm" x-text="errors.current_password[0]"></span>
                    </template>
                </div>

                <div class="mb-6">
                    <label for="new-password" class="block text-sm font-medium text-gray-800">New Password</label>
                    <input
                        type="password"
                        id="new-password"
                        name="new_password"
                        class="mt-2 block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-200 ease-in-out transform focus:-translate-y-1 focus:scale-102"
                    >
                    <template x-if="errors.new_password">
                        <span class="text-red-500 text-sm" x-text="errors.new_password[0]"></span>
                    </template>
                </div>

                <div class="mb-6">
                    <label for="confirm-password" class="block text-sm font-medium text-gray-800">Confirm New Password</label>
                    <input
                        type="password"
                        id="confirm-password"
                        name="new_password_confirmation"
                        class="mt-2 block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-200 ease-in-out transform focus:-translate-y-1 focus:scale-102"
                    >
                    <template x-if="errors.new_password_confirmation">
                        <span class="text-red-500 text-sm" x-text="errors.new_password_confirmation[0]"></span>
                    </template>
                </div>

                <div class="mb-6">
                    <label for="profile-image" class="block text-sm font-medium text-gray-800">Profile Image</label>
                    <input
                        type="file"
                        id="profile-image"
                        name="profile_image"
                        class="mt-2 p-2 cursor-pointer block w-full bg-white border border-gray-300 rounded-lg shadow-lg focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-200 ease-in-out transform focus:-translate-y-1 focus:scale-102"
                    >
                    <template x-if="errors.profile_image">
                        <span class="text-red-500 text-sm mt-2" x-text="errors.profile_image[0]"></span>
                    </template>
                </div>

                <div class="flex justify-between">
                    <span></span>
                    <button type="submit" class="w-1/3 px-4 py-2 bg-blue-500 text-white rounded">Update Profile</button>
                    <span></span>
                </div>
            </form>
        </div>
    </div>
</div>
