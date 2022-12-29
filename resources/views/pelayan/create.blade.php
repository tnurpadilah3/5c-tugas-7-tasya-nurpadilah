@extends('master')
@section('title','Buket Vasya')
@section('menu','active')

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
                <h2>Tambah Data pelayan</h2>
                <p>Silahkan masukkan data anda dengan benar</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <form action="{{route('pelayan.store')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="kode_pelayan" class="form-label">Kode pelayan</label>
                        <input type="text" name="kode_pelayan" id="kode_pelayan" placeholder="Masukkan Kode pelayan" class="form-control" value="{{old('kode_pelayan')}}">
                        @error('kode_pelayan')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nama_pelayan" class="form-label">Nama pelayan</label>
                        <input type="text" name="nama_pelayan" id="nama_pelayan" placeholder="Masukkan Nama pelayan" class="form-control" value="{{old('nama_pelayan')}}">
                        @error('nama_pelayan')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="menu_buket" class="form-label">Menu buket</label>
                        <select name="menu_buket" id="menu_buket" class="form-control">
                            <option selected disabled>Pilih Menu buket</option>
                            <option value="buket bunga" {{old('menu_buket') == "buket bunga" ? "selected" : ""}}>Buket Bunga</option>
                            <option value="buket uang" {{old('menu_buket') == "buket uang" ? "selected" : ""}}>Buket Uang</option>
                            <option value="buket makanan" {{old('menu_buket') == "buket makanan" ? "selected" : ""}}>Buket Makanan</option>
                            <option value="buket coklat" {{old('menu_buket') == "buket coklat" ? "selected" : ""}}>Buket coklat</option>
                            <option value="buket  Special" {{old('menu_buket') == "buket  Special" ? "selected" : ""}}>Buket Special</option>
                        </select>
                        @error('menu_buket')
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
