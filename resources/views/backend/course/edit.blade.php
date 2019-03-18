@extends('layouts.backend')

@section('body')

    @include('components.breadcrumb', ['name' => '编辑课程'])

    <form action="" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row row-cards">
            <div class="col-sm-12">
                <a href="{{ route('backend.course.index') }}" class="btn btn-primary ml-auto">返回列表</a>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>课程名 @include('components.backend.required')</label>
                    <input type="text" class="form-control" name="title" value="{{$course->title}}" placeholder="课程名" required>
                </div>
                <div class="form-group">
                    <label>描述 @include('components.backend.required')</label>
                    @include('components.backend.editor', ['name' => 'description', 'content' => $course->description])
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>一句话介绍 @include('components.backend.required')</label>
                    <textarea name="short_description" class="form-control" rows="2" placeholder="一句话介绍" required>{{$course->short_description}}</textarea>
                </div>
                @include('components.backend.image', ['name' => 'thumb', 'title' => '课程封面', 'value' => $course->thumb])
                <div class="form-group">
                    <label>上架时间 @include('components.backend.required')</label>
                    @include('components.backend.datetime', ['name' => 'published_at', 'value' => $course->published_at])
                </div>
                <div class="form-group">
                    <label>是否显示 @include('components.backend.required')</label><br>
                    <label><input type="radio" name="is_show"
                                  value="{{ \App\Models\Course::SHOW_YES }}"
                                {{$course->is_show == \App\Models\Course::SHOW_YES ? 'checked' : ''}}>是</label>
                    <label><input type="radio" name="is_show"
                                  value="{{ \App\Models\Course::SHOW_NO }}"
                                {{$course->is_show == \App\Models\Course::SHOW_NO ? 'checked' : ''}}>否</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>价格 @include('components.backend.required')</label>
                    <input type="text" name="charge" placeholder="价格" class="form-control" value="{{$course->charge}}" required>
                </div>
                <div class="form-group">
                    <label>SEO关键字 @include('components.backend.required')</label>
                    <textarea name="seo_keywords" class="form-control" rows="2" placeholder="SEO关键字" required>{{$course->seo_keywords}}</textarea>
                </div>
                <div class="form-group">
                    <label>SEO描述 @include('components.backend.required')</label>
                    <textarea name="seo_description" class="form-control" rows="2" placeholder="SEO描述" required>{{$course->seo_description}}</textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">保存</button>
                </div>
            </div>
        </div>
    </form>

@endsection