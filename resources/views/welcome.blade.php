@extends('layouts.app')

@section('content')
    <div class="min-h-full flex">
        <div class="flex-1 flex flex-col justify-start py-2 px-4 sm:px-8 lg:px-12 xl:px-18">
            <div class="mx-auto w-full">
                <livewire:project-wizard />
            </div>
        </div>
        <div class="hidden lg:block relative w-0 flex-1">
            <img class="absolute inset-0 h-full w-full object-cover" src="https://images.unsplash.com/photo-1505904267569-f02eaeb45a4c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1908&q=80" alt="">
        </div>
    </div>
    {{--<div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
        <div class="flex items-center justify-center">
            <div class="flex flex-col justify-around w-5/6">
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <livewire:project-wizard />
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
@endsection



