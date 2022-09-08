@php
    if(!empty($translation->include)){
        $title = __("Included");
    }
    if(!empty($translation->exclude)){
        $title = __("Excluded");
    }
    if(!empty($translation->exclude) and !empty($translation->include)){
        $title = __("Included/Excluded");
    }
@endphp

   <div class="mdc-tab-bar secondary_nav sticky_horizontal" role="tablist">
      
      <div class="mdc-tab-scroller">
         <div class="mdc-tab-scroller__scroll-area">
            <div class="mdc-tab-scroller__scroll-content">
        <a  href="#description" class="mdc-tab mdc-tab--active" role="tab" aria-selected="true" tabindex="0">
          <span class="mdc-tab__content">
            <span class="mdc-tab__icon material-icons" aria-hidden="true">{{__("Overview")}}</span>
            <span class="mdc-tab__text-label">{{__("Overview")}}</span>
          </span>
          <span class="mdc-tab-indicator mdc-tab-indicator--active">
            <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
          </span>
          <span class="mdc-tab__ripple"></span>
        </a>
        @if(!empty($title))
        <a href="#included-excluded" class="mdc-tab mdc-tab--active" role="tab" aria-selected="true" tabindex="1">
          <span class="mdc-tab__content">
            <span class="mdc-tab__icon material-icons" aria-hidden="true">{{__("Included/Excluded")}}</span>
            <span class="mdc-tab__text-label">{{__("Included/Excluded")}}</span>
          </span>
          <span class="mdc-tab-indicator mdc-tab-indicator--active">
            <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
          </span>
          <span class="mdc-tab__ripple"></span>
        </a> 
        @endif
        @if($translation->itinerary)
        <a href="#itinerary" class="mdc-tab mdc-tab--active" role="tab" aria-selected="true" tabindex="2">
          <span class="mdc-tab__content">
            <span class="mdc-tab__icon material-icons" aria-hidden="true">{{__("Itinerary")}}</span>
            <span class="mdc-tab__text-label">{{__("Itinerary")}}</span>
          </span>
          <span class="mdc-tab-indicator mdc-tab-indicator--active">
            <span class="mdc-tab-indicator__content "></span>
          </span>
          <span class="mdc-tab__ripple"></span>
        </a>
        @endif
        @if($translation->faqs)
        <a href="#faqs" class="mdc-tab" role="tab" aria-selected="true" tabindex="3">
          <span class="mdc-tab__content">
            <span class="mdc-tab__icon material-icons" aria-hidden="true"></span>
            <span class="mdc-tab__text-label">{{__("FAQs")}}</span>
          </span>
          <span class="mdc-tab-indicator ">
            <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
          </span>
          <span class="mdc-tab__ripple"></span>
        </a>
        @endif
        <a href="#location" class="mdc-tab" role="tab" aria-selected="true" tabindex="4">
          <span class="mdc-tab__content">
            <span class="mdc-tab__icon material-icons" aria-hidden="true">{{__("Location")}}</span>
            <span class="mdc-tab__text-label">{{__("Location")}}</span>
          </span>
          <span class="mdc-tab-indicator">
            <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
          </span>
          <span class="mdc-tab__ripple"></span>
        </a>
         @if(setting_item('tour_enable_review'))
        <a href="#bravo-reviews" class="mdc-tab " role="tab" aria-selected="true" tabindex="5">
          <span class="mdc-tab__content">
            
            <span class="mdc-tab__icon material-icons" aria-hidden="true">{{__("Reviews")}}</span>
            <span class="mdc-tab__text-label">{{__("Reviews")}}</span>
          </span>
          <span class="mdc-tab-indicator ">
            <span class="mdc-tab-indicator__content"></span>
          </span>
          <span class="mdc-tab__ripple"></span>
        </a> 
        @endif
        @if(count($tour_related) > 0)
        <a href="#suggestion" class="mdc-tab mdc-tab--active" role="tab" aria-selected="true" tabindex="6">
          <span class="mdc-tab__content">
            <span class="mdc-tab__icon material-icons" aria-hidden="true">{{__("Suggestions")}}</span>
            <span class="mdc-tab__text-label">{{__("Suggestions")}}</span>
          </span>
          <span class="mdc-tab-indicator">
            <span class="mdc-tab-indicator__content"></span>
          </span>
          <span class="mdc-tab__ripple"></span>
        </a>
        @endif
      </div>
    </div>
       <button data-toggle="modal" data-target="#enquiry_form_modal" class="enquiry-item mdc-button mdc-button--raised">
  <span class="mdc-button__label">Have a Question!</span>
</button>
  </div>
</div>

