@extends('users.master')

@section('title', 'Orders')

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
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="box p-a">
                    <div class="pull-left m-r">
                        <span class="w-48 rounded  accent">
                            <i class="material-icons">&#xe151;</i>
                        </span>
                    </div>
                    <div class="clear">
                        <h4 class="m-0 text-lg _300"><a href>125 <span class="text-sm">Emails</span></a></h4>
                        <small class="text-muted">6 new arrivals.</small>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-4">
                <div class="box p-a">
                    <div class="pull-left m-r">
                        <span class="w-48 rounded primary">
                            <i class="material-icons">&#xe54f;</i>
                        </span>
                    </div>
                    <div class="clear">
                        <h4 class="m-0 text-lg _300"><a href>40 <span class="text-sm">Projects</span></a></h4>
                        <small class="text-muted">38 open.</small>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-4">
                <div class="box p-a">
                    <div class="pull-left m-r">
                        <span class="w-48 rounded warn">
                            <i class="material-icons">&#xe8d3;</i>
                        </span>
                    </div>
                    <div class="clear">
                        <h4 class="m-0 text-lg _300"><a href>600 <span class="text-sm">Users</span></a></h4>
                        <small class="text-muted">632 vips.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
