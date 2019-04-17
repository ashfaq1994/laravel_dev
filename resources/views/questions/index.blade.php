@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2> All Questions</h2>
                        <div class="ml-auto">
                            <a class="btn btn-outline primary" href=" {{route('questions.create') }} ">Ask Question</a>
                        </div>
                     </div>
                    </div>

                <div class="card-body">
                    @include('layouts._messages')
                  @foreach ($questions as $question)
                     <div class="media">
                        <div class="d-flex flex-column counters">
                            <div class="vote">
                                <strong> {{$question->votes  }} </strong> {{ str_plural('vote',$question->votes) }}
                            </div>
                            <div class="status {{ $question->status}}">
                                <strong> {{$question->answers  }} </strong> {{ str_plural('answers',$question->votes) }}
                            </div>          
                            <div class="views">
                                <strong> {{$question->views  }} </strong> {{ str_plural('view',$question->views) }}
                            </div>
                        </div>
                         <div class="media-body">
                            <div class="d-flex align-items-lg-end">
                                <h3 class="mt-0"><a href=" {{ $question->url }} ">{{ $question->title }}</a></h3>
                                <div class="mt-0">
                                   @if(Auth::user()->can('update-question', $question))
                                    <a href=" {{ route('questions.edit', $question->id) }} " class="btn btn-sm btn-outline-info">Edit</a>
                                    @endif
                                   @if(Auth::user()->can('delete-question', $question))
                                    <form method="post" action=" {{ route('questions.destroy', $question->id)}}">
                                        {{ method_field('DELETE') }}
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')">Delete</button>
                                    @endif
                            </form> 
                                </div>
                            </div>
                             <p class="lead">
                             Aked By <a href=" {{$question->user->url }} ">{{$question->user->name}}</a>
                             <br>
                             <small class="text-muted"> {{$question->created_date}} </small>
                                {{ str_limit($question->body, 250) }}</p>
                         </div>
                     </div>
                  @endforeach
                  <div class="mt-3">
                      {{ $questions->links() }}
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
