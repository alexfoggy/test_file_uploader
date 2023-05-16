<!doctype html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet"/>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Uploaded</title>
</head>
<body>
<div class="min-h-screen w-full flex items-center justify-center py-12">
    <div class="px-4 md:px-0 md:w-1/3">
        <div class="file-upload-container">

            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file"
                       class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span>
                        </p>
                    </div>
                    <input id="dropzone-file" type="file" name="file" class="hidden"/>
                    @csrf
                </label>
            </div>

            <div class="action-buttons flex items-center my-4" style="display: none">

                <a href="#" data-action="upload" style="display: none"
                   class="progress-resume-link w-6 h-6 mr-3 rounded-xl flex items-center justify-center bg-green-600">
                    <svg aria-hidden="true" fill="none" stroke="#fff" stroke-width="1.5" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </a>

                <a href="#" data-action="pause" style="display: none"
                   class="progress-pause-link w-6 h-6 mr-3 rounded-xl flex items-center justify-center bg-blue-600">
                    <svg aria-hidden="true" fill="none" stroke="#fff" stroke-width="1.5" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.75 5.25v13.5m-7.5-13.5v13.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </a>

                <a href="#" data-action="cancel"
                   class="progress-cancel-link w-6 h-6 mr-3 rounded-xl flex items-center justify-center bg-red-600">
                    <svg aria-hidden="true" fill="none" stroke="#fff" stroke-width="1.5" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.25 7.5A2.25 2.25 0 017.5 5.25h9a2.25 2.25 0 012.25 2.25v9a2.25 2.25 0 01-2.25 2.25h-9a2.25 2.25 0 01-2.25-2.25v-9z"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </a>

            </div>


            <ul class="resumable-list"></ul>

        </div>
        <div class="mt-12 p-4 border rounded-lg">
            <h2 class="my-2 font-bold text-center"> Uploaded Files</h2>
            @if(!empty($files))
                @foreach($files as $one_file)
                    @if($one_file != '.' || $one_file != '..')
                        <p class="my-1 bg-gray-100 px-2 py-1 rounded">
                            <a href="{{asset('uploads/'.$one_file)}}" target="_blank
                            ">{{$one_file}}</a>
                        </p>
                    @endif
                @endforeach

            @else

                <h3 class="text-center text-gray-500">No files in folder</h3>

            @endif

        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="{{ asset('assets/js/resumable/resumable.js') }}"></script>

<script src="{{ asset('assets/js/script.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>
