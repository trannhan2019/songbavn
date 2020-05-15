@extends('shared.layouts.master')
@section('title')
    Trang chủ
@endsection

@section('content')
    @include('shared.layouts.slide')
    <div class="container content">
		<div class="row mt-3">
			<div class="col-md-9 col-lg-9">
				<div class="row">
					{{--   Tin nổi bật, mới nhất chính   --}}
					@php
					$tin_noibat_1 = $tin_noibat->shift();
					@endphp
					<div class="col-md-7 home-left h-100">
						<div class="card">
							<a href="{{ $tin_noibat_1->Menu->Parent->slug }}/{{ $tin_noibat_1->Menu->id }}/{{ $tin_noibat_1->id }}/{{ $tin_noibat_1->slug }}.html" title="">
								<img src="shared_asset/upload/images/content/{{ $tin_noibat_1['imageorfile'] }}" class="card-img-top w-100 img-fluid" alt="">
							</a>						
							<div class="card-body p-2">
								<h6 class="card-title">
									<a href="{{ $tin_noibat_1->Menu->Parent->slug }}/{{ $tin_noibat_1->Menu->id }}/{{ $tin_noibat_1->id }}/{{ $tin_noibat_1->slug }}.html" title="">
										{{ $tin_noibat_1['title'] }}
									</a>
								</h6>
								<p class="card-text mb-0">
									<small class="text-muted">
										<i class="far fa-calendar-alt"></i> {{ $tin_noibat_1['created_at'] ? $tin_noibat_1['created_at']->format('d/m/Y H:i'):'' }}
										 
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
					<div class="col-md-5 home-right overflow-auto">
						@foreach ($tin_noibat->all() as $tnb)
						<div class="card">
							<div class="row no-gutters d-flex align-content-center" style="height: 100px;">
								<div class="col-5 ">
									<a href="{{ $tnb->Menu->Parent->slug }}/{{ $tnb->Menu->id }}/{{ $tnb->id }}/{{ $tnb->slug }}.html">
										<img src="shared_asset/upload/images/content/{{ $tnb['imageorfile'] }}" class="w-100 img-fluid" alt="">
									</a>
								</div>
								<div class="col-7">
									<div class="card-body p-1">
										<h6 class="card-title mb-0 crop_text_3">
											<a href="{{ $tnb->Menu->Parent->slug }}/{{ $tnb->Menu->id }}/{{ $tnb->id }}/{{ $tnb->slug }}.html">{{ $tnb['title'] }}</a>
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
						$tin1_dhdcd = $tin_dhdcd->shift();
						@endphp
						<div class="text-center mt-lg-3 mt-2">
							<h6 class="py-1 m-0">
								<a class="text-danger font_title text-uppercase font-weight-bold" href="{{ $dhdcd->Parent->slug }}/{{ $dhdcd->id }}.html">{{ $dhdcd->name }}</a>
							</h6>
							<hr class="m-0 mb-2">
						</div>

						<img class="img-thumbnail img-fluid" src="shared_asset/upload/images/content/dhdcd-600x400.jpg" alt="">

						<div class="mt-2">
							<ul class="list-unstyled text-justify">
								<li class="font-weight-bold crop_text">
									<a href="{{ $tin1_dhdcd->Menu->Parent->slug }}/{{ $tin1_dhdcd->Menu->id }}/{{ $tin1_dhdcd->id }}/{{ $tin1_dhdcd->slug }}.html">
										{{ $tin1_dhdcd['title'] }}
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
								@foreach ($tin_dhdcd->all() as $item)
								<li class="crop_text">
									<a href="{{ $item->Menu->Parent->slug }}/{{ $item->Menu->id }}/{{ $item->id }}/{{ $item->slug }}.html">
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
						$tin1_cbtt = $tin_cbtt->shift();
						@endphp
						<div class="text-center mt-lg-3 mt-2">
							<h6 class="py-1 m-0">
								<a class="text-danger font_title text-uppercase font-weight-bold" href="{{ $cbtt->Parent->slug }}/{{ $cbtt->id }}.html">{{ $cbtt->name }}</a>
							</h6>
							<hr class="m-0 mb-2">
						</div>

						<img class="img-thumbnail img-fluid" src="shared_asset/upload/images/content/congbo-thongtin-600-400.jpg" alt="">

						<div class="mt-2">
							<ul class="list-unstyled text-justify">
								<li class="font-weight-bold crop_text">
									<a href="{{ $tin1_cbtt->Menu->Parent->slug }}/{{ $tin1_cbtt->Menu->id }}/{{ $tin1_cbtt->id }}/{{ $tin1_cbtt->slug }}.html">
										{{ $tin1_cbtt['title'] }}
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
								@foreach ($tin_cbtt->all() as $item)
								<li class="crop_text">
									<a href="{{ $item->Menu->Parent->slug }}/{{ $item->Menu->id }}/{{ $item['id'] }}/{{ $item['slug'] }}.html">
										{{ $item['title'] }}
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
						$tin1_bctc = $tin_bctc->shift();
						@endphp
						<div class="text-center mt-lg-3 mt-2">
							<h6 class="py-1 m-0">
								<a class="text-danger font_title text-uppercase font-weight-bold" href="{{ $bctc->Parent->slug }}/{{ $bctc->id }}.html">{{ $bctc->name }}</a>
							</h6>
							<hr class="m-0 mb-2">
						</div>

						<img class="img-thumbnail img-fluid" src="shared_asset/upload/images/content/BCTC-600x400.jpg" alt="">

						<div class="mt-2">
							<ul class="list-unstyled text-justify">
								<li class="font-weight-bold crop_text">
									<a href="{{ $tin1_bctc->Menu->Parent->slug }}/{{ $tin1_bctc->Menu->id }}/{{ $tin1_bctc['id'] }}/{{ $tin1_bctc['slug'] }}.html">
										{{ $tin1_bctc['title'] }}
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
								@foreach ($tin_bctc->all() as $item)
								<li class="crop_text">
									<a href="{{ $item->Menu->Parent->slug }}/{{ $item->Menu->id }}/{{ $item['id'] }}/{{ $item['slug'] }}.html">
										{{ $item['title'] }}
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
								@endforeach
							</ul>
						</div>
					</div>
					{{--  Báo cáo thường niên  --}}
					<div class="col-12 col-md-4">
						@php
						$tin_bctn = $bctn->Contents->where('status',1)->sortByDesc('created_at')->take(5);
						$tin1_bctn = $tin_bctn->shift();
						@endphp
						<div class="text-center mt-lg-3 mt-2">
							<h6 class="py-1 m-0">
								<a class="text-danger font_title text-uppercase font-weight-bold" href="{{ $bctn->Parent->slug }}/{{ $bctn->id }}.html">{{ $bctn->name }}</a>
							</h6>
							<hr class="m-0 mb-2">
						</div>

						<img class="img-thumbnail img-fluid" src="shared_asset/upload/images/content/bctn-600x400.jpg" alt="">

						<div class="mt-2">
							<ul class="list-unstyled text-justify">
								<li class="font-weight-bold crop_text">
									<a href="{{ $tin1_bctn->Menu->Parent->slug }}/{{ $tin1_bctn->Menu->id }}/{{ $tin1_bctn['id'] }}/{{ $tin1_bctn['slug'] }}.html">
										{{ $tin1_bctn['title'] }}
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
								@foreach ($tin_bctn->all() as $item)
								<li class="crop_text">
									<a href="{{ $item->Menu->Parent->slug }}/{{ $item->Menu->id }}/{{ $item['id'] }}/{{ $item['slug'] }}.html">
										{{ $item['title'] }}
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
								@endforeach
							</ul>
						</div>
					</div>
					{{--  Tình hình quản trị  --}}
					<div class="col-12 col-md-4">
						@php
						$tin_thqt = $thqt->Contents->where('status',1)->sortByDesc('created_at')->take(5);
						$tin1_thqt = $tin_thqt->shift();
						@endphp
						<div class="text-center mt-lg-3 mt-2">
							<h6 class="py-1 m-0">
								<a class="text-danger font_title text-uppercase font-weight-bold" href="{{ $thqt->Parent->slug }}/{{ $thqt->id }}.html">{{ $thqt->name }}</a>
							</h6>
							<hr class="m-0 mb-2">
						</div>

						<img class="img-thumbnail img-fluid" src="shared_asset/upload/images/content/thqt-600x400.jpg" alt="">

						<div class="mt-2">
							<ul class="list-unstyled text-justify">
								<li class="font-weight-bold crop_text">
									<a href="{{ $tin1_thqt->Menu->Parent->slug }}/{{ $tin1_thqt->Menu->id }}/{{ $tin1_thqt['id'] }}/{{ $tin1_thqt['slug'] }}.html">
										{{ $tin1_thqt['title'] }}
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
								@foreach ($tin_thqt->all() as $item)
								<li class="crop_text">
									<a href="{{ $item->Menu->Parent->slug }}/{{ $item->Menu->id }}/{{ $item['id'] }}/{{ $item['slug'] }}.html">
										{{ $item['title'] }}
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
					<div class="col-12 col-md-4">
						@php
						$tin_ykien = $ykien_ndt->Ykiens->where('status',1)->sortByDesc('created_at')->take(5);
						$tin1_ykien = $tin_ykien->shift();
						@endphp
						<div class="text-center mt-lg-3 mt-2">
							<h6 class="py-1 m-0">
								<a class="text-danger font_title text-uppercase font-weight-bold" href="{{ $ykien_ndt->Parent->slug }}/{{ $ykien_ndt->id }}/{{ $ykien_ndt->slug }}.html">{{ $ykien_ndt->name }}</a>
							</h6>
							<hr class="m-0 mb-2">
						</div>

						<img class="img-thumbnail img-fluid" src="shared_asset/upload/images/content/q-a-600x400.jpg" alt="">

						<div class="mt-2">
							<ul class="list-unstyled text-justify">
								<li class="crop_text font-weight-bold">
									<a href="{{ $tin1_ykien->Menu->id }}/{{ $tin1_ykien['id'] }}/detail-{{ $tin1_ykien->Menu->slug }}.html">
										{!! $tin1_ykien['ask_content'] !!}
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
								@foreach ($tin_ykien->all() as $item)
								<li class="crop_text">
									<a href="{{ $item->Menu->id }}/{{ $item['id'] }}/detail-{{ $item->Menu->slug }}.html">
										{!! $item['ask_content'] !!}
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
								@endforeach
							</ul>
						</div>
					</div>
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
								<a class="text-danger font_title text-uppercase font-weight-bold" href="{{ $thongtinhd->Parent->slug }}/{{ $thongtinhd->id }}.html">{{ $thongtinhd->name }}</a>
							</h6>
							<hr class="m-0 mb-2">
						</div>
						<div class="card">
							<img src="shared_asset/upload/images/content/{{ $tin_tthd_1['imageorfile'] }}" class="img-fluid" alt="">
							<div class="card-body p-2" style="height: 150px;">
								<h6 class="card-title">
									{{ $tin_tthd_1['title'] }}
								</h6>
								<p class="card-text m-0 crop_text">
									{{ $tin_tthd_1['abstract'] }}
								</p>
								<a href="{{ $tin_tthd_1->Menu->Parent->slug }}/{{ $tin_tthd_1->Menu->id }}/{{ $tin_tthd_1['id'] }}/{{ $tin_tthd_1['slug'] }}.html" class="stretched-link"></a>
							</div>
						</div>
						@foreach ($tin_tthd->all() as $tin)
						<div class="row my-1">
							<div class="col-4">
								<a href="{{ $tin->Menu->Parent->slug }}/{{ $tin->Menu->id }}/{{ $tin->id }}/{{ $tin->slug }}.html">
									<img src="shared_asset/upload/images/content/{{ $tin['imageorfile'] }}" class="w-100 img-fluid" alt="">
								</a>
							</div>

							<div class="col-8 pl-0">
								<h6 class="text-justify">
									<a href="{{ $tin->Menu->Parent->slug }}/{{ $tin->Menu->id }}/{{ $tin['id'] }}/{{ $tin['slug'] }}.html" class="crop_text">
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
								<a class="text-danger font_title text-uppercase font-weight-bold" href="{{ $dangdoanthe->Parent->slug }}/{{ $dangdoanthe->id }}.html">{{ $dangdoanthe->name }}</a>
							</h6>
							<hr class="m-0 mb-2">
						</div>
						<div class="card">
							<img src="shared_asset/upload/images/content/{{ $tin_dangdoan_1['imageorfile'] }}" class="img-fluid" alt="">
							<div class="card-body p-2" style="height: 150px;">
								<h6 class="card-title">
									{{ $tin_dangdoan_1['title'] }}
								</h6>
								<p class="card-text m-0 crop_text">
									{{ $tin_dangdoan_1['abstract'] }}
								</p>
								<a href="{{ $tin_dangdoan_1->Menu->Parent->slug }}/{{ $tin_dangdoan_1->Menu->id }}/{{ $tin_dangdoan_1['id'] }}/{{ $tin_dangdoan_1['slug'] }}.html" class="stretched-link"></a>
							</div>
						</div>
						@foreach ($tin_dangdoan->all() as $tin)
						<div class="row my-1">
							<div class="col-4">
								<a href="{{ $tin->Menu->Parent->slug }}/{{ $tin->Menu->id }}/{{ $tin['id'] }}/{{ $tin['slug'] }}.html">
									<img src="shared_asset/upload/images/content/{{ $tin['imageorfile'] }}" class="w-100 img-fluid" alt="">
								</a>
							</div>

							<div class="col-8 pl-0">
								<h6 class="text-justify">
									<a href="{{ $tin->Menu->Parent->slug }}/{{ $tin->Menu->id }}/{{ $tin['id'] }}/{{ $tin['slug'] }}.html" class="crop_text">
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
								<a class="text-danger font_title text-uppercase font-weight-bold" href="{{ $baivietsba->Parent->slug }}/{{ $baivietsba->id }}.html">{{ $baivietsba->name }}</a>
							</h6>
							<hr class="m-0 mb-2">
						</div>
						<div class="card">
							<img src="shared_asset/upload/images/content/{{ $tin_sba_1['imageorfile'] }}" class="img-fluid" alt="">
							<div class="card-body p-2" style="height: 150px;">
								<h6 class="card-title">
									{{ $tin_sba_1['title'] }}
								</h6>
								<p class="card-text m-0 crop_text">
									{{ $tin_sba_1['abstract'] }}
								</p>
								<a href="{{ $tin_sba_1->Menu->Parent->slug }}/{{ $tin_sba_1->Menu->id }}/{{ $tin_sba_1['id'] }}/{{ $tin_sba_1['slug'] }}.html" class="stretched-link"></a>
							</div>
						</div>
						@foreach ($tin_sba->all() as $tin)
						<div class="row my-1">
							<div class="col-4">
								<a href="{{ $tin->Menu->Parent->slug }}/{{ $tin->Menu->id }}/{{ $tin['id'] }}/{{ $tin['slug'] }}.html">
									<img src="shared_asset/upload/images/content/{{ $tin['imageorfile'] }}" class="w-100 img-fluid" alt="">
								</a>
							</div>

							<div class="col-8 pl-0">
								<h6 class="text-justify">
									<a href="{{ $tin->Menu->Parent->slug }}/{{ $tin->Menu->id }}/{{ $tin['id'] }}/{{ $tin['slug'] }}.html" class="crop_text">
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
								<a href="{{ $tin->Menu->Parent->slug }}/{{ $tin->Menu->id }}/{{ $tin->id }}/{{ $tin->slug }}.html">
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
									<h6 class="text-danger font-weight-bold">Ngày: {{ date("d/m/Y", strtotime($thsxkd->date))}}</h6>
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
													<span class="text-danger">{{ number_format($thsxkd->power, 1, ',', '.') }}</span>
													<span class="text-dark"> / </span>
													<span class="text-danger">{{ number_format($thsxkd->Muctieunam->ratedpower,1,',','.') }}</span>
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
													<span class="text-danger">{{ number_format($thsxkd->quantity, 3, ',', '.') }}</span>
												</td>
											</tr>
											@php
											$month_kd = date("m", strtotime($thsxkd->date));
											$year_kd = date("Y", strtotime($thsxkd->date));
											$muctieunam_kd = $thsxkd->Muctieunam->id;
											$sum_month_kd = \App\Thsx::whereYear('date', $year_kd)
											->whereMonth('date', $month_kd)->where('muctieunam_id',$muctieunam_kd)
											->sum('quantity');
											$sum_year_kd = \App\Thsx::whereYear('date', $year_kd)->where('muctieunam_id',$muctieunam_kd)
											->sum('quantity');
											@endphp
											<tr>
												<td class="pl-3">
													<span>Tháng: </span>
												</td>
												<td class="text-right">
													<span class="text-danger">{{ number_format($sum_month_kd, 3, ',', '.') }}</span>
												</td>
											</tr>
											<tr>	
												<td class="pl-3">
													<span>Năm: </span>
												</td>
												<td class="text-right text-danger">
													<span>{{ number_format($sum_year_kd, 3, ',', '.') }}</span><span class="text-dark"> / </span> <span>{{number_format($thsxkd->Muctieunam->quantity,3,',','.') }}</span>
												</td>
											@if (Auth::check())
												@if (Auth::user()->role==1 || Auth::user()->role==2)
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
														<span>{{number_format($thsxkd->Muctieunam->MNHlowest,2,',','.') }}</span>
													</td>
												</tr>
												<tr class="text-danger">
													<td class="pl-3">
														<span>Hiện tại:</span>
													</td>
													<td class="text-right">
														<span>{{number_format($thsxkd->MNH,2,',','.') }}</span>
													</td>
												</tr>
												<tr>
													<td class="pl-3">
														<span>Tối đa:</span>
													</td>
													<td class="text-right">
														<span>{{number_format($thsxkd->Muctieunam->MNHnormal,2,',','.') }}</span>
													</td>
												</tr>
												<tr>
													<td>
														<span class="text-primary">Lượng mưa (mm): </span>
													</td>
													<td class="text-right">
														<span class="text-danger">{{number_format($thsxkd->rain,1,',','.') }}</span>
													</td>
												</tr>
												@endif
											@endif
											
											<tr>
												<td>
													<span class="text-primary">Tình trạng thiết bị: </span>
												</td>
												<td class="text-right">
													<span>{{ $thsxkd->device }}</span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<hr class="my-3 bg-dark">
							<div class="thsx_kn">
								<div class="thsx_kn_top text-center">
									<h6 class="text-danger font-weight-bold">Ngày: {{ date("d/m/Y", strtotime($thsxkn->date))}}</h6>
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
													<span class="text-danger">{{ number_format($thsxkn->power, 1, ',', '.') }}</span>
													<span class="text-dark"> / </span>
													<span class="text-danger">{{ number_format($thsxkn->Muctieunam->ratedpower,1,',','.') }}</span>
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
													<span class="text-danger">{{ number_format($thsxkn->quantity, 3, ',', '.') }}</span>
												</td>
											</tr>
											@php
											$month_kn = date("m", strtotime($thsxkn->date));
											$year_kn = date("Y", strtotime($thsxkn->date));
											$muctieunam_kn = $thsxkn->Muctieunam->id;
											$sum_month_kn = \App\Thsx::whereYear('date', $year_kn)
											->whereMonth('date', $month_kn)->where('muctieunam_id',$muctieunam_kn)
											->sum('quantity');
											$sum_year_kn = \App\Thsx::whereYear('date', $year_kn)->where('muctieunam_id',$muctieunam_kn)
											->sum('quantity');
											@endphp
											<tr>
												<td class="pl-3">
													<span>Tháng: </span>
												</td>
												<td class="text-right">
													<span class="text-danger">{{ number_format($sum_month_kn, 3, ',', '.') }}</span>
												</td>
											</tr>
											<tr>	
												<td class="pl-3">
													<span>Năm: </span>
												</td>
												<td class="text-right text-danger">
													<span>{{ number_format($sum_year_kn, 3, ',', '.') }}</span><span class="text-dark"> / </span> <span>{{number_format($thsxkn->Muctieunam->quantity,3,',','.') }}</span>
												</td>
											@if (Auth::check())
												@if (Auth::user()->role==1 || Auth::user()->role==2)
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
														<span>{{number_format($thsxkn->Muctieunam->MNHlowest,2,',','.') }}</span>
													</td>
												</tr>
												<tr class="text-danger">
													<td class="pl-3">
														<span>Hiện tại:</span>
													</td>
													<td class="text-right">
														<span>{{number_format($thsxkn->MNH,2,',','.') }}</span>
													</td>
												</tr>
												<tr>
													<td class="pl-3">
														<span>Tối đa:</span>
													</td>
													<td class="text-right">
														<span>{{number_format($thsxkn->Muctieunam->MNHnormal,2,',','.') }}</span>
													</td>
												</tr>
												<tr>
													<td>
														<span class="text-primary">Lượng mưa (mm): </span>
													</td>
													<td class="text-right">
														<span class="text-danger">{{number_format($thsxkn->rain,1,',','.') }}</span>
													</td>
												</tr>
												@endif
											@endif
											
											<tr>
												<td>
													<span class="text-primary">Tình trạng thiết bị: </span>
												</td>
												<td class="text-right">
													<span>{{ $thsxkn->device }}</span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="text-center">
							<a href="{{ route('sanxuat') }}" class="text-primary"> Xem thông tin các ngày khác</a>
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
								"height": "100px"
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