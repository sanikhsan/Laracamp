<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List Discount Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-600 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100"> 
                @include('components.admin-alert-success')
                  {{-- Start Table --}}
                  <div class="relative overflow-x-auto shadow-md">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <caption class="p-5 text-4xl font-semibold text-left bg-gray-50 dark:bg-gray-800 dark:text-white">
                            Discount Menu
                            <a href="{{route('admin.discount.create')}}" type="button" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center float-right">Add new Discount</a>
                        </caption>
                        
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Discount Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Discount Code
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Percentage
                                </th>
                                <th scope="col" class="px-6 py-3 text-center" colspan="2">
                                    Action
                                </th>
                                {{-- <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ( $discounts as $discount )
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$discount->name}}
                                    </th>
                                    <td class="px-6 py-4">
                                        <span class="text-sm font-medium mr-2 px-3.5 py-2.5 rounded dark:bg-blue-900 dark:text-blue-300">{{$discount->code}}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$discount->description}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$discount->percentage}}%
                                    </td>
                                    <td class="px-1 py-3">
                                        <a href="{{route('admin.discount.edit', $discount->id)}}"
                                            class="text-white block w-full bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-200 font-medium rounded-lg text-sm px-4 py-2 text-center dark:focus:ring-yellow-900">
                                            Edit
                                        </a>
                                    </td>
                                    <td class="pl-1 pr-3 py-3">
                                        <form action="{{route('admin.discount.destroy', $discount->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                class="text-white block w-full bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-200 font-medium rounded-lg text-sm px-2 py-2 text-center dark:focus:ring-red-900">
                                                    Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td colspan="6" class="text-2xl text-center p-5">There is no Discount Created.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                  </div>
                  {{-- End Table --}}
            </div>
        </div>
    </div>
</x-app-layout>
