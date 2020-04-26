@extends('shared.layouts.master')
@section('title')
    Trang chủ
@endsection

@section('content')
    @include('shared.layouts.slide')
    <div class="container content">
		<div class="row mt-3">
			{{--  Noi dung chinh  --}}
			<div class="col-md-9 col-lg-9">
				<div class="row">
					{{--   Tin nổi bật, mới nhất chính   --}}
					@php
					$tin_noibat_1 = $tin_noibat->shift();
					@endphp
					<div class="col-md-7 home-left h-100">
						<div class="card">
							<a href="#" title="">
								<img src="shared_asset/upload/images/content/{{ $tin_noibat_1['imageorfile'] }}" class="card-img-top w-100 img-fluid" alt="">
							</a>						
							<div class="card-body p-2">
								<h6 class="card-title">
									<a href="#" title="">
										{{ $tin_noibat_1['title'] }}
									</a>
								</h6>
								<p class="card-text mb-0">
									<small class="text-muted">
										<i class="far fa-calendar-alt"></i> {{ $tin_noibat_1['created_at'] ? $tin_noibat_1['created_at']->format('d/m/Y H:h'):'' }}
										 
										<i class="far fa-eye"></i> {{ $tin_noibat_1['views'] }}
										 
										<i class="far fa-comments"></i> 0
									</small>
								</p>
								<p class="card-text mb-0">
									{{ $tin_noibat_1['abstract'] }}
								</p>
							</div>
						</div>
					</div>
					{{--  <!-- Tin nổi bật, tin mới slide -->  --}}
					<div class="col-md-5 home-right overflow-auto" style="height: 443.203px;">
						@foreach ($tin_noibat->all() as $tnb)
						<div class="card">
							<div class="row no-gutters">
								<div class="col-5">
									<a href="#">
										<img src="shared_asset/upload/images/content/{{ $tnb['imageorfile'] }}" class="w-100 img-fluid" alt="">
									</a>
								</div>
								<div class="col-7">
									<div class="card-body p-1">
										<h6 class="card-title mb-0">
											<a href="#">{{ $tnb['title'] }}</a>
										</h6>
									</div>						
								</div>
							</div>
						</div>
						@endforeach
						
					</div>
				</div>

				{{--  <!-- Thông tin cổ đông -->  --}}
				<div class="row mt-4">
					<div class="headline ml-3 w-100">
						<h6 class="d-inline p-1 pr-2">
							<i class="fas fa-newspaper"></i>
							<a href="#" class="ml-2 text-white">QUAN HỆ CỔ ĐÔNG</a>
						</h6>
					</div>

					{{--  Đại hội đồng cổ đông  --}}
					<div class="col-12 col-md-4">
						@php
						$tin_dhdcd = $dhdcd->Contents->where('status',1)->sortByDesc('created_at')->take(5);
						@endphp
						<div class="text-center mt-lg-3 mt-2">
							<h6 class="py-1 m-0">
								<a class="text-danger font_title text-uppercase font-weight-bold" href="#">{{ $dhdcd->name }}</a>
							</h6>
							<hr class="m-0 mb-2">
						</div>

						<img class="img-thumbnail img-fluid" src="shared_asset/upload/images/content/dhdcd-600x400.jpg" alt="">

						<div class="mt-2">
							<ul class="list-unstyled text-justify">
								@foreach ($tin_dhdcd as $item)
								<li class="font-weight-bold crop_text">
									<a href="#">
										{{ $item->title }}
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
								@endforeach
							</ul>

						</div>

					</div>
					{{--  <!-- Công bố thông tin -->  --}}
					<div class="col-12 col-md-4">
						@php
						$tin_cbtt = $cbtt->Contents->where('status',1)->sortByDesc('created_at')->take(5);
						@endphp
						<div class="text-center mt-lg-3 mt-2">
							<h6 class="py-1 m-0">
								<a class="text-danger font_title text-uppercase font-weight-bold" href="#">{{ $cbtt->name }}</a>
							</h6>
							<hr class="m-0 mb-2">
						</div>

						<img class="img-thumbnail img-fluid" src="shared_asset/upload/images/content/congbo-thongtin-600-400.jpg" alt="">

						<div class="mt-2">
							<ul class="list-unstyled text-justify">
								@foreach ($tin_cbtt as $item)
								<li class="font-weight-bold crop_text">
									<a href="#">
										{{ $item->title }}
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
								@endforeach
							</ul>

						</div>

					</div>
					{{--  Báo cáo tài chính  --}}
					<div class="col-12 col-md-4">
						@php
						$tin_bctc = $bctc->Contents->where('status',1)->sortByDesc('created_at')->take(5);
						@endphp
						<div class="text-center mt-lg-3 mt-2">
							<h6 class="py-1 m-0">
								<a class="text-danger font_title text-uppercase font-weight-bold" href="#">{{ $bctc->name }}</a>
							</h6>
							<hr class="m-0 mb-2">
						</div>

						<img class="img-thumbnail img-fluid" src="shared_asset/upload/images/content/BCTC-600x400.jpg" alt="">

						<div class="mt-2">
							<ul class="list-unstyled text-justify">
								@foreach ($tin_bctc as $item)
								<li class="font-weight-bold crop_text">
									<a href="#">
										{{ $item->title }}
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
								@endforeach
							</ul>
						</div>
					</div>
					{{--  <!-- Ý kiến cổ đông -->  --}}
					
				</div>

				{{--  <!-- TIN TỨC - SỰ KIỆN -->  --}}
				<div class="row mt-4">
					<div class="headline w-100 ml-3">
						<h6 class="d-inline p-1 pr-2">
							<i class="fas fa-newspaper"></i>
							<a href="#" class="ml-2 text-white">TIN TỨC - SỰ KIỆN</a>
						</h6>
					</div>

					{{--  <!-- THÔNG TIN HOẠT ĐỘNG -->  --}}
					<div class="col-12 col-md-4">
						@php
						$tin_tthd = $thongtinhd->Contents->where('status',1)->sortByDesc('created_at')->take(5);
						$tin_tthd_1 = $tin_tthd->shift();
						@endphp
						<div class="text-center mt-lg-3 mt-2">
							<h6 class="py-1 m-0">
								<a class="text-danger font_title text-uppercase font-weight-bold" href="#">{{ $thongtinhd->name }}</a>
							</h6>
							<hr class="m-0 mb-2">
						</div>
						<div class="card">
							<img src="shared_asset/upload/images/content/{{ $tin_tthd_1['imageorfile'] }}" class="card-img-top w-100" alt="">
							<div class="card-body p-2">
								<h6 class="card-title">
									{{ $tin_tthd_1['title'] }}
								</h6>
								<p class="card-text m-0 crop_text">
									{{ $tin_tthd_1['abstract'] }}
								</p>
								<a href="#" class="stretched-link"></a>
							</div>
						</div>
						@foreach ($tin_tthd->all() as $tin)
						<div class="row my-1">
							<div class="col-4">
								<a href="#">
									<img src="shared_asset/upload/images/content/{{ $tin['imageorfile'] }}" class="w-100 img-fluid" alt="">
								</a>
							</div>

							<div class="col-8 pl-0">
								<h6 class="text-justify">
									<a href="#" class="crop_text">
										{{ $tin['title'] }}
									</a>
								</h6>
							</div>
						</div>
						<hr class="m-0 mb-2">
						@endforeach
					</div>

					{{--  <!-- ĐẢNG - ĐOÀN THỂ -->  --}}
					<div class="col-12 col-md-4">
						@php
						$tin_dangdoan = $dangdoanthe->Contents->where('status',1)->sortByDesc('created_at')->take(5);
						$tin_dangdoan_1 = $tin_dangdoan->shift();
						@endphp
						<div class="text-center mt-lg-3 mt-2">
							<h6 class="py-1 m-0">
								<a class="text-danger font_title text-uppercase font-weight-bold" href="#">{{ $dangdoanthe->name }}</a>
							</h6>
							<hr class="m-0 mb-2">
						</div>
						<div class="card">
							<img src="shared_asset/upload/images/content/{{ $tin_dangdoan_1['imageorfile'] }}" class="card-img-top w-100" alt="">
							<div class="card-body p-2">
								<h6 class="card-title">
									{{ $tin_dangdoan_1['title'] }}
								</h6>
								<p class="card-text m-0 crop_text">
									{{ $tin_dangdoan_1['abstract'] }}
								</p>
								<a href="#" class="stretched-link"></a>
							</div>
						</div>
						@foreach ($tin_dangdoan->all() as $tin)
						<div class="row my-1">
							<div class="col-4">
								<a href="#">
									<img src="shared_asset/upload/images/content/{{ $tin['imageorfile'] }}" class="w-100 img-fluid" alt="">
								</a>
							</div>

							<div class="col-8 pl-0">
								<h6 class="text-justify">
									<a href="#" class="crop_text">
										{{ $tin['title'] }}
									</a>
								</h6>
							</div>
						</div>
						<hr class="m-0 mb-2">
						@endforeach
					</div>

					{{--  <!-- BÀI VIẾT SBA -->  --}}
					<div class="col-12 col-md-4">
						@php
						$tin_sba = $baivietsba->Contents->where('status',1)->sortByDesc('created_at')->take(5);
						$tin_sba_1 = $tin_sba->shift();
						@endphp
						<div class="text-center mt-lg-3 mt-2">
							<h6 class="py-1 m-0">
								<a class="text-danger font_title text-uppercase font-weight-bold" href="#">{{ $baivietsba->name }}</a>
							</h6>
							<hr class="m-0 mb-2">
						</div>
						<div class="card">
							<img src="shared_asset/upload/images/content/{{ $tin_sba_1['imageorfile'] }}" class="card-img-top w-100" alt="">
							<div class="card-body p-2">
								<h6 class="card-title">
									{{ $tin_sba_1['title'] }}
								</h6>
								<p class="card-text m-0 crop_text">
									{{ $tin_sba_1['abstract'] }}
								</p>
								<a href="#" class="stretched-link"></a>
							</div>
						</div>
						@foreach ($tin_sba->all() as $tin)
						<div class="row my-1">
							<div class="col-4">
								<a href="#">
									<img src="shared_asset/upload/images/content/{{ $tin['imageorfile'] }}" class="w-100 img-fluid" alt="">
								</a>
							</div>

							<div class="col-8 pl-0">
								<h6 class="text-justify">
									<a href="#" class="crop_text">
										{{ $tin['title'] }}
									</a>
								</h6>
							</div>
						</div>
						<hr class="m-0 mb-2">
						@endforeach
					</div>
				</div>
			</div>


			{{--  <!-- Tin lien quan - inside -->  --}}
			<div class="col-md-3 col-lg-3 inside">
				{{--  <!-- THÔNG BÁO -->  --}}
				<div class="row">
					<div class="col-12">
						<h5 class="text-center p-2 banner_inside text-white">
							THÔNG BÁO
						</h5>
						<ul class="list-unstyled text-justify">
							@foreach ($tin_thongbao as $tin)
							<li>
								<a href="#">
									{{ $tin->title }}
								</a>
							</li>
							<li>
								<hr class="my-1">
							</li>
							@endforeach
						</ul>
					</div>
				</div>
				{{--  <!-- TÌNH HÌNH SẢN XUẤT -->  --}}
				<div class="row">
					<div class="col-12">
						<h5 class="text-center p-2 banner_inside text-white">
							TÌNH HÌNH SẢN XUẤT
						</h5>
						<div class="thsx">
							<div class="thsx_kd">
								<div class="thsx_kd_top text-center">
									<h6 class="text-danger font-weight-bold">Ngày: 30/12/2019</h6>
									<h5 class="text-primary font-weight-bold">NHÀ MÁY KHE DIÊN</h5>
								</div>
								<div class="thsx_kd_info">
									<table class="table table-borderless">
										<tbody>
											<tr>
												<td>
													<span class="text-primary">Công suất (MW): </span>
												</td>
												<td class="text-danger text-right">
													0,0<span class="text-dark"> / </span>9,0
												</td>
											</tr>
											<tr>
												<td>
													<span class="text-primary">Sản lượng: </span>
												</td>
												<td class="text-right">
													<span>(triệu KWh)</span>
												</td>
											</tr>
											<tr>
												<td class="pl-3">
													<span>Ngày: </span>
												</td>
												<td class="text-right">
													<span class="text-danger">0,000</span>
												</td>
											</tr>
											<tr>
												<td class="pl-3">
													<span>Tháng: </span>
												</td>
												<td class="text-right">
													<span class="text-danger">0,867</span>
												</td>
											</tr>
											<tr>	
												<td class="pl-3">
													<span>Năm: </span>
												</td>
												<td class="text-right text-danger">
													<span>20,240</span><span class="text-dark"> / </span> <span>34</span>
												</td>
											</tr>
											<tr>
												<td>
													<span class="text-primary">Mực nước hồ: </span>
												</td>
												<td class="text-right">
													<span>(m)</span>
												</td>
											</tr>
											<tr>
												<td class="pl-3">
													<span>Tối thiểu:</span>
												</td>
												<td class="text-right">
													<span>187,40</span>
												</td>
											</tr>
											<tr class="text-danger">
												<td class="pl-3">
													<span>Hiện tại:</span>
												</td>
												<td class="text-right">
													<span>203,87</span>
												</td>
											</tr>
											<tr>
												<td class="pl-3">
													<span>Tối đa:</span>
												</td>
												<td class="text-right">
													<span>206,94</span>
												</td>
											</tr>
											<tr>
												<td>
													<span class="text-primary">Tình trạng thiết bị: </span>
												</td>
												<td class="text-right">
													<span>Tốt, dừng dự phòng</span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<hr class="my-3 bg-dark">
							<div class="thsx_kn">
								<div class="thsx_kn_top text-center">
									<h6 class="text-danger font-weight-bold">Ngày: 30/12/2019</h6>
									<h5 class="text-primary font-weight-bold">NHÀ MÁY KRÔNG HNĂNG</h5>
								</div>
								<div class="thsx_kn_info">
									<table class="table table-borderless">
										<tbody>
											<tr>
												<td>
													<span class="text-primary">Công suất (MW): </span>
												</td>
												<td class="text-danger text-right">
													0,0<span class="text-dark"> / </span>9,0
												</td>
											</tr>
											<tr>
												<td>
													<span class="text-primary">Sản lượng: </span>
												</td>
												<td class="text-right">
													<span>(triệu KWh)</span>
												</td>
											</tr>
											<tr>
												<td class="pl-3">
													<span>Ngày: </span>
												</td>
												<td class="text-right">
													<span class="text-danger">0,000</span>
												</td>
											</tr>
											<tr>
												<td class="pl-3">
													<span>Tháng: </span>
												</td>
												<td class="text-right">
													<span class="text-danger">0,867</span>
												</td>
											</tr>
											<tr>	
												<td class="pl-3">
													<span>Năm: </span>
												</td>
												<td class="text-right text-danger">
													<span>20,240</span><span class="text-dark"> / </span> <span>34</span>
												</td>
											</tr>
											<tr>
												<td>
													<span class="text-primary">Mực nước hồ: </span>
												</td>
												<td class="text-right">
													<span>(m)</span>
												</td>
											</tr>
											<tr>
												<td class="pl-3">
													<span>Tối thiểu:</span>
												</td>
												<td class="text-right">
													<span>187,40</span>
												</td>
											</tr>
											<tr class="text-danger">
												<td class="pl-3">
													<span>Hiện tại:</span>
												</td>
												<td class="text-right">
													<span>203,87</span>
												</td>
											</tr>
											<tr>
												<td class="pl-3">
													<span>Tối đa:</span>
												</td>
												<td class="text-right">
													<span>206,94</span>
												</td>
											</tr>
											<tr>
												<td>
													<span class="text-primary">Tình trạng thiết bị: </span>
												</td>
												<td class="text-right">
													<span>Tốt, dừng dự phòng</span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="text-center">
							<a href="#" class="text-primary"> Xem thông tin các ngày khác</a>
						</div>
					</div>
				</div>

				{{--  <!-- THÔNG TIN CỔ PHIẾU -->  --}}
				<div class="row mt-3">
					<div class="col-12 ttcp">
						<h5 class="text-center p-2 banner_inside text-white">
							THÔNG TIN CỔ PHIẾU
						</h5>
						<script src="https://www.fireant.vn/Scripts/web/widgets.js"></script>
						<div><iframe class="fireant-widget" id="fan-quote-117" src="https://www.fireant.vn/Widgets/Quote?container_id=fan-quote-117&amp;symbols=SBA&amp;locale=vi&amp;price_line_color=%2371BDDF&amp;grid_color=%23999999&amp;label_color=%23999999&amp;height=200px" width="100%" height="508px" frameborder="0" allowtransparency="true" scrolling="no"></iframe></div>
						<script type="text/javascript">
							new FireAnt.QuoteWidget({
								"container_id": "fan-quote-117",
								"symbols": "SBA",
								"locale": "vi",
								"price_line_color": "#71BDDF",
								"grid_color": "#999999",
								"label_color": "#999999",
								"width": "100%",
								"height": "200px"
							});
						</script>
					</div>
				</div>

				<div class="row d-none d-lg-block">
					<div class="col-12">
						<h5 class="text-center p-2 banner_inside text-white">
							THÔNG TIN WINDY
						</h5>
						<iframe width="100%" height="350" src="https://embed.windy.com/embed2.html?lat=16.069&lon=108.221&zoom=5&level=surface&overlay=wind&menu=&message=&marker=&calendar=&pressure=&type=map&location=coordinates&detail=&detailLat=16.069&detailLon=108.221&metricWind=default&metricTemp=default&radarRange=-1" frameborder="0"></iframe>
					</div>
				</div>
				{{--  <!-- LIÊN KẾT -->  --}}
				<div class="row mt-3">
					<div class="col-12">
						<h5 class="text-center p-2 banner_inside text-white">
							LIÊN KẾT
						</h5>
						<div class="evncpc text-center">
							<a href="https://cpc.vn/vi-vn/" target="_blank">
							<img src="shared_asset/upload/images/LOGO_EVNCPC.png" alt="">
							<p>Tổng công ty Điện lực miền Trung</p>
							</a>
						</div>	
						<hr class="my-3">					
					</div>
					<div class="col-12 mt-3">
						<div class="soffice text-center w-100">
							<a href="http://office.songba.vn:8080/security/login.aspx" target="_blank">
							<img src="shared_asset/upload/images/LOGO.png" alt="" class="w-25">
							<p>S.Office nội bộ SBA</p>
							</a>
						</div>
						<hr class="my-3">
					</div>
				</div>

			</div>
		</div>
	</div>
@endsection