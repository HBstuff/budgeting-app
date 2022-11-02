<x-layout>


<form action="/app/transactions" id="filter-form">
    <div class="flex space-x-0.5">
        <div class="flex border-2 border-gray-200 rounded-md focus-within:ring-2 ring-teal-500">
            <input 
                type="number"
                step="0.01"
                name="filter-amount1"
                class="w-full rounded-tl-md rounded-bl-md px-2 py-3 text-sm text-gray-600 focus:outline-none"
                placeholder="Amount from"
                value="{{request('filter-amount1')}}"
            />
        </div>
        <div class="flex border-2 border-gray-200 rounded-md focus-within:ring-2 ring-teal-500">
            <input 
                type="number"
                step="0.01"
                name="filter-amount2"
                class="w-full rounded-tl-md rounded-bl-md px-2 py-3 text-sm text-gray-600 focus:outline-none"
                placeholder="Amount to"
                value="{{request('filter-amount2')}}"
            />
        </div>
        <div class="flex border-2 border-gray-200 rounded-md focus-within:ring-2 ring-teal-500">
            <input 
                type="date"
                name="filter-date1"
                class="w-full rounded-tl-md rounded-bl-md px-2 py-3 text-sm text-gray-600 focus:outline-none"
                value="{{request('filter-date1')}}"
            />
        </div>
        <div class="flex border-2 border-gray-200 rounded-md focus-within:ring-2 ring-teal-500">
            <input 
                type="date"
                name="filter-date2"
                class="w-full rounded-tl-md rounded-bl-md px-2 py-3 text-sm text-gray-600 focus:outline-none"
                value="{{request('filter-date2')}}"
            />
        </div>
        <div class="flex border-2 border-gray-200 rounded-md focus-within:ring-2 ring-teal-500">
            <input 
                type="text"
                name="filter-category"
                class="w-full rounded-tl-md rounded-bl-md px-2 py-3 text-sm text-gray-600 focus:outline-none"
                placeholder="Category"
                value="{{request('filter-category')}}"
            />
        </div>
        <div class="flex border-2 border-gray-200 rounded-md focus-within:ring-2 ring-teal-500">
            <input 
                type="text"
                name="filter-description"
                class="w-full rounded-tl-md rounded-bl-md px-2 py-3 text-sm text-gray-600 focus:outline-none"
                placeholder="Description"
                value="{{request('filter-description')}}"
            />
        </div>
        <div class="px-3">
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
</form>

<div class="w-full lg:w-5/6 py-5">
    <div>
        <table class="min-w-max w-full table-auto">
            <thead>
                <tr class="border-b border-gray-800 bg-white text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 text-center">Amount</th>
                    <th class="py-3 text-center">Date</th>
                    <th class="py-3 text-center">Category</th>
                    <th class="py-3 text-center">Description</th>
                    <th></th>
                </tr>
            </thead>

            <tbody class="text-gray-600 text-sm font-light">
                @foreach($transactions as $transaction)

                <tr class="odd:bg-white even:bg-sky-50 hover:bg-cyan-100">
                    <td class="py-3 px-6 text-center whitespace-nowrap">
                        <span class="font-medium">€ {{$transaction->amount}}</span>
                    </td>

                    <td class="py-3 px-6 text-center">
                            <span>{{$transaction->date}}</span>
                    </td>

                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center justify-center">
                            <span  class="font-medium">{{$transaction->category}}</span>
                        </div>
                    </td>


                    <td class="py-3 px-6 text-center">
                        {{$transaction->description}}
                    </td>


                    <td class="py-3 text-center">
                        <form method="POST" action="/app/transactions/{{$transaction->id}}">
                        @csrf
                        @method('DELETE')
                            <div class="flex item-center justify-center">
                                <button type="submit">
                                    <div class="w-4 transform hover:text-red-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </div>
                                </button>
                            </div>
                        </form>
                    </td>
                </tr>

                @endforeach

                <tr>
                    <form method="POST" action="/app/transactions/store" enctype="multipart/form-data">
                    @csrf
                    <td>
                        <div class="flex border-2 border-gray-200 rounded-md focus-within:ring-2 ring-teal-500">
                            <input 
                                type="number"
                                step="0.01"
                                name="amount"
                                class="w-full rounded-tl-md rounded-bl-md px-2 py-3 text-sm text-gray-600 focus:outline-none"
                                placeholder="Amount:"
                                value="{{old('amount')}}"
                            />
                        </div>
                    </td>
            
                    <td>
                        <div class="flex border-2 border-gray-200 rounded-md focus-within:ring-2 ring-teal-500">
                            <input 
                                type="date"
                                name="date"
                                class="w-full rounded-tl-md rounded-bl-md px-2 py-3 text-sm text-gray-600 focus:outline-none"
                                placeholder="From:"
                                value="{{old('date')}}"
                            />
                        </div>
                    </td>
            
                    <td>
                        <select class="flex border-2 border-gray-200 rounded-md focus-within:ring-2 ring-teal-500
                        w-full rounded-tl-md rounded-bl-md px-2 py-3 text-sm text-gray-600" name="category">
            
                            @foreach($categories as $category)
                                <option value="{{$category->category}}">{{$category->category}}</option>
                            @endforeach
                                <option value="Other">Other</option>
                        </select>
                    </td>
            
                    <td>
                        <div class="flex border-2 border-gray-200 rounded-md focus-within:ring-2 ring-teal-500">
                            <input 
                                type="text"
                                name="description"
                                class="w-full rounded-tl-md rounded-bl-md px-2 py-3 text-sm text-gray-600 focus:outline-none"
                                placeholder="Description:"
                                value="{{old('description')}}"
                            />
                        </div>
                    </td>
            
                    <td class="flex item-center justify-center">
                        <button class="px-3 py-3 border-2 bg-slate-700 border-slate-500 rounded-md focus-within:ring-2 ring-teal-500" type="submit">
                            <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </button>
                    </td>
            
                    </form>
                </tr class="flex">
            
                <tr>
                    <td>
                    @error('amount')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                    </td>
                    <td>
                    @error('date')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                    </td>
                    <td>
                    @error('category')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                    </td>
                    <td>
                    @error('description')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>






{{$transactions->links()}}

</x-layout>