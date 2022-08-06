<form action="{{ route("tour.search") }}" class="bravo_form" method="get">
    <div class="custom-search-input-2">


        <?php
        $location_name = "";
        $list_json = [];
        $traverse = function ($locations, $prefix = '') use (&$traverse, &$list_json, &$location_name) {
            foreach ($locations as $location) {
                $translate = $location->translateOrOrigin(app()->getLocale());
                if (Request::query('location_id') == $location->id) {
                    $location_name = $translate->name;
                }
                $list_json[] = [
                    'id' => $location->id,
                    'title' => $prefix . ' ' . $translate->name,
                ];
                $traverse($location->children, $prefix . '-');
            }
        };
        $traverse($tour_location);
        ?>
        <div class="smart-search">
            <input type="text" class="smart-search-location parent_text form-control pl-4"
                   {{ ( empty(setting_item("tour_location_search_style")) or setting_item("tour_location_search_style") == "normal" ) ? "readonly" : ""  }} placeholder="{{__("Where are you going?")}}"
                   value="{{ $location_name }}" data-onLoad="{{__("Loading...")}}"
                   data-default="{{ json_encode($list_json) }}">
            <i class="icon_pin_alt"></i>
            <input type="hidden" class="child_id" name="location_id" value="{{Request::query('location_id')}}">
        </div>


        <div class="form-group mt-2">
            <input class="form-control" type="text" name="dates" ref="start_date_panagea" id="datepicker-form"
                   placeholder="When..">
            <i class="icon_calendar"></i>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="panel-dropdown">
                    <a href="#">Guests <span class="qtyTotal">1</span></a>
                    <div class="panel-dropdown-content">
                        <!-- Quantity Buttons -->
                        <div class="qtyButtons">
                            <label>Adults</label>
                            <input type="text" name="qtyInput" value="1">
                        </div>
                        <div class="qtyButtons">
                            <label>Childrens</label>
                            <input type="text" name="qtyInput" value="0">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <input type="submit" class="btn_search" value="Search">
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
</form>
<script src="https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.0/dist/index.umd.min.js"></script>
<script>

    // Initialize date picker
    const picker = new easepick.create({
        element: document.getElementById('datepicker-form'),
        css: [
            'https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.0/dist/index.css',
        ],
        setup(picker) {
            picker.on('select', (event) => {
                setTimeout(() => {
                    let guestDropdown = document.querySelector('#guests-dropdown > a')
                    guestDropdown.click()
                }, 100)

            })
        }
    })
</script>
