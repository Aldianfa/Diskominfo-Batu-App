@extends('layout.userBase')
@section('title')
    USER | Dashboard
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>
            Dashboard
            {{-- <small>Control panel</small> --}}
        </h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <a href="/updatekegiatan" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="col-md-2">
                @if (Auth::user()->level == 'pejabat')
                    <a href="" class="btn btn-warning mb-3" data-toggle="modal" data-target="#PenilaianModal"><i
                            class="fas fa-star"></i> Nilai</a>
                @endif
            </div>
        </div>

        <div class="card">
            <h5 class="card-header">Detail Log Kegiatan</h5>
            <div class="card-body">
                <div class="mb-3">
                    <label for="inisiator" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="inisiator" value="{{ $logkegiatan->inisiator }}"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="id_surat" class="form-label">Dasar Surat Kegiatan</label>
                    {{-- <input type="text" class="form-control" name="id_surat"
                        value="{{ $logkegiatan->surats->perihal ?? 'Tidak ada surat' }}" readonly> --}}
                    <input type="text" class="form-control" name="id_surat"
                        value="{{ $logkegiatan->surats->subklasifikasis->klasifikasis->kode_klasifikasi . '/' . $logkegiatan->surats->subklasifikasis->kode_sub_klasifikasi . '/' .$logkegiatan->surats->subklasifikasis->nama_sub_klasifikasi .'/'. $logkegiatan->surats->nomor_surat ?? 'Tidak ada surat' }}"
                        readonly>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Perihal Dasar Kegiatan</label>
                            <input type="text" class="form-control" name="nama_kegiatan"
                                value="{{ $logkegiatan->kegiatans->nama_kegiatan }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="text" class="form-control" name="tanggal"
                                value="{{ $logkegiatan->tanggal_kegiatan }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="id" class="form-label">Teruskan Kegiatan Ke :</label>
                    <input type="text" class="form-control" name="id"
                        value="{{ $logkegiatan->newusers->nama ?? 'Tidak ada tujuan/Dikerjakan Sendiri' }}" readonly>
                </div>
                {{-- <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jenis_kegiatan" class="form-label">Jenis Kegiatan</label>

                        <input type="text" class="form-control" name="jenis_kegiatan"
                            value="{{ $logkegiatan->jenis_kegiatan }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    
                </div>
            </div> --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="indikator" class="form-label">Indikator</label>
                            <input type="text" class="form-control" name="id_indikator"
                                value="{{ $logkegiatan->indikators->nama_indikator }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="bidangkegiatan">Pejabat Penilai</label>
                            <input type="text" class="form-control" name="bidangkegiatan"
                                value="{{ $logkegiatan->bidangkegiatans->newusers->nama }} - {{ $logkegiatan->bidangkegiatans->subbagians->nama_sub_bagian }}"
                                readonly>
                        </div>
                    </div>

                </div>
                <div class="mb-3">
                    <label for="narasi" class="form-label">Narasi</label>
                    <textarea name="narasi" class="form-control" value="{{ $logkegiatan->narasi }}"readonly>{{ $logkegiatan->narasi }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>

                    @if ($logkegiatan->keterangan == 'belum')
                        <span class="badge bg-danger">Belum</span>
                    @elseif($logkegiatan->keterangan == 'dilanjutkan')
                        <span class="badge bg-warning">Dilanjutkan</span>
                    @elseif($logkegiatan->keterangan == 'selesai')
                        <span class="badge bg-success">Selesai</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Dokumentasi</label>
                    <br>
                    <img src="{{ asset('uploads/image/' . $logkegiatan->dokumentasi_1) }}" alt="" width="500px">
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">File</label>
                    <a href="../../uploads/surat/{{ $logkegiatan->dokumentasi_2 }}" class="btn btn-secondary btn-block"
                        target="_blank"><i class="fas fa-file"></i> Download Surat</a>
                </div>
                <br>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Penilaian Kegiatan</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="nilai" class="form-label">Nilai</label>
                        <br>
                        @if ($logkegiatan->nilai == null)
                            <span class="badge badge-danger">Belum Dinilai</span>
                        @else
                            @for ($i = 0; $i < $logkegiatan->nilai; $i++)
                                <i class="fas fa-star" style="color: rgb(255, 217, 0); font-size: 24px;"></i>
                            @endfor
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="catatannilai">Catatan Penilai</label>
                        <textarea name="catatan_nilai" id="catatan_nilai" class="form-control" readonly>{{ $logkegiatan->catatan_nilai }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Penilaian --}}
    <div class="modal fade" id="PenilaianModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="PenilaianModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="PenilaianModalLabel">Penilaian</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('penilaianlog.update', $logkegiatan->id_log) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="nilailabel">Berikan Nilai</label>
                                    <select name="nilai" id="nilai" class="form-control">
                                        <option value="">Pilih Nilai</option>
                                        <option value="1">1 - Sangat Buruk</option>
                                        <option value="2">2 - Buruk</option>
                                        <option value="3">3 - Cukup</option>
                                        <option value="4">4 - Baik</option>
                                        <option value="5">5 - Sangat Baik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="catatannilai">Catatan</label>
                                    <textarea name="catatan_nilai" id="catatan_nilai" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success btn-block">Simpan</button>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <center>Diskominfo 2023</center>
                </div>
            </div>
        </div>
    </div>
@endsection
