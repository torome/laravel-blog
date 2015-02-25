@extends('home.layout')

@section('title'){{ '博文列表 第'.$articles->currentPage().'页 | '.setting('site_name') }}@stop

@section('content')
<div class="col-sm-8 blog-main">
	@foreach($articles as $article)
		<div class="blog-post">
			<h2 class="blog-post-title"><a href="/{{ $article->slug }}">{{ $article->title }}</a></h2>
			<p class="blog-post-meta">posted in <a href="/categories/{{ $article->category->slug }}">{{ $article->category->name }}</a> and tagged 
			@foreach($article->tags as $key => $tag)
				<a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
				@if($key < count($article->tags)-1), @endif
			@endforeach 
			about {{ $article->created_at->diffForHumans() }}.</p>
			{!! str_limit($article->body_html, $limit = 500, $end = '...') !!}
		</div><!-- /.blog-post -->
		<hr>
	@endforeach

	<nav class="pull-right">
		{!! $articles->render() !!}
	</nav>

</div><!-- /.blog-main -->
@stop

