@extends('users.master')

@section('title', 'Ucapan')

@section('addCSS')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">

@endsection
@section('contents')
    <div class="p-a white lt box-shadow">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0 _300">@yield('title')</h4>
            </div>
        </div>
    </div>
    <div class="padding">
        <div class="box">
            <div class="table table-responsive container">

                <table id="salamTable" class="" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No</th>
                            <th>Nama Tamu</th>
                            <th>Isi Salam</th>

                        </tr>
                    </thead>

                    <tfoot style="width: 10px">
                        <tr>
                            <td colspan="4">

                                <input type="checkbox" id="centangSemua"> <i class="p-2 fa fa-long-arrow-left">
                                </i>Pilih Semua


                                <button id="deleteSelected" class="md-btn md-raised mx-2" title="Hapus data yang dipilih">
                                    <i class="material-icons text-danger">delete</i>
                                </button>

                            </td>
                        </tr>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('addJS')
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#salamTable').DataTable({

                'processing': true,

                ajax: {
                    url: "{{ route('getUcapan') }}",
                    dataSrc: 'salamData',
                },

                'columns': [{
                        'data': null,
                        'render': function() {
                            return '<input type="checkbox" class="centangSalam" name="idSalam[]">'
                        }
                    },
                    {
                        'data': null,
                        'render': function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        'data': 'nama_tamu',
                    },
                    {

                        'data': 'isi_salam',
                    },

                ],
                'columnDefs': [{

                    'targets': 0,
                    'width': '30px',
                }, {

                    'targets': 1,
                    'width': '10%',
                }, {
                    'targets': 2,
                    'width': '30%',
                }, ],


            });




        });
    </script>
@endsection
