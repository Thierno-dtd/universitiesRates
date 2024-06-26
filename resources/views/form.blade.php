<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<style>
    .-z-1 {
        z-index: -1;
    }

    .origin-0 {
        transform-origin: 0%;
    }

    input:focus ~ label,
    input:not(:placeholder-shown) ~ label,
    textarea:focus ~ label,
    textarea:not(:placeholder-shown) ~ label,
    select:focus ~ label,
    select:not([value='']):valid ~ label {
        /* @apply transform; scale-75; -translate-y-6; */
        --tw-translate-x: 0;
        --tw-translate-y: 0;
        --tw-rotate: 0;
        --tw-skew-x: 0;
        --tw-skew-y: 0;
        transform: translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate))
        skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        --tw-scale-x: 0.75;
        --tw-scale-y: 0.75;
        --tw-translate-y: -1.5rem;
    }

    input:focus ~ label,
    select:focus ~ label {
        /* @apply text-black; left-0; */
        --tw-text-opacity: 1;
        color: rgba(0, 0, 0, var(--tw-text-opacity));
        left: 0px;
    }
</style>

<div class="min-h-screen bg-gray-100 p-0 sm:p-12">
    <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
        <h1 class="text-2xl font-bold mb-8">Form With Floating Labels</h1>
        <form id="form" novalidate
              method="POST"
              action="" {{route('avis')}}

        >
            @csrf

            <div class="relative z-0 w-full mb-5">
                <input
                    type="text"
                    name="name"
                    placeholder=" "
                    required
                    value="{{ $university->name ?? '' }}"
                    class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                />
                <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Enter name</label>
                <span class="text-sm text-red-600 hidden" id="error">Name is required</span>
            </div>






            <div class="relative z-0 w-full mb-5">
                <select
                    name="selectid"
                    value=""
                    onclick="this.setAttribute('value', this.value);"
                    class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                >
                    @foreach($criteeres as $criterion)
                        <option value="{{ $criterion->id }}">{{ $criterion->name }}</option>
                    @endforeach
                </select>
                <label for="select" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Select an option</label>
                <span class="text-sm text-red-600 hidden" id="error">Option has to be selected</span>
            </div>





            <button
                id="button"
                type="submit"
                class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-pink-500 hover:bg-pink-600 hover:shadow-lg focus:outline-none"
            >
                soumettre
            </button>


        </form>
    </div>
</div>

<script>
    'use strict'

    document.getElementById('button').addEventListener('click', toggleError)
    const errMessages = document.querySelectorAll('#error')

    function toggleError() {
        // Show error message
        errMessages.forEach((el) => {
            el.classList.toggle('hidden')
        })

        // Highlight input and label with red
        const allBorders = document.querySelectorAll('.border-gray-200')
        const allTexts = document.querySelectorAll('.text-gray-500')
        allBorders.forEach((el) => {
            el.classList.toggle('border-red-600')
        })
        allTexts.forEach((el) => {
            el.classList.toggle('text-red-600')
        })
    }


</script>

</body>
</html>
