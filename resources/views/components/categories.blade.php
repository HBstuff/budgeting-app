<x-layout>


<div class="flex justify-center">
<table>
    <thead>
        <tr class="border-b border-gray-800 bg-white text-gray-600 uppercase text-sm leading-normal">
            <th class="py-3 text-center">Cateogry</th>
            <th></th>
        </tr>
    </thead>

    <tbody class="text-gray-600 text-sm font-light">
        @foreach($categories as $category)

        <tr class="odd:bg-white even:bg-sky-50 hover:bg-cyan-100">
            <td class="py-3 px-6 text-center whitespace-nowrap">
                <span class="font-medium">{{$category->category}}</span>
            </td>

            <td class="py-3 text-center">
                <form method="POST" action="/app/transactions/categories/{{$category->id}}">
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
            <form method="POST" action="/app/transactions/categories/store" enctype="multipart/form-data">
            @csrf
    
            <td>
                <div class="flex border-2 border-gray-200 rounded-md focus-within:ring-2 ring-teal-500">
                    <input 
                        type="text"
                        name="category"
                        class="w-full rounded-tl-md rounded-bl-md px-2 py-3 text-sm text-gray-600 focus:outline-none"
                        placeholder="Category"
                        value="{{old('category')}}"
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
    
        <tr>
            <td>
                @error('category')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </td>
        </tr>

    </tbody>
</table>
</div>



</x-layout>




