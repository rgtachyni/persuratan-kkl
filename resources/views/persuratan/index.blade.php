@extends('layout.app')

@section('content')
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Add Row</h4>
                    <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Add Row
                    </button>
                </div>
            </div>


            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No surat</th>
                            <th>Tanggal Masuk</th>
                            <th>Asal Surat</th>
                            <th>Perihal</th>
                            <th>File Surat</th>
                            <th style="width: 10%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $i => $d)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $d->nomorSurat }}</td>
                                <td>{{ $d->tanggalMasuk }}</td>
                                <td>{{ $d->asalSurat }}</td>
                                <td>{{ $d->perihal }}</td>

                                <td>
                                    @if (in_array(pathinfo($d->fileSurat, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                        <a href="{{ asset('storage/' . $d->fileSurat) }}"> Download Gambar
                                            <img src="{{ asset('storage/' . $d->fileSurat) }}" alt="no" width="100"
                                                height="100">
                                        </a>
                                    @else
                                        <a href="{{ asset('storage/' . $d->fileSurat) }}">Download File</a>
                                    @endif
                                </td>
                                <td>
                                    <div class="form-button-action">
                                        <a href="{{ url('/surat-masuk/edit/' . $d->id) }}"
                                            class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('persuratan.delete', $d->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link btn-danger"
                                                data-original-title="Remove"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                        {{-- <button
                      type="button"
                      data-bs-toggle="tooltip"
                      title=""
                      class="btn btn-link btn-danger"
                      data-original-title="Remove"
                    >
                      <i class="fa fa-times"></i>
                    </button> --}}
                                    </div>
                                </td>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    </div>
@endsection
