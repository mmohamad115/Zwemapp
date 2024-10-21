<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/db1f6bf93f.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
 
<body class="overflow-x-hidden bg-gray-100">
    @include('headerLoggedIn')
    <div class="flex">
        @include('aside')
        <div class="min-h-screen w-full py-6 flex flex-col justify-center sm:py-8">
            <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                    <div class="max-w-md mx-auto">
                        <div class="flex items-center space-x-5">
                            <div
                                class="h-14 w-14 bg-cyan-400 rounded-full flex flex-shrink-0 justify-center items-center text-cyan-600 text-2xl font-mono">
                                i</div>
                            <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                                <h2 class="leading-relaxed">Geef feedback</h2>
                                <p class="text-sm text-gray-500 font-normal leading-relaxed">hier kan je een feedback
                                    geven,
                                    vul alle velden in.</p>
                            </div>
                        </div>
                        <form action="{{ route('feedback.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="leerling_id" value={{ $leerling_id }}>
                            <input type="hidden" name="zwem_docent_id   " value={{ $zwemdocent->zwem_docent_id }}>
                            
                            <!-- Display all validation errors -->
                            @if ($errors->any())
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    <strong class="font-bold">Whoops!</strong>
                                    <span class="block sm:inline">There were some problems with your input.</span>
                                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="divide-y divide-gray-200">
                                <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                    <div class="flex flex-col">
                                        <label for="content" class="leading-loose">Feedback</label>
                                        <textarea name="content" required
                                            class="px-4 py-2 border h-32 resize-none focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                            placeholder="Beschrijving"></textarea>
                                    </div>
                                    @error('content')
                                        <div class="bg-red-600 rounded-lg p-3">{{ $message }}</div>
                                    @enderror
                                    <div class="flex flex-col">
                                        <label for="leerling_id">Leerling</label>
                                        <select name="leerling_id"
                                            class="px-4 py-2 border resize-none focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                            id="leerling_id" class="form-control" required>
                                            <option value="">
                                                Selecteer een leerling</option>
                                            @foreach ($leerlingen as $leerling)
                                                <option value="{{ $leerling->leerling_id }}">{{ $leerling->voornaam }}
                                                    {{ $leerling->achternaam }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('leerling_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="pt-4 flex items-center space-x-4">
                                    <button type="submit"
                                        class="bg-cyan-400 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Maak
                                        aan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
 
</html>
