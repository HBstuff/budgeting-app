<div class="m-5 p-5 rounded-3xl pl-8 pt-7 py-3 bg-gradient-to-r from-indigo-400 via-indigo-300 to-indigo-100">

    <div class="relative h-20 flex-wrap">
        <p class="text-bold text-2xl text-white"><b>WELCOME, {{strtoupper(auth()->user()->name)}}</b></p>
        <p class="text-bold text-white">
            <b>Track your expenses, see statistics and follow up on the latest news!</b>

            <button class="absolute right-0 bg-white rounded-lg">
                <a href="/app/transactions">
                    <div class="flex text-center px-3 m-1.5 mb-2 text-indigo-400">
                        <p class="text-semibold"><b>START BUDGETING</b></p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="translate-y-1 bi bi-chevron-double-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                            <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </div>
                </a>
            </button>
        </p>
    </div>
</div>

{{-- left-1/2 transform -translate-x-1/2 --}}