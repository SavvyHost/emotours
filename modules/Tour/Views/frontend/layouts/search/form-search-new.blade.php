    <form action="{{ route("tour.search") }}" method="get">
							<div class="custom-search-input-2">
								<div class="form-group">
									<input class="form-control" type="text" placeholder="Where..." id="autocomplete">
									<i class="icon_pin_alt"></i>
								</div>
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
                                                'id'    => $location->id,
                                                'title' => $prefix.' '.$translate->name,
                                            ];
                                            $traverse($location->children, $prefix.'-');
                                        }
                                    };
                                    $traverse($tour_location);
                                    ?>
                                    <div class="smart-search form-content">
                                        <input list="locations" type="text" class="smart-search-location parent_text form-control" {{ ( empty(setting_item("tour_location_search_style")) )}} placeholder="{{__("Where are you going?")}}" value="{{ $location_name }}" data-onLoad="{{__("Loading...")}}">
                                       <datalist id="locations">
                                            @foreach($list_json as $location)
                                                <option value="{{$location['title']}}"></option>
                                            @endforeach
                                        </datalist>
                                        <input type="hidden" name="" id="autocomplete">
                                    </div>
								<div class="form-group">
									<input class="form-control" type="text" name="dates"  ref="start_date_panagea" id="datepicker"  placeholder="When..">
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

                        <script>
                            // Initialize date picker
                            const picker = new easepick.create({
                                element: document.getElementById('datepicker'),
                                css: [
                                    '{{ asset('css/easepick.css') }}',
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