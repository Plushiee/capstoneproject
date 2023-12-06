@extends('users.master')

@section('title', 'Galeri')
@section('addCSS')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <style>
        #myDropzone {
            border: 2px dashed #0087F7;
            background-color: #fafafa;
            padding: 20px;
            text-align: center;
            cursor: pointer;
        }

        #myDropzone .dz-message {
            margin: 20px;
        }

        .dropzone .dz-preview .dz-image img {
            width: 100%;
        }

        .dropzone .dz-preview .dz-progress {
            opacity: 0;
        }

        .dropzone .dz-preview .dz-remove {
            background-color: #f44455;
            padding: 5px;
            margin: 5px;
            border-radius: 25px;
            color: aliceblue;
            text-decoration: none
        }

        .dropzone .dz-preview .dz-remove:hover {
            scale: 110%;
        }
    </style>
@endsection
@section('contents')
    <div class="p-a white lt box-shadow">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0 _300">@yield('title')</h4>
                {{-- <small class="text-muted">Bootstrap <strong>4</strong> Web App Kit with AngularJS</small> --}}
            </div>

        </div>

    </div>
    <div class="padding">
        <div id="myDropzone" class="dropzone">
            <div class="dz-message" data-dz-message><span>Click or drag and drop files here</span></div>
        </div>
    </div>
@endsection
@section('addJS')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script>
        Dropzone.autoDiscover = false;

        $(document).ready(function() {
            // Initialize Dropzone
            var myDropzone = new Dropzone("#myDropzone", {
                url: "{{ route('uploadGaleri') }}",
                maxFilesize: 2, // Set your desired maximum file size
                acceptedFiles: ".jpg", // Allow only JPG files
                addRemoveLinks: true, // Show remove links on preview
                dictRemoveFile: "Remove file",
                clickable: true, // Enable clicking to select files
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                thumbnailWidth: 10,
                thumbnailHeight: 10
            });

            // Event listener for when a file is successfully uploaded
            myDropzone.on("success", function(file, response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        toast: true,
                        title: 'Perhatian',
                        text: response.message,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    }).then((result) => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        toast: true,
                        title: 'Perhatian',
                        text: response.message,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    }).then((result) => {
                        location.reload();
                    });

                }

            });
            $.ajax({
                url: "{{ route('getGaleri') }}",
                method: 'GET',
                success: function(data) {

                    data.forEach(function(file) {
                        var mockFile = {
                            name: file.name,
                            size: file.size,
                            dataURL: file
                                .path,
                        };


                        myDropzone.emit("addedfile", mockFile);
                        myDropzone.emit("thumbnail", mockFile, file.path);
                    });
                }
            });

            myDropzone.on("removedfile", function(file) {

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'POST',
                            url: "{{ route('hapusGaleri') }}",
                            data: {

                                file_path: file
                                    .name,
                                _token: '{{ csrf_token() }}',

                            },
                            success: function(data) {


                                Swal.fire({
                                    icon: 'success',
                                    toast: true,
                                    title: 'Perhatian',
                                    text: data.message,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                }).then((result) => {
                                    location.reload();
                                });
                            }
                        });
                    } else {

                        myDropzone.emit("addedfile", file);
                    }
                })

                // }
            });


        });
    </script>

@endsection
