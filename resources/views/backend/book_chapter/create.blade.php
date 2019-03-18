@extends('layouts.backend')

@section('body')

    @include('components.breadcrumb', ['name' => '添加章节'])

    <div class="row row-cards">
        <div class="col-sm-12">
            <a href="{{ route('backend.book.chapter.index', [$book->id]) }}" class="btn btn-primary ml-auto">返回列表</a>
        </div>
        <div class="col-sm-12">
            <form action="" method="post">
                @csrf
                <input type="hidden" name="book_id" value="{{$book->id}}">
                <div class="form-group">
                    <label>章节名 @include('components.backend.required')</label>
                    <input type="text" name="title" class="form-control" placeholder="请输入章节名" value="{{old('title')}}" required>
                </div>
                <div class="form-group">
                    <label>内容 @include('components.backend.required')</label>
                    @include('components.backend.editor', ['name' => 'content'])
                </div>
                <div class="form-group">
                    <label>是否显示 @include('components.backend.required')</label><br>
                    <label><input type="radio" name="is_show" value="{{ \App\Models\BookChapter::SHOW_YES }}" checked> 是</label>
                    <label><input type="radio" name="is_show" value="{{ \App\Models\BookChapter::SHOW_NO }}"> 否</label>
                </div>
                <div class="form-group">
                    <label>上架时间 @include('components.backend.required')</label>
                    @include('components.backend.datetime', ['name' => 'published_at'])
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">创建</button>
                </div>
            </form>
        </div>
    </div>

@endsection