<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Discount Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-600 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100"> 
                    <div class="p-5 text-4xl font-semibold text-left bg-gray-50 dark:bg-gray-800 dark:text-white">
                        <h2 class="text-3xl font-extrabold dark:text-white mb-5">Insert a new Discount</h2>
                    <form action="{{route('admin.discount.store')}}" method="POST">
                        @csrf
                        <div class="mt-3">
                            <label for="name" class="block mb-1 text-sm font-medium {{$errors->has('name') ? 'dark:text-red-500' : 'dark:text-white'}}">Discount Name</label>
                            <input type="text" name="name" class="text-sm rounded-lg block w-full p-2.5 {{$errors->has('name') ? 'text-red-900 dark:bg-red-100 dark:border-red-400 placeholder-red-700' : 'dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'}}" placeholder="Example: Diskon Lebaran Sale" value="{{old('name')}}" required>
                            @if ($errors->has('name'))
                                <p class="text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$errors->first('name')}}!</p>
                            @endif
                        </div>
                        <div class="mt-3">
                            <label for="code" class="block mb-1 text-sm font-medium {{$errors->has('code') ? 'dark:text-red-500' : 'dark:text-white'}}">Discount Code</label>
                            <input type="text" name="code" class="text-sm rounded-lg block w-full p-2.5 {{$errors->has('code') ? 'text-red-900 dark:bg-red-100 dark:border-red-400 placeholder-red-700' : 'dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'}}" placeholder="Example: PROMO | Max: 5 words" value="{{old('code')}}" required>
                        </div>
                        @if ($errors->has('code'))
                                <p class="text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$errors->first('code')}}!</p>
                            @endif
                        <div class="mt-3">
                            <label for="description" class="block mb-1 text-sm font-medium {{$errors->has('description') ? 'dark:text-red-500' : 'dark:text-white'}}">Description</label>
                            <textarea name="description" rows="2" class="block p-2.5 w-full text-sm rounded-lg border {{$errors->has('description') ? 'text-red-900 dark:bg-red-100 dark:border-red-400 placeholder-red-700' : 'dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'}}" placeholder="Example: Diskon untuk menyambut bulan suci Ramadhan">{{old('description')}}</textarea>
                        </div>
                        @if ($errors->has('description'))
                            <p class="text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$errors->first('description')}}!</p>
                        @endif
                        <div class="mt-3">
                            <label for="percentage" class="block mb-1 text-sm font-medium {{$errors->has('percentage') ? 'dark:text-red-500' : 'dark:text-white'}}">Percentage</label>
                            <input type="number" name="percentage" class="text-sm rounded-lg block w-full p-2.5 {{$errors->has('percentage') ? 'text-red-900 dark:bg-red-100 dark:border-red-400 placeholder-red-700' : 'dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'}}" placeholder="Example: 10 | Min: 1 | Max: 100" value="{{old('percentage')}}" min="1" max="100" required>
                        </div>
                        @if ($errors->has('percentage'))
                            <p class="text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$errors->first('percentage')}}!</p>
                        @endif
                        <button type="submit" class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
