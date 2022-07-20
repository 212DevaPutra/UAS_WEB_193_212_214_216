@extends('admin.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Admin Form</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="#">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Upload Info Vaksin</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Info Vaksin</div>
                            </div>
                            <form method="POST" action="{{ route('review_store') }}">
                                {{ @csrf_field() }}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>Rumah Sakit</label>
                                                <input name="rumah_sakit" type="text" class="form-control form-control"
                                                    id="titleInput" placeholder="Rumah Sakit..">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Vaksin</label>
                                                <input name="tanggal_vaksin" type="text"
                                                    class="form-control form-control"
                                                    placeholder="Tanggal Vaksin..">
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Vaksin</label>
                                                <input name="jenis_vaksin" type="text" class="form-control form-control"
                                                     placeholder="Jenis Vaksin..">
                                            </div>
                                            <div class="form-group">
                                                <label>Kuota Vaksin</label>
                                                <input name="kuota" type="text" class="form-control form-control"
                                                     placeholder="Kuota Vaksin..">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="basic-url">URL RS</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon3">URL</span>
                                                    </div>
                                                    <input name="url_rs" type="text" class="form-control" id="basic-url"
                                                        aria-describedby="basic-addon3">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="review">Informasi</label>
                                                <textarea name="review" class="form-control" id="review" rows="10"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">Tag Asuransi</label>
                                                <div class="selectgroup selectgroup-pills">
                                                    @foreach ($tags as $tag)
                                                        <label class="selectgroup-item">
                                                            <input type="checkbox" name="tags[]"
                                                                value="{{ $tag->id }}" class="selectgroup-input"
                                                                checked="">
                                                            <span class="selectgroup-button">{{ $tag->tag_name }}</span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Rating RS</label>
                                                <div class="selectgroup w-100">
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="rating" value="1"
                                                            class="selectgroup-input" checked="">
                                                        <span class="selectgroup-button">1</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="rating" value="2"
                                                            class="selectgroup-input">
                                                        <span class="selectgroup-button">2</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="rating" value="3"
                                                            class="selectgroup-input">
                                                        <span class="selectgroup-button">3</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="rating" value="4"
                                                            class="selectgroup-input">
                                                        <span class="selectgroup-button">4</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="rating" value="5"
                                                            class="selectgroup-input">
                                                        <span class="selectgroup-button">5</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <input type="submit" class="btn btn-success" value="kirim" />
                                    <button class="btn btn-danger">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
