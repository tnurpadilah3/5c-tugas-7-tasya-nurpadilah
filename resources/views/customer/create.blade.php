@extends('master')
@section('title','Buket Vasya')
@section('menu1','active')

@section('content')
    <style>
        .bg-green {
            background-color: rgb(0, 102, 128);
            color: white;
        }
        .bt-green{
            background-color: rgb(0, 102, 128);
            color: white;
        }
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <h2>Tambah Data customer</h2>
                <p>Silahkan masukkan data dengan benar dan lengkap!</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <form action="{{route('customer.store')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="no_antrian" class="form-label">No Antrian</label>
                        <input type="text" name="no_antrian" id="no_antrian" placeholder="Masukkan No Antrian" class="form-control" value="{{old('no_antrian')}}">
                        @error('no_antrian')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nama_customer" class="form-label">Nama customer</label>
                        <input type="text" name="nama_customer" id="nama_customer" placeholder="Masukkan Nama customer" class="form-control" value="{{old('nama_customer')}}">
                        @error('nama_customer')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{old('jenis_kelamin') == "Laki-laki" ? "selected" : ""}}>Laki-laki</option>
                            <option value="Perempuan" {{old('jenis_kelamin') == "Perempuan" ? "selected" : ""}}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn bt-green">Tambah</button>
                    <p></p>
                </form>
            </div>
        </div>
    </div>
@endsection
