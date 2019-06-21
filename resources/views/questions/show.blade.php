@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h1> {{ $question->title}} </h1>
                        <div class="ml-auto">
                            <a class="btn btn-outline primary" href=" {{route('questions.index') }} ">Back</a>
                        </div>
                     </div>
                    </div>

                <div class="card-body">
                  {!! $question->body_html !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-body">
              <h4 class="card-title">{{ $question->answers_count . " " . str_plural('Answer', $question->answers_count) }}</h4>
               <hr>
                @foreach ($question->answers as $answers)
                    <div class="media">
                        <div class="media-body">
                            {!! $answers->body_html !!}
                            <div class="float-right">
                                <span class="text-muted"> Answered  {{ $answers->created_date }} </span>
                                <div class="media">
                                    <a href=" {{ $answers->user->url }}" class="pr-2">
                                     <img src=" {{ $answers->user->avatar }} " alt="">
                                    </a>
                                    <div class="media-body">
                                        <a href="{{ $answers->user->url }}">
                                         {{ $answers->user->name }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
