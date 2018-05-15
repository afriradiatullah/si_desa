@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
    <a class="btn" onclick="event.preventDefault();confirmDeletion('{{ route('jorongs.destroy', [$jorongs->id]) }}');"><i class="icon-trash"></i> Hapus</a>
    <a class="btn" href="{{ route('jorongs.edit', [ $jorongs->id]) }}"><i class="icon-pencil"></i> Edit</a>
    <a class="btn" href="{{ route('jorongs.index') }}"><i class="icon-list"></i> List</a>

@endsection

{{-- Content Utama --}}
@section('content')
<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Informasi Jorong
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nama Jorong</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $jorongs->nama }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nama Nagari</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $jorongs->nagari->nama }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Luas Wilayah</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $jorongs->luas_wilayah }} km<sup>2</sup></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Kecamatan</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $jorongs->nagari->kecamatan }}</p>
                         </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Kabupaten</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $jorongs->nagari->kabupaten }}</p>
                        </div>
                    </div>                                                        
                </form>
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
        if(confirm('Anda yakin akan menghapus jorong ini?')){
            form = document.querySelector('#form-delete');
            form.action = url;
            form.submit();
        }
    }
</script>