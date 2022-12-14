@extends('templates.default')

@section('SeoConent')
    <meta name="description" content="{{ setting('home.description') }}" />
    <meta name="keywords" content="{{ setting('home.keyword') }}" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="webhome" />
    <meta property="og:title" content="{{ setting('home.title') }}" />
    <meta property="og:description" content="{{ setting('home.description') }} " />
    <meta property="og:url" content="{{ asset('storage') . '/' }}" />
    <meta property="og:image" content="{{ asset('storage') . '/' . setting('home.logo_Menu') }}" />
    <meta property="og:home_name" content="{{ setting('home.title') }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ setting('home.title') }}" />
    <meta name="twitter:description" content="{{ setting('home.description') }} " />
    <meta name="twitter:image" content="{{ asset('storage') . '/' . setting('home.logo_Menu') }}" />
    <meta name="theme-color" content="#0086cd" />

    <title>{{ setting('home.title') }}</title>
@endsection

@section('content')
    @include('includes.Banner')
    <nav class="d-flex flex-column py-3" style="background-color: rgb(247, 251, 255)">
        <div class="d-flex flex-wrap container-fluid px-3 px-xl-5">
            <div class="col-lg-9 col-12 px-0 pt-2 d-flex flex-column">
                <h1 class="txt-blue-2">Tin tức</h1>
                <div class="d-flex flex-column">
                    <div class="d-flex flex-wrap">
                        <div class="pb-2 px-2 col-12 col-md-7">
                            <div id="tintuc" class="carousel slide" data-ride="carousel" data-interval="2000"
                                data-pause="true">
                                <ol class="carousel-indicators m-0">
                                    <?php $key2 = 0; ?>
                                    @foreach ($new_1->PostMany as $key=>$new)
                                        @if ($new->status == 'PUBLISHED')
                                            @if ($key2 == 0)
                                                <?php $key2 = 1; ?>
                                                <li data-target="#tintuc" data-slide-to="{{ $key-1 }}" class="active"
                                                    style="background-color: var(--blue-coler-1)"></li>
                                            @else
                                                <li data-target="#tintuc" data-slide-to="{{ $key-1 }}"
                                                    style="background-color: var(--blue-coler-1)"></li>
                                            @endif
                                        @endif
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    <?php $key1 = 0; ?>
                                    @foreach ($new_1->PostMany as $new)
                                        @if ($new->status == 'PUBLISHED')
                                            @if ($key1 == 0)
                                                <?php $key1 = 1; ?>
                                                <a href="{{ asset('post') . '/' . $new_1->slug . '/' . $new->slug }}"
                                                    class="carousel-item shadow active">
                                                    <div class="d-flex flex-column">
                                                        <img src="{{ asset('storage') . '/' . $new->image }}"
                                                            alt="" class="p-0 m-0 w-100 rounded"
                                                            style="aspect-ratio: 3/2; object-fit: cover" />
                                                        <h2 class="txt-blue-2 pt-2">{{ $new->title }}</h2>
                                                        <p class="txt-black-2 m-0 pb-2">
                                                            {{ $new->meta_description }}
                                                        </p>
                                                        <span class="span_time pb-2">{{ $new->created_at }}</span>
                                                    </div>
                                                </a>
                                            @else
                                                <a href="{{ asset('post') . '/' . $new_1->slug . '/' . $new->slug }}"
                                                    class="carousel-item shadow">
                                                    <div class="d-flex flex-column">
                                                        <img src="{{ asset('storage') . '/' . $new->image }}"
                                                            alt="" class="p-0 m-0 w-100 rounded"
                                                            style="aspect-ratio: 3/2; object-fit: cover" />
                                                        <h2 class="txt-blue-2 pt-2">{{ $new->title }}</h2>
                                                        <p class="txt-black-2 m-0 pb-2">
                                                            {{ $new->meta_description }}
                                                        </p>
                                                        <span class="span_time pb-2">{{ $new->created_at }}</span>
                                                    </div>
                                                </a>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="d-flex col-12 col-md-5 flex-column">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active px-1" href="#profile" role="tab" data-toggle="tab"
                                        aria-selected="true">{{ $new_1->name }}</a>
                                </li>
                                <li class="nav-item px-1">
                                    <a class="nav-link" href="#buzz" role="tab"
                                        data-toggle="tab">{{ $new_2->name }}</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active show" id="profile"
                                    style="max-height: 16rem; overflow-y: scroll">
                                    <div class="d-flex flex-column pt-1">
                                        <ul class="m-0 p-0">
                                            @foreach ($new_1->PostMany as $new)
                                                <li class="d-flex flex-column pt-1"
                                                    style="border-bottom: 0.05rem dashed rgb(152, 152, 152)">
                                                    <a href="{{ asset('post') . '/' . $new_1->slug . '/' . $new->slug }}"
                                                        style="color: black">{{ $new->title }}</a>
                                                    <span class="span_time pb-1 pt-1">{{ $new->created_at }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" style="max-height: 16rem; overflow-y: scroll"
                                    id="buzz">
                                    <div class="d-flex flex-column pt-1">
                                        <ul class="m-0 p-0">
                                            @foreach ($new_2->PostMany as $new)
                                                <li class="d-flex flex-column pt-1"
                                                    style="border-bottom: 0.05rem dashed rgb(152, 152, 152)">
                                                    <a href="{{ asset('post') . '/' . $new_2->slug . '/' . $new->slug }}"
                                                        style="color: black">{{ $new->title }}</a>
                                                    <span class="span_time pb-1 pt-1">{{ $new->created_at }}</span>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-0 mt-1 col-3 d-none d-lg-flex flex-column">
                <div class="shadow p-0 flex-column">
                    <div class="d-flex p-2" style="background-color: var(--blue-coler-4)">
                        <img src="img/icon/Map_light.svg" alt="" style="font-size: 1rem" class="mr-2" />
                        <h2 class="txt-blue-2 my-auto" style="font-weight: 500; color: #fff">
                            Bản đồ chỉ dẫn
                        </h2>
                    </div>

                    <div class="d-flex flex-column pt-2">
                        <div class="d-flex flex-wrap p-1">
                            <iframe style="width: 100%; height: 7rem" src="{{ setting('home.map') }}" width="400"
                                height="400" style="border: 0" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                <div class="shadow mt-3 flex-column">
                    <div class="d-flex p-2" style="background-color: var(--blue-coler-4)">
                        <img src="img/icon/Send_duotone.svg" alt="" style="font-size: 1rem" class="mr-2" />
                        <h2 class="txt-blue-2 my-auto" style="font-weight: 500; color: #fff">
                            Đơn vị liên kết
                        </h2>
                    </div>

                    <div class="d-flex flex-column pt-2">
                        <div class="d-flex flex-wrap p-1">
                            <div id="carouselExampleControls" data-ride="carousel" data-interval="2000" class="m-auto"
                                data-pause="true">
                                <div class="carousel-inner">
                                    <?php
                                    use App\SupportCompany;
                                    $suport_companies = SupportCompany::where('status', '1')->get();
                                    ?>
                                    @foreach ($suport_companies as $key => $suport_company)
                                        @if ($key == 0)
                                            <div class="carousel-item active">
                                                <div class="d-flex w-100">
                                                    <img style="height: 6rem"
                                                        src="{{ asset('storage') . '/' }}{{ $suport_company->img }}"
                                                        class="d-block m-auto"
                                                        alt="{{ $suport_company->nameCompany }}" />
                                                </div>
                                            </div>
                                        @else
                                            <div class="carousel-item">
                                                <div class="d-flex w-100">
                                                    <img style="height: 6rem"
                                                        src="{{ asset('storage') . '/' }}{{ $suport_company->img }}"
                                                        class="d-block m-auto"
                                                        alt="{{ $suport_company->nameCompany }}" />
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>




    <nav class="pt-3 pb-4">
        <div class="container-fluid px-3 px-xl-5 d-flex flex-column">
            <h1 class="txt-blue-3 text-center pt-3">Chương trình đào tạo</h1>
            <div class="underlined_div"></div>
            <p class="text-center txt-blue-3 mt-3">
                {{ setting('home.training_program') }}
            </p>
            <div class="d-flex flex-wrap">
                <div class="col-md-6 col-12 d-flex"
                    style="
							background-image: linear-gradient(#0000002e, #0000002e), url(img/tintuc1.jpg);
							height: 25rem;
							width: 100%;
							background-position: center;
							background-repeat: no-repeat;
							background-size: cover;
						">
                    <a href="#" style="width: 15rem; height: 6rem; background-color: #0086cdc2"
                        class="d-flex flex-column m-auto rounded shadow-lg">
                        <div class="m-auto">
                            <h2 class="font-weight-bold txt-gray-1">Khoa học máy tính</h2>
                            <p class="m-0 txt-gray-1 text-center" style="font-size: 0.65rem">
                                nội dung nội dung
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-12 d-flex flex-column p-0">
                    <div class="d-flex w-100 h-50"
                        style="
								background-image: url(img/tintuc1.jpg);
								background-position: center;
								background-repeat: no-repeat;
								background-size: cover;
							">
                        <a href="" style="width: 15rem; height: 6rem; background-color: #0086cdc2"
                            class="d-flex flex-column m-auto rounded shadow-lg">
                            <div class="m-auto">
                                <h2 class="font-weight-bold txt-gray-1">Khoa học máy tính</h2>
                                <p class="m-0 txt-gray-1 text-center" style="font-size: 0.65rem">
                                    nội dung nội dung
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="d-flex w-100 h-50"
                        style="
								background-image: url(img/tintuc1.jpg);
								background-position: center;
								background-repeat: no-repeat;
								background-size: cover;
							">
                        <a href="" style="width: 15rem; height: 6rem; background-color: #0086cdc2"
                            class="d-flex flex-column m-auto rounded shadow-lg">
                            <div class="m-auto">
                                <h2 class="font-weight-bold txt-gray-1">Khoa học máy tính</h2>
                                <p class="m-0 txt-gray-1 text-center" style="font-size: 0.65rem">
                                    nội dung nội dung
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>






    <nav class="pt-3 pb-4" style="background-color: rgb(247, 251, 255)">
        <div class="container-fluid px-3 px-xl-5 d-flex flex-column">
            <h1 class="txt-blue-3 text-center pt-3">Thông tin tuyển sinh</h1>
            <div class="underlined_div"></div>
            <div class="mt-3 d-flex flex-wrap">
                <div class="col-12 col-md-4 px-1 px-lg-3 pt-2">
                    <div class="card w-100 h-100 shadow" style="background-color: #fff">
                        <img src="img/tintuc1.jpg" class="card-img-top" alt="..."
                            style="aspect-ratio: 3/2; object-fit: cover" />
                        <a href="" class="card-body pt-1">
                            <h2 class="txt-blue-2 my-auto pt-1"
                                style="
										height: 2.5rem;
										font-weight: 600;
										color: var(--blue-coler-3);
										font-size: 0.7rem;
									">
                                Tuyển sinh Đại học 2022 song bằng việt pháp
                            </h2>
                            <p class="card-text" style="font-size: 0.65rem; color: black">
                                Some quick example text to build on the card title and make up the bulk of the
                                card's content.
                            </p>
                        </a>
                    </div>
                </div>

                <div class="col-12 col-md-4 px-1 px-lg-3 pt-2">
                    <div class="card w-100 h-100 shadow" style="background-color: #fff">
                        <img src="img/tintuc1.jpg" class="card-img-top" alt="..."
                            style="aspect-ratio: 3/2; object-fit: cover" />
                        <a href="" class="card-body pt-1">
                            <h2 class="txt-blue-2 my-auto pt-1"
                                style="
										height: 2.5rem;
										font-weight: 600;
										color: var(--blue-coler-3);
										font-size: 0.7rem;
									">
                                Tuyển sinh Đại học 2022
                            </h2>
                            <p class="card-text" style="font-size: 0.65rem; color: black">
                                Some quick example text to build on the card title and make up the bulk of the
                                card's content.
                            </p>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-4 px-1 px-lg-3 pt-2">
                    <div class="card w-100 h-100 shadow" style="background-color: #fff">
                        <img src="img/tintuc1.jpg" class="card-img-top" alt="..."
                            style="aspect-ratio: 3/2; object-fit: cover" />
                        <a href="" class="card-body pt-1">
                            <h2 class="txt-blue-2 my-auto pt-1"
                                style="
										height: 2.5rem;
										font-weight: 600;
										color: var(--blue-coler-3);
										font-size: 0.7rem;
									">
                                Tuyển sinh Đại học 2022
                            </h2>
                            <p class="card-text" style="font-size: 0.65rem; color: black">
                                Some quick example text to build on the card title and make up the bulk of the
                                card's content.
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>







    <nav class="d-flex flex-column py-3">
        <h1 class="txt-blue-3 text-center pt-3">Các hoạt động và sự kiện</h1>
        <div class="underlined_div"></div>
        <div class="d-flex flex-wrap container-fluid px-3 px-xl-5 pt-4">
            <div class="col-md-7 col-12 px-0 pt-2 d-flex flex-column">
                <h1 class="txt-blue-2">Các hoạt động</h1>

                <div id="hoatdong" class="carousel slide pr-3 pl-1" data-ride="carousel" data-interval="2000"
                    data-pause="true">
                    <ol class="carousel-indicators m-0">
                        <li data-target="#hoatdong" data-slide-to="0" class="active"
                            style="background-color: var(--blue-coler-1)"></li>
                        <li data-target="#hoatdong" data-slide-to="1" style="background-color: var(--blue-coler-1)"></li>
                        <li data-target="#hoatdong" data-slide-to="2" style="background-color: var(--blue-coler-1)"></li>
                    </ol>
                    <div class="carousel-inner">
                        <a href="#" class="carousel-item shadow active">
                            <div class="d-flex flex-column">
                                <img src="img/tintuc1.jpg" alt="" class="p-0 m-0 w-100 rounded"
                                    style="aspect-ratio: 3/2; object-fit: cover" />
                                <h2 class="txt-blue-2 pt-2">Tiêu đề</h2>
                                <p class="txt-black-2 m-0 pb-2">
                                    Nội dung nội dung nội dung Nội dung nội dung nội dung Nội dung nội dung nội dung
                                </p>
                                <span class="span_time pb-2">28/09/2020 14:19:00</span>
                            </div>
                        </a>
                        <a href="#" class="carousel-item shadow">
                            <div class="d-flex flex-column">
                                <img src="img/tintuc2.jpg" alt="" class="p-0 m-0 w-100 rounded"
                                    style="aspect-ratio: 3/2; object-fit: cover" />
                                <h2 class="txt-blue-2 pt-2">Tiêu đề</h2>
                                <p class="txt-black-2 m-0 pb-2">
                                    Nội dung nội dung nội dung Nội dung nội dung nội dung Nội dung nội dung nội dung
                                </p>
                                <span class="span_time pb-2">28/09/2020 14:19:00</span>
                            </div>
                        </a>
                        <a href="#" class="carousel-item shadow">
                            <div class="d-flex flex-column">
                                <img src="img/tintuc1.jpg" alt="" class="p-0 m-0 w-100 rounded"
                                    style="aspect-ratio: 3/2; object-fit: cover" />
                                <h2 class="txt-blue-2 pt-2">Tiêu đề</h2>
                                <p class="txt-black-2 m-0 pb-2">
                                    Nội dung nội dung nội dung Nội dung nội dung nội dung Nội dung nội dung nội dung
                                </p>
                                <span class="span_time pb-2">28/09/2020 14:19:00</span>
                            </div>
                        </a>
                    </div>
                    <button class="carousel-control-prev" type="button" data-target="#hoatdong" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#hoatdong" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
                </div>
            </div>
            <div class="pt-1 px-0 col-md-5 col-12 d-flex flex-column">
                <div class="d-flex flex-column shadow p-2 rounded">
                    <h1 class="txt-blue-2">Các sự kiện</h1>
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-wrap">
                            <a href="#" class="pb-2 px-2 col-12">
                                <img src="img/tintuc1.jpg" alt="" class="p-0 m-0 w-100 shadow rounded"
                                    style="aspect-ratio: 2/1; object-fit: cover" />
                            </a>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-wrap">
                            <div class="pb-2 px-2">
                                <div class="d-flex flex-column border rounded shadow">
                                    <p style="
												background-color: #ffed89;
												font-weight: bold;
												font-size: 0.5rem;
												border-bottom: 0.05rem solid rgb(150, 150, 150);
												color: var(--blue-coler-2);
											"
                                        class="px-1 py-0 m-auto">
                                        Tháng 1
                                    </p>
                                    <p style="font-size: 1rem; background-color: #ff3434; color: white"
                                        class="rounded-bottom text-center m-0 font-weight-bold">
                                        27
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex flex-column col-8 col-md-8 p-0">
                                <h3 class="txt-blue-2 d-flex">
                                    <a class="mt-1" href="">Tiêu đềềTiêu đềTiêu đềTiêu đ</a>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column">
                        <div class="d-flex flex-wrap">
                            <div class="pb-2 px-2">
                                <div class="d-flex flex-column border rounded shadow">
                                    <p style="
												background-color: #ffed89;
												font-weight: bold;
												font-size: 0.5rem;
												border-bottom: 0.05rem solid rgb(150, 150, 150);
												color: var(--blue-coler-2);
											"
                                        class="px-1 py-0 m-auto">
                                        Tháng 1
                                    </p>
                                    <p style="font-size: 1rem; background-color: #ff3434; color: white"
                                        class="rounded-bottom text-center m-0 font-weight-bold">
                                        27
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex flex-column col-8 col-md-8 p-0">
                                <h3 class="txt-blue-2 d-flex">
                                    <a class="mt-1" href="">Tiêu đềềTiêu đềTiêu đềTiêu đ</a>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column">
                        <div class="d-flex flex-wrap">
                            <div class="pb-2 px-2">
                                <div class="d-flex flex-column border rounded shadow">
                                    <p style="
												background-color: #ffed89;
												font-weight: bold;
												font-size: 0.5rem;
												border-bottom: 0.05rem solid rgb(150, 150, 150);
												color: var(--blue-coler-2);
											"
                                        class="px-1 py-0 m-auto">
                                        Tháng 1
                                    </p>
                                    <p style="font-size: 1rem; background-color: #ff3434; color: white"
                                        class="rounded-bottom text-center m-0 font-weight-bold">
                                        27
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex flex-column col-8 col-md-8 p-0">
                                <h3 class="txt-blue-2 d-flex">
                                    <a class="mt-1" href="">Tiêu đềềTiêu đềTiêu đềTiêu đ</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center pb-2">
                        <a href="">xem tất cả</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
@endsection
{{-- 
@section('addFileFooter')
<script src="{{ asset('asset/js/form.js')}}"></script>
@endsection --}}
