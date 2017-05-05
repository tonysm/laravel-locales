@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach ($articles as $article)
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="pull-left">
                            <a href="{{ route('articles.show', $article) }}">
                                {{ $article->title }}
                            </a>
                        </div>

                        <div class="pull-right">
                            {{ trans_choice('app.articles.comments', $article->comments_count, ['count' => $article->comments_count]) }}
                        </div>
                    </div>

                    <div class="panel-body">
                        {{ $article->body }}
                    </div>
                </div>
            @endforeach

            {{ $articles->links() }}
        </div>
    </div>
</div>
@endsection
