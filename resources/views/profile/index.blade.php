@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="name p-2">
                                    <h1>{{ Str::limit($headline->name, 70) }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="gender mx-auto">{{ Str::limit($headline->gender, 70) }}</p>
                            <!--value="1" 男性-->
                            <!--value="2" 女性-->
                            <!--value="3" 回答しない-->
                        </div>
                        <div class="col-md-10">
                            <p class="hobby mx-auto">{{ Str::limit($headline->hobby, 650) }}</p>
                        </div>
                        <div class="col-md-10">
                            <p class="introduction mx-auto">{{ Str::limit($headline->introduction, 650) }}</p>
                        </div>                    
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="name">
                                    {{ Str::limit($post->name, 150) }}
                                </div>
                                <div class="gender mt-3">
                                    {{ Str::limit($post->gender, 150) }}
                                </div>
                                <div class="hobby mt-3">
                                    {{ Str::limit($post->hobby, 150) }}
                                </div>                            
                                <div class="introduction mt-3">
                                    {{ Str::limit($post->introduction, 150) }}
                                </div>         
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection