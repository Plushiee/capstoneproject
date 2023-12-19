@extends('admins.master')

@if ($tipe === 'baru')
    @section('title', 'Tambah Admin')
@else
    @section('title', 'Edit Admin')
@endif

@section('addCSS')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
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
        <div class="row">
            <div class="col-12 pt-2">
                <div class="card p-5">
                    <form action="{{ route('adminAkunAdminSimpan') }}" method="post">
                        @csrf
                        @if ($tipe === 'baru')
                            <input type="hidden" name="submit" value="baru" required />
                            <div class="form-group">
                                <label for="nama">Nama Admin</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder=""
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder=""
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="nomor">Nomor Telepon</label>
                                <input type="text" class="form-control" id="nomor" name="nomor" placeholder=""
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="super_admin">Super Admin</label>
                                <select class="form-control" id="super_admin" name="super_admin" required>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="passwordRegister">Kata Sandi</label>
                                <input type="password" class="form-control" id="passwordRegister" name="passwordRegister"
                                    placeholder="Kata Sandi" minlength="8" autocomplete="new-password" required>
                            </div>
                            <div class="form-group">
                                <label for="passwordConformation">Ulangi Kata Sandi</label>
                                <input type="password" class="form-control" id="passwordConformation"
                                    name="passwordConformation" placeholder="Ulangi Kata Sandi"minlength="8"
                                    autocomplete="new-conf-password" required>
                            </div>
                            <p class="mb-3 mt-2 d-none" id="sama" style="color: red; font-weight: bold">
                                Password Tidak Sama!</p>
                            <button type="submit" class="btn btn-primary submit" required>Tambah</button>
                        @else
                            <input type="hidden" name="submit" value="update" required />
                            <input type="hidden" name="idPengguna" value="{{ $akunAdmin[0]->id }}" required />
                            <div class="form-group">
                                <label for="nama">Nama Admin</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder=""
                                    value="{{ $akunAdmin[0]->nama }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder=""
                                    value="{{ $akunAdmin[0]->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nomor">Nomor Telepon</label>
                                <input type="text" class="form-control" id="nomor" name="nomor" placeholder=""
                                    value="{{ $akunAdmin[0]->no_telp }}" required>
                            </div>
                            <div class="form-group">
                                <label for="super_admin">Super Admin</label>
                                <select class="form-control" id="super_admin" name="super_admin" required>
                                    @php
                                        $superAdminOptions = [
                                            ['value' => 1, 'label' => 'Ya'],
                                            ['value' => 0, 'label' => 'Tidak']
                                        ];
                                    @endphp

                                    @foreach ($superAdminOptions as $option)
                                        @php
                                            $selected = $option['value'] == $akunAdmin[0]->super_admin ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $option['value'] }}" {{ $selected }}>{{ $option['label'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" required>Update</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @section('addJS')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Chart JS Script Start-->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- Chart JS Script End-->
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

        <script>
            $(document).ready(function() {
                // Validasi
                var $passwordRegister = $('#passwordRegister');
                var $passwordConfirmation = $('#passwordConformation');
                var $daftarButton = $('.submit');
                var $samaText = $('#sama');

                $passwordRegister.on('keyup', checkPasswordMatch);
                $passwordConfirmation.on('keyup', checkPasswordMatch);

                function checkPasswordMatch() {
                    var passwordValue = $passwordRegister.val();
                    var confirmationValue = $passwordConfirmation.val();

                    if (passwordValue === confirmationValue && passwordValue.length >= 8) {
                        $daftarButton.prop('disabled', false);
                        $samaText.addClass('d-none');
                    } else {
                        if (passwordValue === confirmationValue || passwordValue.length < 8) {
                            $samaText.addClass('d-none');
                            $daftarButton.prop('disabled', true);
                        } else {
                            $samaText.removeClass('d-none');
                        }
                    }
                }
                // Custom Selesai
            });
        </script>

    @endsection
