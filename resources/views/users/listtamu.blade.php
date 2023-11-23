@extends('users.master')

@section('title', 'List Tamu')

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
        <div class="box">
            <div class="box-body d-flex  justify-content-between">
                <div class="">


                    Search: <input id="filter" type="text" class="form-control input-sm w-auto inline m-r " />
                </div>
                <div class="">
                    <a class="btn btn-fw primary" style="color:#fff">Tambah
                        Tamu</a>
                </div>
            </div>
            <div>
                <table class="table m-b-none" ui-jp="footable" data-filter="#filter" data-page-size="5">
                    <thead class="thead-light">
                        <tr>
                            <th></th>
                            <th>Nama Tamu</th>
                            <th>No Whatsapp</th>
                            <th>Domain Undangan</th>
                            <th>Tgl Kirim Undangan</th>
                            <th>Status Undangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Isidra</td>
                            <td><a href>Boudreaux</a></td>
                            <td>Traffic Court Referee</td>
                            <td data-value="78025368997">22 Jun 1972</td>
                            <td data-value="1"><span class="label success" title="Active">Active</span></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Shona</td>
                            <td>Woldt</td>
                            <td><a href>Airline Transport Pilot</a></td>
                            <td data-value="370961043292">3 Oct 1981</td>
                            <td data-value="2"><span class="label" title="Disabled">Disabled</span></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Granville</td>
                            <td>Leonardo</td>
                            <td>Business Services Sales Representative</td>
                            <td data-value="-22133780420">19 Apr 1969</td>
                            <td data-value="3"><span class="label warning" title="Suspended">Suspended</span>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Easer</td>
                            <td>Dragoo</td>
                            <td>Drywall Stripper</td>
                            <td data-value="250833505574">13 Dec 1977</td>
                            <td data-value="1"><span class="label success" title="Active">Active</span></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Maple</td>
                            <td>Halladay</td>
                            <td>Aviation Tactical Readiness Officer</td>
                            <td data-value="694116650726">30 Dec 1991</td>
                            <td data-value="3"><span class="label warning" title="Suspended">Suspended</span>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Maxine</td>
                            <td><a href>Woldt</a></td>
                            <td><a href>Business Services Sales Representative</a></td>
                            <td data-value="561440464855">17 Oct 1987</td>
                            <td data-value="2"><span class="label" title="Disabled">Disabled</span></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Lorraine</td>
                            <td>Mcgaughy</td>
                            <td>Hemodialysis Technician</td>
                            <td data-value="437400551390">11 Nov 1983</td>
                            <td data-value="2"><span class="label" title="Disabled">Disabled</span></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Lizzee</td>
                            <td><a href>Goodlow</a></td>
                            <td>Technical Services Librarian</td>
                            <td data-value="-257733999319">1 Nov 1961</td>
                            <td data-value="3"><span class="label warning" title="Suspended">Suspended</span>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Judi</td>
                            <td>labeltt</td>
                            <td>Electrical Lineworker</td>
                            <td data-value="362134712000">23 Jun 1981</td>
                            <td data-value="1"><span class="label success" title="Active">Active</span></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Lauri</td>
                            <td>Hyland</td>
                            <td>Blackjack Supervisor</td>
                            <td data-value="500874333932">15 Nov 1985</td>
                            <td data-value="3"><span class="label warning" title="Suspended">Suspended</span>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot class="hide-if-no-paging">
                        <tr>
                            <td colspan="5" class="text-center">
                                <ul class="pagination"></ul>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>


@endsection
