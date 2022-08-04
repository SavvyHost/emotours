<form action="{{ route("tour.search") }}" method="get">
							<div class="custom-search-input-2">
								<div class="form-group">
									<input class="form-control" type="text" placeholder="Where..." id="autocomplete">
									<i class="icon_pin_alt"></i>
								</div>
								<div class="form-group">
									<input class="form-control" type="text" name="dates"  ref="start_date_panagea" id="datepicker" value="@{{start_date_html}}"  placeholder="When..">
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