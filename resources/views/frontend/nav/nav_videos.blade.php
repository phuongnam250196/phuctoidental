<ul class="recent-video-ul">
    @foreach(listVideos() as $key=>$video)
    @if($key<5)
        <li class="rcp_svl_has_thumb">
            <a data-id="{{$video->id}}" href="{{url('/videos/'.$video->video_slug)}}" title="{{$video->video_name}}" class="videos_id link_recent_thumb">
                <img width="150" height="150" src="{{url('/'.$video->video_img)}}" class="attachment-thumbnail size-thumbnail wp-post-image" alt="{{$video->video_name}}" title="{{$video->video_name}}" /> </a>
            <div class="rcp_svl_content">
                <a class="videos_id" data-id="{{$video->id}}" href="{{url('/videos/'.$video->video_slug)}}" title="{{$video->video_name}}">
                    {{$video->video_name}} </a>
                <span class="date">{{date_format($video->created_at, 'd/m/Y')}}</span>
            </div>
        </li>
    @endif
    @endforeach
</ul>