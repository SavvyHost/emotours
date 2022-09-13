<div>
    @if(in_array($style,['carousel','']))
        @include("Tour::frontend.blocks.form-search-tour.style-normal")
    @endif
    @if($style == "carousel_v2")
        @include("Tour::frontend.blocks.form-search-tour.style-slider-ver2")
    @endif
    @if($style == "style_v3")
        @include("Tour::frontend.blocks.form-search-tour.style-hero-new")
    @endif
    @if($style == "style_v4")
        @include("Tour::frontend.blocks.form-search-tour.style-hero-new2")
    @endif
</div>