<html>

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" href="{{asset('images/favicon.ico')}}"/>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>LaraGigs | Find Laravel Jobs & Projects</title>
</head>

<body>


@include('partials._search')
<x-layout>
    <main>
        <a href="/" class="inline-block text-black ml-4 mb-4"
        ><i class="fa-solid fa-arrow-left"></i> Back
        </a>
        <div class="mx-4">
            <x-card class="p-10">
                <div
                    class="flex flex-col items-center justify-center text-center"
                >
                    <img
                        class="w-48 mr-6 mb-6"
                        src="{{$listing->logo ? asset('storage/'. $listing->logo) : asset('images/no-image.png')}}"
                        alt=""
                    />

                    <h3 class="text-2xl mb-2">{{$listing->title}}</h3>
                    <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
                    <x-listing-tags :tagsCsv="$listing->tags"/>
                    <div class="text-lg my-4">
                        <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                    </div>
                    <div class="border border-gray-200 w-full mb-6"></div>
                    <div>
                        <h3 class="text-3xl font-bold mb-4">
                            Job Description
                        </h3>
                        <div class="text-lg space-y-6">
                            {{$listing->description}}

                            <a
                                href="mailto:{{$listing->email}}"
                                class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-envelope"></i>
                                Contact Employer</a
                            >

                            <a
                                href="{{$listing->website}}"
                                target="_blank"
                                class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-globe"></i> Visit
                                Website</a
                            >
                        </div>
                    </div>
                </div>
            </x-card>
        </div>
    </main>
    <x-card class="mt-4 p-2 flex space-x-6">
        <a href="/listings/{{$listing->id}}/edit">

            <i class="fa-solid fa-pencil"></i> Edit
        </a>

    </x-card>

</x-layout>

{{--<footer--}}
{{--    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"--}}
{{-->--}}
{{--    <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>--}}

{{--    <a--}}
{{--        href="create.html"--}}
{{--        class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"--}}
{{--    >Post Job</a--}}
{{--    >--}}
{{--</footer>--}}

</body>
</html>
