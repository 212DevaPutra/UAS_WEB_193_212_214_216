@extends('admin.layouts.master')

@section('content')
    <form method="POST" action="{{ route('review_update', $id) }}">
        {{ @csrf_field() }}
        @method('PUT')
        <div class="form-popup" id="myForm">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>Rumah Sakit</label>
                            <input name="rumah_sakit" type="text" class="form-control form-control"
                                value="{{ $review->rumah_sakit }}">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Vaksin</label>
                            <input name="tanggal_vaksin" type="text" class="form-control form-control"
                                value="{{ $review->tanggal_vaksin }}">
                        </div>
                        <div class="form-group">
                            <label>Jenis Vaksin</label>
                            <input name="jenis_vaksin" type="text" class="form-control form-control"
                                value=" {{ $review->jenis_vaksin }}">
                        </div>
                        <div class="form-group">
                            <label>Kuota Vaksin</label>
                            <input name="kuota" type="text" class="form-control form-control"
                                value=" {{ $review->kuota }}">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>URL RS</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">URL</span>
                                </div>
                                <input name="url_rs" type="text" class="form-control" id="basic-url"
                                    aria-describedby="basic-addon3" value="{{ $review->url_rs }}">
                            </div>
                        </div>
                        <!-- <div class="form-group">
                                                        <label for="exampleFormControlFile1">Example file input</label>
                                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                                    </div> -->
                        <div class="form-group">
                            <label for="review">Informasi</label>
                            <textarea name="review" class="form-control" rows="10">{{ $review->review }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Tag Asuransi</label>
                            <div class="selectgroup selectgroup-pills">
                                @foreach ($tags as $tag)
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="tags[]"
                                            value="{{ $tag->id }}"
                                            class="selectgroup-input" checked="">
                                        <span
                                            class="selectgroup-button">{{ $tag->tag_name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Rating RS</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="rating" value="1" class="selectgroup-input"
                                        checked="">
                                    <span class="selectgroup-button">1</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="rating" value="2" class="selectgroup-input">
                                    <span class="selectgroup-button">2</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="rating" value="3" class="selectgroup-input">
                                    <span class="selectgroup-button">3</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="rating" value="4" class="selectgroup-input">
                                    <span class="selectgroup-button">4</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="rating" value="5" class="selectgroup-input">
                                    <span class="selectgroup-button">5</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-success" value="Update" />

        </div>
    </form>
@endsection
