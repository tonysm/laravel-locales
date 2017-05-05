@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h1 class="title">
                        {{ $article->title }}
                    </h1>
                </div>

                <article>
                    {{ $article->body }}
                </article>

                <hr/>

                <h3>{{ trans_choice('app.articles.comments', $comments->total(), ['count' => $comments->total()]) }}</h3>

                @foreach ($comments as $comment)
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="http://placehold.it/60x60" alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading clearfix">
                                {{ $comment->user->name }}

                                <small class="pull-right">{{ $comment->created_at->diffForHumans() }}</small>
                            </h4>

                            {{ $comment->body }}
                        </div>
                    </div>
                @endforeach

                {{ $comments->links() }}

                <hr>

                <form action="{{ route('articles.comments.store', $article) }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <textarea name="body" id="" cols="5" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">
                            @lang('app.articles.btn_comment')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
