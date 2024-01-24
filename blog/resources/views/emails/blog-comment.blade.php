
<h2>You have a new comment.</h2>

<h3>{{ $comment->user->name }} commented on your [{{  $comment->blog->title }}]:</h3>

<div>
    {{ $comment->content }}
</div>
