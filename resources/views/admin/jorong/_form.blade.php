<div class="form-group">
    <label for="name">ID Nagari</label>
    {!! Form::select('nagari_id', $nagaris, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label for="name">Nama Jorong</label>
    {{ Form::text('nama', null, ['class' => 'form-control'])}}    
</div>

<div class="form-group">
    <label for="email">Luas Jorong</label>
    {{ Form::text('luas_wilayah', null, ['class' => 'form-control'])}}
</div>

