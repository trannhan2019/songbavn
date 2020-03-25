@extends('shared.layouts.master')
@section('title')
    Trang chủ
@endsection

@section('content')
    @include('shared.layouts.slide')
    <div class="container content">
		<div class="row mt-3">
			{{--  <!-- Noi dung chinh -->  --}}
			<div class="col-md-9 col-lg-9">
				<div class="row">
					{{--  <!-- Tin nổi bật, mới nhất chính -->  --}}
					<div class="col-md-7 home-left h-100">
						<div class="card">
							<a href="#" title="">
								<img src="img/img_bao_30_11.png" class="card-img-top w-100 img-fluid" alt="doanh thu/ sản lượng">
							</a>						
							<div class="card-body p-2">
								<h6 class="card-title">
									<a href="#" title="">
										SBA hoàn thành kế hoạch sản lượng, doanh thu năm 2019
									</a>
								</h6>
								<p class="card-text mb-0">
									<small class="text-muted">
										<i class="far fa-calendar-alt"></i> 10/02/2020
										 
										<i class="far fa-eye"></i> 100
										 
										<i class="far fa-comments"></i> 5
									</small>
								</p>
								<p class="card-text mb-0">
									Lúc 05h20 ngày 30/11/2019, SBA đã hoàn thành kế hoạch sản lượng, doanh thu phát điện năm 2019: Tổng sản lượng điện thương phẩm đạt 190,00/190,00 triệu kWh, doanh thu phát điện đạt 234,18/214,76 tỷ đồng, đạt 109% kế hoạch năm
								</p>
							</div>
						</div>
					</div>
					{{--  <!-- Tin nổi bật, tin mới slide -->  --}}
					<div class="col-md-5 home-right overflow-auto" style="height: 443.203px;">
						{{--  <!-- litsssssssssssssssss -->  --}}
						<div class="card">
							<div class="row no-gutters">
								<div class="col-5">
									<a href="#">
										<img src="img/SBA-DTN.jpg" class="w-100 img-fluid img-thumbnail" alt="">
									</a>
								</div>
								<div class="col-7">
									<div class="card-body p-1">
										<h6 class="card-title mb-0">
											<a href="#">
											Đoàn Thanh niên SBA tổ chức Đại hội Chi đoàn nhiệm kỳ 2019 - 2020.</a>
										</h6>
									</div>						
								</div>
							</div>
						</div>
						{{--  <!-- ------------------------ -->  --}}
						<div class="card">
							<div class="row no-gutters">
								<div class="col-5">
									<a href="#">
										<img src="img/bantuvisu.png" class="w-100 img-fluid img-thumbnail" alt="">
									</a>
								</div>
								<div class="col-7">
									<div class="card-body p-1">
										<h6 class="card-title mb-0">
											<a href="#">
											Bán tự vi sư.</a>
										</h6>
									</div>						
								</div>
							</div>
						</div>
						{{--  <!-- ------------------------ -->  --}}
						<div class="card">
							<div class="row no-gutters">
								<div class="col-5">
									<a href="#">
										<img src="img/Top50.jpg" class="w-100 img-fluid img-thumbnail" alt="">
									</a>
								</div>
								<div class="col-7">
									<div class="card-body p-1">
										<h6 class="card-title mb-0">
											<a href="#">
											SBA đạt danh hiệu "Top 50 nhãn hiệu danh tiếng Việt Nam" năm 2019.</a>
										</h6>
									</div>						
								</div>
							</div>
						</div>
						{{--  <!-- ------------------------------ -->  --}}
						<div class="card">
							<div class="row no-gutters">
								<div class="col-5">
									<a href="#">
										<img src="img/SBA-DTN.jpg" class="w-100 img-fluid img-thumbnail" alt="">
									</a>
								</div>
								<div class="col-7">
									<div class="card-body p-1">
										<h6 class="card-title mb-0">
											<a href="#">
											Đoàn Thanh niên SBA tổ chức Đại hội Chi đoàn nhiệm kỳ 2019 - 2020.</a>
										</h6>
									</div>						
								</div>
							</div>
						</div>
						{{--  <!-- ------------------------ -->  --}}
						<div class="card">
							<div class="row no-gutters">
								<div class="col-5">
									<a href="#">
										<img src="img/bantuvisu.png" class="w-100 img-fluid img-thumbnail" alt="">
									</a>
								</div>
								<div class="col-7">
									<div class="card-body p-1">
										<h6 class="card-title mb-0">
											<a href="#">
											Bán tự vi sư.</a>
										</h6>
									</div>						
								</div>
							</div>
						</div>
						{{--  <!-- ------------------------ -->  --}}
						<div class="card">
							<div class="row no-gutters">
								<div class="col-5">
									<a href="#">
										<img src="img/Top50.jpg" class="w-100 img-fluid img-thumbnail" alt="">
									</a>
								</div>
								<div class="col-7">
									<div class="card-body p-1">
										<h6 class="card-title mb-0">
											<a href="#">
											SBA đạt danh hiệu "Top 50 nhãn hiệu danh tiếng Việt Nam" năm 2019.</a>
										</h6>
									</div>						
								</div>
							</div>
						</div>
						{{--  <!-- ------------------------------ -->  --}}
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

					{{--  <!-- Báo cáo tài chính -->  --}}
					<div class="col-6 col-lg-3">
						<div class="text-center mt-lg-3 mt-2">
							<h6 class="py-1 m-0">
								<a class="text-danger font_title" href="#">BÁO CÁO TÀI CHÍNH</a>
							</h6>
							<hr class="m-0 mb-2">
						</div>

						<img class="img-thumbnail img-fluid" src="img/BCTC-600x400.jpg" alt="">

						<div class="mt-2">
							<ul class="list-unstyled text-justify">
								<li class="font-weight-bold crop_text">
									<a href="#">
										Báo cáo Tài chính Quí III năm 2019
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>

								<li class="crop_text">
									<a href="#">
										Báo cáo Tài chính 06 tháng đầu năm 2019
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>

								<li class="crop_text">
									<a href="#">
										Báo cáo Tài chính 06 tháng đầu năm 2019
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>

								<li class="crop_text">
									<a href="#">
										Báo cáo Tài chính 06 tháng đầu năm 2019
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>

								<li class="crop_text">
									<a href="#">
										Báo cáo Tài chính 06 tháng đầu năm 2019
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
							</ul>

						</div>

					</div>
					{{--  <!-- Công bố thông tin -->  --}}
					<div class="col-6 col-lg-3">
						<div class="text-center mt-lg-3 mt-2">
							<h6 class="py-1 m-0">
								<a class="text-danger font_title" href="#">CÔNG BỐ THÔNG TIN</a>
							</h6>
							<hr class="m-0 mb-2">
						</div>
						<img class="img-thumbnail img-fluid" src="img/CBTT-600x400.jpg" alt="">
						<div class="mt-2">
							<ul class="text-justify list-unstyled">
								<li class="font-weight-bold crop_text">
									<a href="#">Giải trình chênh lệch kết quả kinh doanh quý 3/2019 so với quý 3/2018.
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
								<li class="crop_text">
									<a href="#">Báo cáo kết quả giao dịch mua lại cổ phiếu/ bán cổ phiếu quỹ.
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
								<li class="crop_text">
									<a href="#">Báo cáo kết quả giao dịch mua lại cổ phiếu/ bán cổ phiếu quỹ.
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
								<li class="crop_text">
									<a href="#">Giải trình chênh lệch kết quả kinh doanh 6 tháng đầu năm 2019 so với 6 tháng đầu năm 2018.
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
								<li class="crop_text">
									<a href="#">Giải trình chênh lệch kết quả kinh doanh 6 tháng đầu năm 2019 so với 6 tháng đầu năm 2018.
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
							</ul>
						</div>
					</div>
					{{--  <!-- Đại hội đồng cổ đông -->  --}}
					<div class="col-6 col-lg-3">
						<div class="text-center mt-lg-3 mt-2">
							<h6 class="py-1 m-0">
								<a class="text-danger font_title" href="#">ĐẠI HỘI CỔ ĐÔNG</a>
							</h6>
							<hr class="m-0 mb-2">
						</div>
						<img class="img-thumbnail img-fluid" src="img/cophieu-600x400.jpg" alt="">
						<div class="mt-2">
							<ul class="list-unstyled text-justify">
								<li class="font-weight-bold crop_text">
									<a href="#">Nghị quyết Đại hội đồng cổ đông thường niên năm 2019
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
								<li class="crop_text">
									<a href="#">Tài liệu phục vụ họp Đại hội đồng cổ đông thường niên năm 2019
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
								<li class="crop_text">
									<a href="#">Nghị quyết Đại hội đồng cổ đông thường niên năm 2018
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
								<li class="crop_text">
									<a href="#">Tài liệu phục vụ họp Đại hội đồng cổ đông thường niên năm 2018
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
								<li class="crop_text">
									<a href="#">Báo cáo Tài chính Quí III năm 2019
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
							</ul>
						</div>

					</div>
					{{--  <!-- Ý kiến cổ đông -->  --}}
					<div class="col-6 col-lg-3">
						<div class="text-center mt-lg-3 mt-2">
							<h6 class="py-1 m-0">
								<a class="text-danger font_title" href="#">Ý KIẾN - TRẢ LỜI</a>
							</h6>
							<hr class="m-0 mb-2">
						</div>
						<img class="img-thumbnail img-fluid" src="img/q-a-600x400.jpg" alt="">
						<div class="mt-2">
							<ul class="list-unstyled text-justify">
								<li class="font-weight-bold crop_text">
									<a href="#">Đầu tiên cổ đông xin phép kính chúc BLĐ SBA nhiều sức khỏe, hạnh phúc và thắng lợi. Cổ đông xin được hỏi BLĐ SBA là giá bán điện của Nhà máy Krông HNăng là giờ cao điểm là bao nhiêu đ / kw, giờ bình thường là bao nhiêu đ / kw, giờ thấp điểm là bao nhiêu đ / kw? Xin trân trọng BLĐ SBA cảm ơn.
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
								<li class="crop_text">
									<a href="#">Chào quý Cty SBA. Tôi hiện đang là cổ đông của quý cty, tôi đánh giá cao về sự minh bạch trong việc công bố thông tin cũng như hiệu quả kinh doanh của SBA. Hiện tôi đang có một số câu hỏi cần cty giải đáp. 1. Nhà máy Khe Diên dự kiến SCBD định kỳ lúc nào đưa trở lại hoạt động, hiện tiến độ nâng công suất cho nhà máy lên 15 MW đến lúc nào thì xong?. Phía Krong Năng có KH SCBD trong thời gian tới hay không? 2. KQKD Q3 này ước sẽ giảm so với cùng kỳ bao nhiêu? 3. Kế Hoạch DTLN trong quý 4 của quý cty ntn? 4. Các dự án Thủy điện mới như Sồng Tranh...dự kiến thời gian nào được triển khai? Nhờ quý cty giải đáp.
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
								<li class="crop_text">
									<a href="#">Chào quý Cty SBA. Tôi hiện đang là cổ đông của quý cty, tôi đánh giá cao về sự minh bạch trong việc công bố thông tin cũng như hiệu quả kinh doanh của SBA. Hiện tôi đang có một số câu hỏi cần cty giải đáp. 1. Nhà máy Khe Diên dự kiến SCBD định kỳ lúc nào đưa trở lại hoạt động, hiện tiến độ nâng công suất cho nhà máy lên 15 MW đến lúc nào thì xong?. Phía Krong Năng có KH SCBD trong thời gian tới hay không? 2. KQKD Q3 này ước sẽ giảm so với cùng kỳ bao nhiêu? 3. Kế Hoạch DTLN trong quý 4 của quý cty ntn? 4. Các dự án Thủy điện mới như Sồng Tranh...dự kiến thời gian nào được triển khai? Nhờ quý cty giải đáp.
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
								<li class="crop_text">
									<a href="#">Chào quý Cty SBA. Tôi hiện đang là cổ đông của quý cty, tôi đánh giá cao về sự minh bạch trong việc công bố thông tin cũng như hiệu quả kinh doanh của SBA. Hiện tôi đang có một số câu hỏi cần cty giải đáp. 1. Nhà máy Khe Diên dự kiến SCBD định kỳ lúc nào đưa trở lại hoạt động, hiện tiến độ nâng công suất cho nhà máy lên 15 MW đến lúc nào thì xong?. Phía Krong Năng có KH SCBD trong thời gian tới hay không? 2. KQKD Q3 này ước sẽ giảm so với cùng kỳ bao nhiêu? 3. Kế Hoạch DTLN trong quý 4 của quý cty ntn? 4. Các dự án Thủy điện mới như Sồng Tranh...dự kiến thời gian nào được triển khai? Nhờ quý cty giải đáp.
									</a>
								</li>
								<li>
									<hr class="my-1">
								</li>
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
					<div class="col-sm-6">
						<div class="text-center mt-lg-3 mt-2">
							<h6 class="py-1 m-0">
								<a class="text-danger font_title" href="#">THÔNG TIN HOẠT ĐỘNG</a>
							</h6>
							<hr class="m-0 mb-2">
						</div>
						<div class="card">
							<img src="img/SK6T-2019-600x400.jpg" class="card-img-top w-100 img-thumbnail" alt="doanh thu/ sản lượng">
							<div class="card-body p-2">
								<h6 class="card-title">
									SBA tổ chức Hội nghị Sơ kết 6 tháng đầu năm và kế hoạch 6 tháng cuối năm 2019
								</h6>
								<p class="card-text m-0">
									Ngày 02/07/2019 tại Hội trường Công ty Cổ phần Sông Ba, SBA đã tổ chức Hội nghị sơ kết công tác 6 tháng đầu năm và kế hoạch 6 tháng cuối năm 2019
								</p>
								<a href="#" class="stretched-link"></a>
							</div>
						</div>

						<div class="row my-1">
							<div class="col-4">
								<a href="#">
									<img src="img/NMKN.jpg" class="w-100 img-fluid img-thumbnail" alt="">
								</a>
							</div>

							<div class="col-8 pl-0">
								<h6 class="text-justify">
									<a href="#" class="crop_text">
										Chi nhánh Công ty Cổ phần Sông Ba - NMTĐ Krông Hnăng được Tổng Cục t...
									</a>
								</h6>
							</div>
						</div>
						<hr class="m-0 mb-2">

						<div class="row my-1">
							<div class="col-4">
								<a href="#">
									<img src="img/NMKD.jpg" class="w-100 img-fluid img-thumbnail" alt="">
								</a>
							</div>

							<div class="col-8 pl-0">
								<h6 class="text-justify">
									<a href="#" class="crop_text">
										CBNV NHÀ MÁY THỦY ĐIỆN KHE DIÊN GIAO LƯU VỚI CÁC ĐƠN VỊ THANH NIÊN TRÊN ĐỊA BÀN HUYỆN NÔNG SƠN
									</a>
								</h6>
							</div>
						</div>
						<hr class="m-0 mb-2">

					</div>

					{{--  <!-- ĐẢNG - ĐOÀN THỂ -->  --}}
					<div class="col-sm-6">
						<div class="text-center mt-lg-3 mt-2">
							<h6 class="py-1 m-0 font_title">
								<a class="text-danger" href="#">ĐẢNG - ĐOÀN THỂ</a>
							</h6>
							<hr class="m-0 mb-2">
						</div>
						<div class="card">
							<img src="img/Chibo-600x400.jpg" class="card-img-top w-100 img-thumbnail" alt="">
							<div class="card-body p-2">
								<h6 class="card-title">
									CHI ỦY SBA LÀM VIỆC VỚI ĐOÀN GIÁM SÁT UBKT ĐẢNG ỦY EVNCPC.
								</h6>
								<p class="card-text m-0">
									Sáng ngày 29 tháng 8 năm 2019 tại văn phòng Công ty, Chi ủy Công ty CP Sông Ba (SBA) đã tiếp và làm việc với Đoàn giám sát UBKT Đảng ủy Tổng công ty Điện
								</p>
								<a href="#" class="stretched-link"></a>
							</div>
						</div>

						<div class="row my-1">
							<div class="col-4">
								<a href="#">
									<img src="img/NMKN.jpg" class="w-100 img-fluid img-thumbnail" alt="">
								</a>
							</div>

							<div class="col-8 pl-0">
								<h6 class="text-justify">
									<a href="#" class="crop_text">
										Chi nhánh Công ty Cổ phần Sông Ba - NMTĐ Krông Hnăng được Tổng Cục t...
									</a>
								</h6>
							</div>
						</div>
						<hr class="m-0 mb-2">

						<div class="row my-1">
							<div class="col-4">
								<a href="#">
									<img src="img/NMKD.jpg" class="w-100 img-fluid img-thumbnail" alt="">
								</a>
							</div>

							<div class="col-8 pl-0">
								<h6 class="text-justify">
									<a href="#" class="crop_text">
										CBNV NHÀ MÁY THỦY ĐIỆN KHE DIÊN GIAO LƯU VỚI CÁC ĐƠN VỊ THANH NIÊN TRÊN ĐỊA BÀN HUYỆN NÔNG SƠN
									</a>
								</h6>
							</div>
						</div>
						<hr class="m-0 mb-2">

					</div>

					{{--  <!-- BÀI VIẾT SBA -->  --}}
					<div class="col-sm-6">
						<div class="text-center mt-lg-3 mt-2">
							<h6 class="py-1 m-0 font_title">
								<a class="text-danger" href="#">BÀI VIẾT SBA</a>
							</h6>
							<hr class="m-0 mb-2">
						</div>
						<div class="card">
							<img src="img/15NAM-600X400.jpg" class="card-img-top w-100 img-thumbnail" alt="">
							<div class="card-body p-2">
								<h6 class="card-title">
									SBA- CON ĐƯỜNG TÔI ĐANG ĐI.
								</h6>
								<p class="card-text m-0">
									Mọi thứ xảy ra trong cuộc đời đều đó cái duyên, và tôi tin vào mối nhân duyên của tôi và SBA. Người ta thường nói “tốt nghiệp là thất nghiêp”, công ăn việc làm luôn luôn là nổi trăn trở, là khát khao cháy bỏng đối với những người mới bước chân vào xã hội.
								</p>
								<a href="#" class="stretched-link"></a>
							</div>
						</div>

						<div class="row my-1">
							<div class="col-4">
								<a href="#">
									<img src="img/NMKN.jpg" class="w-100 img-fluid img-thumbnail" alt="">
								</a>
							</div>

							<div class="col-8 pl-0">
								<h6 class="text-justify">
									<a href="#" class="crop_text">
										Chi nhánh Công ty Cổ phần Sông Ba - NMTĐ Krông Hnăng được Tổng Cục t...
									</a>
								</h6>
							</div>
						</div>
						<hr class="m-0 mb-2">

						<div class="row my-1">
							<div class="col-4">
								<a href="#">
									<img src="img/NMKD.jpg" class="w-100 img-fluid img-thumbnail" alt="">
								</a>
							</div>

							<div class="col-8 pl-0">
								<h6 class="text-justify">
									<a href="#" class="crop_text">
										CBNV NHÀ MÁY THỦY ĐIỆN KHE DIÊN GIAO LƯU VỚI CÁC ĐƠN VỊ THANH NIÊN TRÊN ĐỊA BÀN HUYỆN NÔNG SƠN
									</a>
								</h6>
							</div>
						</div>
						<hr class="m-0 mb-2">
					</div>

					{{--  <!-- THÔNG TIN ĐẤU THẦU -->  --}}
					<div class="col-sm-6">
						<div class="text-center mt-lg-3 mt-2">
							<h6 class="py-1 m-0 font_title">
								<a class="text-danger" href="#">KỶ NIỆM SBA</a>
							</h6>
							<hr class="m-0 mb-2">
						</div>
						<div class="card">
							<img src="img/15NAM-600X400.jpg" class="card-img-top w-100 img-thumbnail" alt="">
							<div class="card-body p-2">
								<h6 class="card-title">
									SBA- CON ĐƯỜNG TÔI ĐANG ĐI.
								</h6>
								<p class="card-text m-0">
									Mọi thứ xảy ra trong cuộc đời đều đó cái duyên, và tôi tin vào mối nhân duyên của tôi và SBA. Người ta thường nói “tốt nghiệp là thất nghiêp”, công ăn việc làm luôn luôn là nổi trăn trở, là khát khao cháy bỏng đối với những người mới bước chân vào xã hội.
								</p>
								<a href="#" class="stretched-link"></a>
							</div>
						</div>

						<div class="row my-1">
							<div class="col-4">
								<a href="#">
									<img src="img/NMKN.jpg" class="w-100 img-fluid img-thumbnail" alt="">
								</a>
							</div>

							<div class="col-8 pl-0">
								<h6 class="text-justify">
									<a href="#" class="crop_text">
										Chi nhánh Công ty Cổ phần Sông Ba - NMTĐ Krông Hnăng được Tổng Cục t...
									</a>
								</h6>
							</div>
						</div>
						<hr class="m-0 mb-2">

						<div class="row my-1">
							<div class="col-4">
								<a href="#">
									<img src="img/NMKD.jpg" class="w-100 img-fluid img-thumbnail" alt="">
								</a>
							</div>

							<div class="col-8 pl-0">
								<h6 class="text-justify">
									<a href="#" class="crop_text">
										CBNV NHÀ MÁY THỦY ĐIỆN KHE DIÊN GIAO LƯU VỚI CÁC ĐƠN VỊ THANH NIÊN TRÊN ĐỊA BÀN HUYỆN NÔNG SƠN
									</a>
								</h6>
							</div>
						</div>
						<hr class="m-0 mb-2">
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
							<li>
								<a href="#">
									Thông báo nhận cổ tức bằng tiền mặt năm 2018.
								</a>
							</li>
							<li>
								<hr class="my-1">
							</li>
							<li>
								<a href="#">
									Thông báo Về ngày đăng ký cuối cùng thực hiện quyền chi trả cổ tức năm 2018 bằng tiền.
								</a>
							</li>
							<li>
								<hr class="my-1">
							</li>
							<li>
								<a href="#">
									Thông báo mời họp Đại hội đồng cổ đông thường niên năm 2019
								</a>
							</li>
							<li>
								<hr class="my-1">
							</li>
							<li>
								<a href="#">
									Thông báo mời họp Đại hội đồng cổ đông thường niên năm 2019
								</a>
							</li>
							<li>
								<hr class="my-1">
							</li>
							<li>
								<a href="#">
									Thông báo mời họp Đại hội đồng cổ đông thường niên năm 2019
								</a>
							</li>
							<li>
								<hr class="my-1">
							</li>
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

				
				{{--  <!-- LIÊN KẾT -->  --}}
				<div class="row mt-3">
					<div class="col-12">
						<h5 class="text-center p-2 banner_inside text-white">
							LIÊN KẾT
						</h5>
						<div class="evncpc text-center">
							<a href="https://cpc.vn/vi-vn/" target="_blank">
							<img src="img/LOGO_EVNCPC.png" alt="">
							<p>Tổng công ty Điện lực miền Trung</p>
							</a>
						</div>	
						<hr class="my-3">					
					</div>
					<div class="col-12 mt-3">
						<div class="soffice text-center w-100">
							<a href="http://office.songba.vn:8080/security/login.aspx" target="_blank">
							<img src="img/LOGO.png" alt="" class="w-25">
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