@extends('users.master')

@section('title', 'Galeri')

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
        <form action="api/dropzone" class="dropzone white">
            <div class="dz-message" ui-jp="dropzone" ui-options="{ url: 'api/dropzone' }">
                <h4 class="m-t-lg m-b-md">Drop files here or click to upload.</h4>
                <span class="text-muted block m-b-lg">(This is just a demo dropzone. Selected files are <strong>not</strong>
                    actually uploaded.)</span>
            </div>
        </form>
    </div>
@endsection
