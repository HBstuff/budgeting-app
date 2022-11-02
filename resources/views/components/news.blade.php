<?php 
    $temp = $crypto->json();
    $tempArray = [$temp[312], $temp[314], $temp[413], $temp[423], $temp[445], $temp[428]];    
?>

<x-layout>

<div class="mb-10">
    <h2 class="text-center text-3xl text-gray-600 font-light pb-3">LAST CLOSE PRICE</h2>
    <div class="flex">
    @foreach($tempArray as $crypto)

        <div class="w-1/2 flex justify-center">
            <div class="w-full p-2 m-2 rounded-3xl border border-solid border-gray-300 bg-indigo-300">
                <table class="w-full">
                    <tr>
                        <td class="py-3 px-6">
                            <h2 class="text-center text-3xl text-white font-bold pb-3">{{explode("TUSD",$crypto['symbol'])[0]}}
                            {{'$' . number_format((float) $crypto['prevClosePrice'], 2, '.', '')}}</h2>
                        </td>
                    </tr> 
                </table>
            </div>
        </div>

    @endforeach
    </div>
</div>

<div class="flex">

    <div class="w-1/2 flex justify-center">
        <div class="w-full p-2 m-2 rounded-3xl border border-solid border-gray-300">
            <h2 class="text-center text-3xl text-gray-600 font-light pb-3">LATEST NEWS</h2>
            <table class="w-full text-gray-600 text-sm font-light">
                @foreach($news['latest-news']->object()->news as $item)
                    <tr class="odd:bg-white even:bg-sky-50 hover:bg-cyan-100">
                        <td class="py-3 px-6">
                            <a class="font-bold" href="{{$item->link}}"><h3>{{$item->title}}</h3></a>
                        </td>
                        <td>
                            {{$item->publisher}} {{date('Y/m/d H:i:s', $item->providerPublishTime)}}
                        </td>
                    </tr>  
                @endforeach
            </table>
        </div>
    </div>

    <div class="w-1/2 flex justify-center">
        <div class="w-full p-2 m-2 rounded-3xl border border-solid border-gray-300">
            <h2 class="text-center text-3xl text-gray-600 font-light pb-3">FINANCIAL NEWS</h2>
            <table class="w-full text-gray-600 text-sm font-light">
                @foreach($news['financial-news']->object()->news as $item)
                    <tr class="odd:bg-white even:bg-sky-50 hover:bg-cyan-100">
                        <td class="py-3 px-6">
                            <a class="font-bold" href="{{$item->link}}"><h3>{{$item->title}}</h3></a>
                        </td>
                        <td>
                            {{$item->publisher}} {{date('Y/m/d H:i:s', $item->providerPublishTime)}}
                        </td>
                    </tr>  
                @endforeach
            </table>
        </div>
    </div>

</div>

</x-layout>
