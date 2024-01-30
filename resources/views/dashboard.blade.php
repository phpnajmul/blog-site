<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("This is a Dashboard here...") }}
                </div>
                <div class="p-6 text-gray-900 {{ (Auth::user()->user_type == 1) ? "hidden" : '' }}">
                    <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" href="{{ route('register-tenancy.create') }}">Tenancy Register</a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
