<div class="container-fluid">
    <div class="call-to-action">
        <div class="row">
            <div class="col-6 section context">
                <div class="title">
                    {{$title}}
                </div>
                <div class="sub_title">
                {{$sub_title}}
                </div>
                @if($link_title)
                <a class="btn-more" href="{{$link_more}}">
                {{$link_title}}
                </a>
                @endif
            </div>
            <div class="col-6 section">
                <img src="{{ $bg_image_url ?? "" }}" class="offer-banner" alt="offer-banner">
            </div>
        </div>
    </div>
</div>