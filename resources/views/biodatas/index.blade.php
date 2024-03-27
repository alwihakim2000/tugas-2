@extends('biodatas.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Biodata dibuat Muhammad Alwi Hakim</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('biodatas.create') }}"> Tambah Biodata Baru</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Alamat</th>
            <th>Hobi</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($biodatas as $biodata)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $biodata->nama }}</td>
            <td>{{ $biodata->nim }}</td>
            <td>{{ $biodata->alamat }}</td>
            <td>{{ $biodata->hobi }}</td>
            <td>
                <form action="{{ route('biodatas.destroy',$biodata->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('biodatas.show',$biodata->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('biodatas.edit',$biodata->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $biodatas->links() !!}
      
@endsection