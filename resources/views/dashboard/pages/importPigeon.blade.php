@extends('layouts.dashboard')
<!-- BEGIN: Navbar-->
@section('navbar')
    @include('layouts.navbar')
@endsection
<!-- END: Navbar-->
@section('content')

    @push('head')
        <style>
            input[type="file"] {
                display: none;
            }

            .custom-file-upload {
                border: 1px solid #ccc;
                border-radius: 0.358rem;
                display: inline-block;
                padding: 9px 12px;
                cursor: pointer;
            }

        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <script>
            var insertLinke = "{{ route('membre.insert_data') }}";
            var deleteLinke = "{{ route('membre.delete_data') }}";
            var updateLinke = "{{ route('membre.update_data') }}";
            var importLinke = "{{ route('file-import') }}";
            var members = @json($members);
            var analiseData = "{{ route('analise_data') }}";
            // alert(members);
        </script>

        {{-- <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> --}}
        <script defer src="{{ asset('js/dashboard/import.js') }}"></script>
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}

    @endpush
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        {{-- ex using component x-component_name --}}
        {{-- @if (Session::has('success'))
            <x-success>
                {{ session()->get('success') }}
            </x-success>
        @endif
        @if (Session::has('error'))
            <x-error>
                {{ session()->get('error') }}
            </x-error>
        @endif --}}

        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{ route('file.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div
                                class="relative h-40 rounded-lg border-dashed border-2 border-gray-200 bg-white flex justify-center items-center hover:cursor-pointer">
                                <div class="absolute">
                                    <div class="flex flex-col items-center "> <i
                                            class="fa fa-cloud-upload fa-3x text-gray-200"></i>
                                        <span class="block text-gray-400 font-normal">Attach
                                            you files </span> <span class="block text-gray-400 font-normal">or</span>
                                        <span class="block text-blue-400 font-normal">Browse
                                            files</span>
                                    </div>
                                </div>
                                <input type="file" class="h-full w-full opacity-0" name="file">
                            </div>
                    </div>
                    <div class="mt-3 text-center pb-3">
                        <button type="submit"
                            class="w-full h-12 text-lg w-32 bg-blue-600 rounded text-white hover:bg-blue-700">
                            Save
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

<!-- BEGIN: Footer-->

@section('footer')
    @include('layouts.footer')
@endsection
