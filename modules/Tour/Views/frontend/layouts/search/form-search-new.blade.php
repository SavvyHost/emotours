<form action="{{ route("tour.search") }}" class="bravo_form new_design" method="get">
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
            <input type="text" class="smart-search-location parent_text form-control pl-4" placeholder="{{__("Where are you going?")}}"
                   value="{{ $location_name }}" data-onLoad="{{__("Loading...")}}"
                   data-default="{{ json_encode($list_json) }}">
            <i class="icon_pin_alt"></i>
            <input type="hidden" class="child_id" name="location_id" value="{{Request::query('location_id')}}">
        </div>


        <div class="form-group mt-2">
            <input class="form-control bg-white" type="text" name="dates" ref="start_date_panagea" id="datepicker-form"
                   placeholder="When..">
            <label for="datepicker-form">
                <i class="icon_calendar"></i>
            </label>
        </div>
        <div class="col-6 ml-auto p-0">
            <div class="form-group">
                <input type="submit" class="btn_search" value="Search">
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
