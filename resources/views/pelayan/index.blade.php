@extends('master')
@section('title','Buket Vasya')
@section('menu','active')

@section('content')
    <style>
        .bg-green {
            background-color: rgb(0, 102, 128);
            color: white;
        }
        .text-green {
            color: rgb(0, 102, 128);
            font-weight: bold
        }
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h2>Data pelayan</h2>
                    <a href="{{route('pelayan.create')}}" class="btn bg-green">Tambah</a>
                </div>
                <p>Dibawah ini merupakan semua data pelayan</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" align="center">
                        <thead>
                            <tr align="center">
                                <th align="center" class="align-middle" rowspan="2">#</th>
                                <th align="center" class="align-middle" rowspan="2">Kode pelayan</th>
                                <th align="center" class="align-middle" rowspan="2">Nama pelayan</th>
                                <th align="center" class="align-middle" rowspan="2">Menu buket</th>
                                <th align="center" class="align-middle" rowspan="2">Pembeli</th>
                                <th align="center" class="align-middle" rowspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pelayans as $pelayan)
                                <tr>
                                    <td align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$pelayan->kode_pelayan}}</td>
                                    <td align="center">{{$pelayan->nama_pelayan}}</td>
                                    <td align="center">{{$pelayan->menu_buket}}</td>
                                    <td align="center">
                                        @forelse ($pelayan->pembelis as $item)
                                            <ul>
                                                <li>
                                                    {{$item->nama_pembeli}}
                                                </li>
                                            </ul>
                                        @empty
                                            Tidak ada pembeli
                                        @endforelse
                                    </td>
                                    <td align="center "class="text-center">
                                        <form action="{{ route('pelayan.destroy',$pelayan->id) }}" method="POST">
                                            <a href="{{ route('pelayan.edit',$pelayan->id) }}" class="btn btn-warning">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="11">Tidak ada data...</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
