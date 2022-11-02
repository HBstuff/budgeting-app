<x-layout>

<div class="flex">
    <div class="w-1/2 flex justify-center">
        <div class="w-full p-2 m-2 rounded-3xl border border-solid border-gray-300">
            <h2 class="text-center text-3xl text-gray-600 font-light pb-3">STATISTICS</h2>
            <form action="/app/" enctype="multipart/form-data">
                <div class="flex justify-center">
                    <div class="flex border-2 border-gray-200 rounded-md focus-within:ring-2 ring-teal-500">
                        <input 
                            type="date"
                            name="chart-start-date"
                            class="w-full rounded-tl-md rounded-bl-md px-2 py-3 text-sm text-gray-600 focus:outline-none"
                            value="{{request('chart-start-date')}}"
                        />
                    </div>
                    
                    <div class="flex border-2 border-gray-200 rounded-md focus-within:ring-2 ring-teal-500">
                        <input 
                            type="date"
                            name="chart-end-date"
                            class="w-full rounded-tl-md rounded-bl-md px-2 py-3 text-sm text-gray-600 focus:outline-none"
                            value="{{request('chart-end-date')}}"
                        />
                    </div>
                    <div class="px-1">
                        <button class="px-3 py-3 border-2 bg-slate-700 border-slate-500 rounded-md focus-within:ring-2 ring-teal-500" type="submit">
            
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                        </button>
                    </div>
                </div>
                <div>
                    @error('chart-start-date')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror

                    @error('chart-end-date')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                </div>
            </form>


            <div class="flex justify-center">
                @include('partials._chart')
            </div>

        </div>
    </div>

    <div class="w-1/2 flex justify-center">
            <div class="w-full p-2 m-2 rounded-3xl border border-solid border-gray-300">
                    <h2 class="text-center text-3xl text-gray-600 font-light pb-3">LATEST TRANSACTIONS</h2>
                    <table class="w-full text-gray-600 text-sm font-light">
                        <tr class="border-b border-gray-800 bg-white text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 text-center">Amount</th>
                            <th class="py-3 text-center">Date</th>
                            <th class="py-3 text-center">Category</th>
                        </tr>
                    @foreach($latest as $item)

                        <tr class="odd:bg-white even:bg-sky-50 hover:bg-cyan-100">
                            <td class="py-3 px-6 text-center whitespace-nowrap">
                                <span class="font-medium">€ {{$item->amount}}</span>
                            </td>

                            <td class="py-3 px-6 text-center">
                                    <span>{{$item->date}}</span>
                            </td>

                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <span  class="font-medium">{{$item->category}}</span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>

</x-layout>