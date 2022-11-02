<x-layout>

    <form method="POST" action="/app/users/authenticate">
    @csrf
    <div class="bg-grey-lighter min-h-screen flex flex-col">
        <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
            <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                <h1 class="mb-8 text-3xl text-center">Log in</h1>      

                @error('email')
                    <p class="text-red-500 text-xs">{{$message}}</p>
                @enderror
                <input 
                    type="email"
                    class="block border border-grey-light w-full p-3 rounded mb-4"
                    name="email"
                    placeholder="Email"
                    value="{{old('email')}}" />

                @error('password')
                    <p class="text-red-500 text-xs">{{$message}}</p>
                @enderror
                <input 
                    type="password"
                    class="block border border-grey-light w-full p-3 rounded mb-4"
                    name="password"
                    placeholder="Password" />

                <button
                    type="submit"
                    class="w-full text-center py-3 rounded bg-green-400 text-white hover:bg-green-300 focus:outline-none my-1"
                >Sign In</button>

            </div>

            <div class="text-grey-dark mt-6">
                Don't have an account?
                <a class="no-underline border-b border-blue text-blue" href="/app/register">
                    Sign up
                </a>
            </div>

        </div>
    </div>
</form>

</x-layout>