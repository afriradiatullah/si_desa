@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
<a class="btn" href="{{ route('jorongs.create') }}"><i class="icon-plus"></i> Tambah</a>
@endsection

{{-- Content Utama --}}
@section('content')

<div class="row">
    <div class="col-md-12">
<!--    Hello World-->
        <div class="card">
            
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Daftar Jorong
            </div>
            
            <div class="card-body">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Nagari</th>
                            <th class="text-center">Nama Jorong</th>
                            <th class="text-center">Luas wilayah</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jorongs as $jorong)
                        <tr>
                            <td class="text-center">{{ $jorong->id }}</td>
                            <td class="text-center">{{ $jorong->nagari->nama }}</td>
                            <td class="text-center">{{ $jorong->nama }}</td>
                            <td class="text-center">{{ $jorong->luas_wilayah }} km<sup>2</sup></td>
                            
                            <td class="text-center">
                                <a href="{{ route('jorongs.show', [$jorong->id]) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-eye"> </i>
                                </a>
                                <a href="{{ route('jorongs.edit', [$jorong->id]) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-pencil"> </i>
                                </a>
                                <button onclick="event.preventDefault();confirmDeletion('{{ route('jorongs.destroy', [$jorong->id]) }}');" class="btn btn-sm btn-outline-danger">
                                    <i class="fa fa-trash"> </i>
                                </button>
                                
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<form style="display: none" action="#" method="post" id="form-delete">
    @csrf
    @method('delete')
</form>

@endsection

@push('javascript')
<script>
    function confirmDeletion(url){
        if(confirm('Anda yakin akan menghapus jorong ini? ')){
            form = document.querySelector('#form-delete');
            form.action = url;
            form.submit();
        }
    }
    
</script>
@endpush

