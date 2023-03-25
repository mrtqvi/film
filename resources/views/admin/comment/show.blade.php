@extends('admin.layouts.app', ['title' => 'نمایش نظر'])

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <h2 class="h3 mb-0 page-title">نمایش نظر </h2>
        </div>
        <div class="col-12">

            <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-body table-responsive">
                            <thead>
                               <p class="mb-3 mr-2">
                                   دیدگاه فیلم :    {{ $comment->commentable->en_title == null ? $comment->commentable->title : $comment->commentable->en_title}}</p>
                            </thead>
                            <!-- table -->
                            <table class="table table-striped" id="table-id">
                                    <tr>
                                        <td>نویسنده نظر</td>
                                        <td>{{ $comment->user->full_name }}</td>
                                    </tr>
                                <tr>
                                    <td> متن نظر</td>
                                    <td class="">{{ $comment->comment }}</td>
                                </tr>
                            </table>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div>
@endsection
