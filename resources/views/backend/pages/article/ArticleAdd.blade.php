@extends('layouts.backend')

@section('title', 'Tambah Artikel')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.article.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                    </div>

                    <div class="form-group">
                        <label>Thumbnail</label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail" accept="image/*">
                            <label class="custom-file-label" for="thumbnail">Choose file...</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="body">Artikel</label>
                        <textarea class="form-control" style="resize: none" id="body" name="body"></textarea>
                    </div>

                    <input type="hidden" name="uniq_id" value="{{ $uniq_id }}">

                    <div class="mt-3 float-right">
                        <a href="{{ route('admin.article.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
{{-- CKEditor --}}
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('body', {
        filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token(),'uniq_id' => $uniq_id]) }}",
        filebrowserUploadMethod: 'form',
        height: 500
    });
</script>
@endpush