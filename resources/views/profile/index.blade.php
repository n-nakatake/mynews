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
                        <p class="gender mx-auto">
                        @if ($headline->gender === '1')
                            男性
                        @elseif ($headline->gender === '2')
                            女性
                        @else
                            回答しない
                        @endif
                        </p>
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
            <div class="profiles col-md-8 mx-auto mt-3">
                @foreach($profiles as $profile)
                    <div class="profile">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $profile->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="name">
                                    {{ Str::limit($profile->name, 150) }}
                                </div>
                            </div>   
                        </div>
                        <p class="gender mx-auto">
                                @if ($headline->gender === '1')
                                    男性
                                @elseif ($headline->gender === '2')
                                    女性
                                @else
                                    回答しない
                                @endif
                        </p>
      
                        <div class="hobby mt-3">
                            {{ Str::limit($profile->hobby, 150) }}
                        </div>                            
                        <div class="introduction mt-3">
                            {{ Str::limit($profile->introduction, 150) }}
                        </div>         
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection