@foreach($articles as $article)

<div class="article-list @if (count($article->thumbnails) != 1) article-thumbnails @endif">
    <a href="/article/{{$article->id}}">
        <h3 class="article-title">{{$article->title}}</h3>
        @if(!empty($article->thumbnails))
            <div class="article-thumbnail">
                @foreach($article->thumbnails as $thumbnail)
                    <div class="thumbnail-holder">
                        <div class="thumbnail-holder-inner">
                            <img class="lazy" data-original="{{$thumbnail}}" />
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <h4 class="article-info"><small>{{$article->author->name}} {{$article->hits}}阅读  {{$article->created_at}}</small></h4>
    </a>
</div>
@endforeach