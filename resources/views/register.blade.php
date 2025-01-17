<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arsip-Kegiatan</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('/css/style.css') }}"> --}}

</head>

<body>
    <div class="container py-5">
        <div class="w-75 center border rounded px-3 py-3 mx-auto">
            <!-- FORM REGIS -->
            <div class="container">
                <form action="/register" method="POST" class="form-register">
                    @csrf
                    <div class="row justify-content-center">
                        <center><img class="mb-4 center" src="../img/logokominfo.png" alt="" width="120"
                                height="120"></center>
                        <center><img class="mb-4 center" src="../img/logoKotaBatu.jpg" alt="" width="100"
                                height="120"></center>
                    </div>
                    <h3 class="text-center"> <strong>Registrasi Akun Anda</strong> </h3>
                    <br>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror " name="nama"
                            required placeholder="nama lengkap" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="mb-3">
                                <label for="username" class="form-label">NIP</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    name="username" required placeholder="nip" value="{{ old('username') }}">
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="level" class="form-label">Pilih Levelmu</label>
                                <div class="form-check">
                                    <input class="form-check-input" name="level" type="radio" value="user"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        User
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="level" type="radio" value="admin"
                                        id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Admin
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="level" type="radio" value="pejabat"
                                        id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Pejabat
                                    </label>
                                </div>
                                @error('level')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="bagian" class="form-label">Bagian</label>
                            <select name="bagian" id="bagian" class="form-control"
                                aria-placeholder="Pilih bagian">
                                <option value="">Pilih Bagian</option>
                                <option value="1">Kepala Dinas</option>
                                <option value="2">Sekretariat</option>
                                <option value="3">Bidang Pengelolaan Informasi Publik</option>
                                <option value="4">Bidang Data dan Statistik</option>
                                <option value="5">Bidang Aplikasi Informatika dan Persandian</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="subbagian" class="form-label">Sub Bagian</label>
                            <select name="subbagian.dropdown" id="subbagian" class="form-control" 
                                aria-placeholder="Pilih Sub Bagian">
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <select name="id_jabatan" id="jabatan" class="form-control"
                                aria-placeholder="Pilih Jabatan">
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="kepegawaian">Status Kepegawaian</label>
                            <select name="kepegawaian" id="kepegawaian" class="form-control">
                                <option value="">Pilih Status Kepegawaian</option>
                                <option value="pns">PNS</option>
                                <option value="non-pns">Non PNS</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 ">
                                <label for="nohp" class="form-label">No WhatsApp</label>
                                <input type="text" value="{{ old('no_hp') }}" name="no_hp"
                                    placeholder="+628xxxxxxx"
                                    class="form-control @error('no_hp') is-invalid @enderror" required>
                                @error('no_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 ">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" value="{{ old('email') }}" name="email"
                                    placeholder="contoh@gmail.com"
                                    class="form-control @error('email') is-invalid @enderror" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required="" placeholder="password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    

                    <br>
                    
                    <div class="row mt-5">
                        <div class="col-md-6 ">
                            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                        </div>
                        <div class="col-md-6">
                            <button type="reset" class="btn btn-danger btn-block">Reset</button>
                        </div>
                    </div>

                    <small class="d-block text-center mt-3">Sudah punya akun? <a href="/login">Login Aja!</a></small>

                </form>
            </div>
            <!-- FORM REGIS -->

        </div>
    </div>



    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script>
        //on document ready jquery
        $(document).ready(function() {
            // send ajax request to get the program of the selected bagian and append to the select tag       
            function onChangeSubbagianSelect(url, id_bagian, nama_bagian) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id_bagian: id_bagian
                    },
                    success: function(data) {
                        // $('#program').empty();
                        // $('#program').append('<option>Pilih Program</option>');
                        // $.each(data, function (key, value) {
                        //     $('#program').append('<option value="' + key + '">' + value + '</option>');
                        // });

                        let select = $('#subbagian');
                        select.empty();
                        select.attr('placeholder', 'Pilih sub bagian');
                        select.append('<option value="">Pilih sub bagian</option>');
                        $.each(data, function(key, value) {
                            select.append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            }

            function onChangeJabatanSelect(url, id_sub_bagian, nama_sub_bagian) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id_sub_bagian: id_sub_bagian
                    },
                    success: function(data) {
                        $('#jabatan').empty();
                        $('#jabatan').append('<option>Pilih Jabatan Kerja</option>');

                        $.each(data, function(key, value) {
                            $('#jabatan').append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    }
                });
            }

            $('#subbagian').attr('disabled', true);
            $('#jabatan').attr('disabled', true);

            $(function() {
                $('#bagian').change(function() {
                    var id_bagian = $(this).val();
                    var url = "{{ URL::to('subbagian-dropdown') }}";
                    var nama_bagian = "nama_sub_bagian";
                    $('#subbagian').attr('disabled', false).empty();
                    $('#jabatan').attr('disabled', true).empty();
                    onChangeSubbagianSelect(url, id_bagian, nama_bagian);

                });
            });

            $(function() {
                $('#subbagian').change(function() {
                    var id_sub_bagian = $(this).val();
                    var url = "{{ URL::to('jabatan-dropdown') }}";
                    var nama_sub_bagian = "nama_jabatan";

                    $('#jabatan').attr('disabled', false);
                    onChangeJabatanSelect(url, id_sub_bagian, nama_sub_bagian);

                });
            });



        });
    </script>
</body>

</body>

</html>
