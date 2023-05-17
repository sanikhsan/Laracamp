<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-600 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100"> 
                @include('components.admin-alert-success')
                  {{-- Start Table --}}
                  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <caption class="p-5 text-4xl font-semibold text-left bg-gray-50 dark:bg-gray-800 dark:text-white">
                            My Camps
                        </caption>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    User's Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Camp
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Register Data
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status Transaction
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                  Payment
                                </th>
                                {{-- <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($checkouts as $checkout)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$checkout->User->name}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$checkout->Camp->title}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$checkout->Camp->price}}K
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$checkout->created_at->format('M d Y')}}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($checkout->payment_status == "paid")
                                            <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-300 border border-green-300">Success</span>
                                        @else
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">Waiting</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($checkout->payment_status == "paid")
                                            <button class="text-white block w-full bg-green-600 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:focus:ring-green-900 disabled:opacity-75" disabled>Paid</button>
                                        @else
                                            <button class="text-white block w-full bg-yellow-600 focus:ring-4 focus:ring-yellow-200 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:focus:ring-yellow-900" disabled>Waiting for Payment</button>
                                            {{-- <form action="{{route('checkout.update', $checkout->id)}}" method="post">
                                                @csrf
                                                <button type="submit" class="text-white block w-full bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:focus:ring-blue-900">Set to Paid</button>
                                            </form> --}}
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td colspan="6" class="text-2xl text-center p-5">No Camps Registered</td>
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
