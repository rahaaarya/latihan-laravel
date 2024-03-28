@extends('index')

@section('MainContent')
<table class="table table-striped table-hover ">
  <a href="/tambahuser" class="btn btn-success">+ Tambah Data</a> <br><br>
    <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Jabatan</th>
          <th scope="col">Kelas</th>
          <th scope="col">Jenis Kelamin</th>
          <th scope="col">Foto</th>
        </tr>
      </thead>
      <tbody>
        @php
          $counter = 1; // Inisialisasi nomor urut
        @endphp
        @foreach ($data as $item)
        <tr>
          <td>{{ $counter++ }}</td> <!-- Menggunakan indeks untuk menampilkan nomor urut -->
          <td>{{ $item->nama }}</td>
          <td>{{ $item->jabatan }}</td>
          <td>{{ $item->kelas }}</td>
          <td>{{ $item->jenis_kelamin }}</td>
          <td><img src="{{ asset('gambar') }}/{{$item->foto }}" alt="" width="200em"></td>
        </tr>
        @endforeach
      </tbody>
  </table>
@endsection
