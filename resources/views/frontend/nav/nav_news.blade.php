<ul>
    @foreach($posts as $key=>$post)
    @if($key<5)
        <li class="rcp_svl_has_thumb">
            <a  href="{{url('/news/'.$post->post_slug)}}" class="link_recent_thumb" title="{{$post->post_name}}">
                <img width="150" height="150" src="{{url('/'.$post->post_img)}}" data-id="{{$post->id}}" class="news_id attachment-thumbnail size-thumbnail wp-post-image" alt="{{$post->post_name}}" title="{{$post->post_name}}" /> </a>
            <div class="rcp_svl_content">
                <a class="news_id" data-id="{{$post->id}}" href="{{url('/news/'.$post->post_slug)}}" title="{{$post->post_name}}">{{$post->post_name}}</a>
                <span class="date">{{date_format($post->created_at, 'd/m/Y')}}</span>
            </div>
        </li>
    @endif
    @endforeach
</ul>