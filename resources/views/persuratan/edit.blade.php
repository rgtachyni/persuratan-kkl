@extends('layout.app')

@section('content')
    @if ($errors->any())
        <div class="flex justify-center p-4 mb-4 text-sm text-red-800 rounded-lg  dark:bg-gray-800 dark:text-red-400 "
            role="alert">

            <span class="sr-only">Danger</span>
            <div>
                <span class="font-medium">Please fill in</span>
                <ul class="mt-1.5 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="page-inner">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Tambah Dokumen</div>
                        </div>

                        {{-- FORM --}}
                        <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-8">
                                        <div class="form-group">
                                            <label for="nomorSurat">Nomor Surat</label>
                                            <input type="text" class="form-control" id="nomorSurat" name="nomorSurat" />
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggalMasuk">Tanggal Masuk</label>
                                            <input type="date" class="form-control" id="tanggalMasuk"
                                                name="tanggalMasuk"" />
                                        </div>
                                        <div class="form-group">
                                            <label for="asalSurat">Asal Surat</label>
                                            <input type="text" class="form-control" id="asalSurat" name="asalSurat"" />
                                        </div>
                                        <div class="form-group">
                                            <label for="perihal">Perihal</label>
                                            <input type="text" class="form-control" id="perihal" name="perihal" />
                                        </div>

                                        {{-- File surat --}}
                                        <div class="form-group">
                                            <label for="fileSurat"> File Surat</label> <br>
                                            <input type="file" class="form-control-file" id="fileSurat"
                                                name="fileSurat" />
                                        </div>


                                    </div>


                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success" id="save">Submit</button>
                                <button class="btn btn-danger" id="cancel">Cancel</button>
                            </div>

                    </div>
                </div>
            </div>
            </form>
        </div>

    </div>
@endsection
