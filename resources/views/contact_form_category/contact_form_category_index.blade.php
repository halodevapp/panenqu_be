<?php $page_title = 'Master Form Category'; ?>

@extends('layouts.main')

@section('page-title', $page_title)

@section('page-css')

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
                            <div class="card-header py-2">
                                <div class="row">
                                    <div class="col-lg-6 my-1">
                                        <a href="{{ route('contact-category.create') }}"
                                            class="btn btn-primary btn-sm d-block d-sm-inline-block">
                                            Create New Form Category
                                        </a>
                                    </div>
                                    <div class="col-lg-4 offset-lg-2 my-1">
                                        <form
                                            action="{{ route('contact-category.index', ['search' => request()->get('search')]) }}"
                                            method="GET">
                                            <div class="input-group input-group-sm">
                                                <input type="search" id="search" class="form-control" name="search"
                                                    placeholder="Search" value="{{ request()->get('search') }}">
                                                <span class="input-group-append">
                                                    <button type="submit" id="btn-search"
                                                        class="btn btn-primary btn-flat">Search</button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table-form-categories" class="table table-bordered table-hover table-sm">
                                        <thead>
                                            <tr>
                                                <th class="text-center w70px">#</th>
                                                <th>Category</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($formCategories as $category)
                                                <tr>
                                                    <td class="text-center">
                                                        <a href="{{ route('contact-category.edit', ['contact_category' => $category->id]) }}"
                                                            class="btn btn-xs btn-success" title="Edit">
                                                            <i class="far fa-edit fa-fw"></i>
                                                        </a>
                                                        <form
                                                            action="{{ route('contact-category.destroy', ['contact_category' => $category->id]) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="delete_contact_category btn btn-xs btn-danger"
                                                                title="Delete">
                                                                <i class="far fa-trash-alt fa-fw"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td>{{ $category->category_name }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-2 float-right">
                                    {{ $formCategories->onEachSide(2)->appends(['search' => request()->get('search')])->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-js')
    <script>
        $(function() {
            var responseMessage = $('meta[name="response-message"]').attr('content');
            var responseStatus = $('meta[name="response-status"]').attr('content');

            if (responseMessage.trim() != '') {

                if (responseStatus == 'success') {
                    toastr.success(responseMessage)
                } else {
                    toastr.error(responseMessage)

                }
            }

            $('.delete_contact_category').click(function(e) {
                var dis = this;
                e.preventDefault();
                Swal.fire({
                    title: 'Delete Form Category ?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    buttonsStyling: false,
                    allowOutsideClick: false,
                    customClass: {
                        confirmButton: 'btn btn-danger mr-3',
                        cancelButton: 'btn btn-secondary'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        showLoading();
                        $(dis).parents('form').submit();
                    }
                })
            })
        })
    </script>
@endsection