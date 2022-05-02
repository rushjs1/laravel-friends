@if(session()->has('success'))

    <div x-data="{show: true}"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
    class="text-center font-bold p-4 bg-green-400 text-white top-3 right-5 rounded-lg fixed">
        <p>
            {{ session()->get('success') }}
        </p>
    </div>

@endif

@if(session()->has('error'))
<div x-data="{show: true}"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
    class="text-center font-bold p-4 bg-rose-500 text-white top-3 right-5 rounded-lg fixed">
        <p>
            {{ session()->get('error') }}
        </p>
    </div>
@endif