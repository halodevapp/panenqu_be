<?php $page_title = 'Company Config'; ?>

@extends('layouts.main')

@section('page-title', $page_title)

@section('page-css')
    <link rel="stylesheet" href="/assets/adminlte/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection

@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{ $page_title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('config.company.index') }}">company</a>
                            </li>
                            <li class="breadcrumb-item active">{{ $page_title }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form action="{{ route('config.company.update', ['id' => $company->id]) }}"
                                class="form-horizontal" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="value"
                                                    class="col-sm-2 col-form-label">{{ $company->type }}</label>
                                                <div class="col-sm-10">
                                                    @if ($company->type == 'COMPANY_ADDRESS')
                                                        <textarea class="form-control @error('value') is-invalid @enderror" id="{{ $company->type }}" name="value"
                                                            placeholder="{{ $company->type }}" rows="5">{{ old('value', $company->value) }}</textarea>
                                                    @else
                                                        <input type="text"
                                                            class="form-control @error('value') is-invalid @enderror"
                                                            id="value" name="value" placeholder="{{ $company->type }}"
                                                            value="{{ old('value', $company->value) }}">
                                                    @endif
                                                    <span id="value_error" class="error invalid-feedback">
                                                        @error('value')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('config.company.index') }}" class="btn btn-secondary">Back</a>
                                    <button id="submit_company" type="submit"
                                        class="btn btn-primary float-right">Save</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-js')
    <script type="text/javascript" src="/assets/adminlte/plugins/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="/assets/ckeditor/ckeditor.js"></script>
    <script>
        $(function() {
            $('#submit_company').click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Simpan company ?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Save',
                    buttonsStyling: false,
                    allowOutsideClick: false,
                    customClass: {
                        confirmButton: 'btn btn-success mr-3',
                        cancelButton: 'btn btn-danger'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        showLoading();
                        $('#submit_company').parents('form').submit();
                    }
                })
            });
        });

        $(function() {
            if ($('#COMPANY_ADDRESS').length > 0) {
                CKEDITOR.replace('COMPANY_ADDRESS', {
                    removePlugins: "exportpdf"
                });
            }
        });
    </script>
@endsection