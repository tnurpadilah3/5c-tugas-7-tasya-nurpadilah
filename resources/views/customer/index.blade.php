@extends('master')
@section('title','Buket Vasya')
@section('menu1','active')

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
                    <h2>Data customer</h2>
                    <a href="{{route('customer.create')}}" class="btn bg-green">Tambah</a>
                </div>
                <p>Dibawah ini merupakan semua data customer</p>
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
                                <th align="center" class="align-middle" rowspan="2">No Antrian</th>
                                <th align="center" class="align-middle" rowspan="2">Nama customer</th>
                                <th align="center" class="align-middle" rowspan="2">Jenis Kelamin</th>
                                <th align="center" class="align-middle" rowspan="2">Menu</th>
                                <th align="center" class="align-middle" rowspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($customers as $customer)
                                <tr>
                                    <td align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$customer->nik}}</td>
                                    <td align="center">{{$customer->nama_customer}}</td>
                                    <td align="center">{{$customer->jenis_kelamin}}</td>
                                    <td align="center">
                                        @forelse ($customer->pelayans as $item)
                                            <ul>
                                                <li>
                                                    {{$item->menu_bukets}}
                                                </li>
                                            </ul>
                                        @empty
                                            Tidak ada Menu
                                        @endforelse
                                    </td>
                                    <td align="center "class="text-center">
                                        <form action="{{ route('customer.destroy',$customer->id) }}" method="POST">
                                            <a href="{{ route('customers.take',$customer->id) }}" class="btn btn-info">Menu</a>
                                            <a href="{{ route('customer.edit',$customer->id) }}" class="btn btn-warning">Edit</a>
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
