@extends('layouts.layout')
@section('main-content')
    <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Daftar Teknisi</h2>
                        </div>
                        <div class="col-12">
                            <a href="/">Home</a>
                            <a href="">Teknisi</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->


            <!-- Portfolio Start -->
            <div class="portfolio">
                <div class="container">
                    <div class="section-header">
                        <p>Daftar Teknisi</p>
                        <h2>Lihat Teknisi yang Kami Tawarkan</h2>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul id="portfolio-flters">
                                    <li data-filter="*" class="filter-active">Semua</li>
                                @foreach ($spec as $category)
                                    <li value="{{ $category->category }}">{{ $category->category }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="row portfolio-container">
                        @foreach ($data as $tech)
                        <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item completed">
                            <div class="portfolio-wrap">
                                <figure>
                                    @if($tech->photos)
                                        <img class="img-fluid rounded" src="{{ asset('storage/image/tech' . $tech->photos) }}" alt="{{ $tech->category }}">
                                    @else
                                        <img class="img-fluid rounded"src="https://source.unsplash.com/800x800?{{ $tech->category }}" alt="{{ $tech->category }}">
                                    @endif
                                    {{-- <img src="img/portfolio-3.jpg" alt="Portfolio Image"> --}}
                                    <a href="img/portfolio-3.jpg" class="link-preview" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="link-details"><i class="fa fa-link"></i></a>
                                    <a class="portfolio-title" href="{{ route('tech.detail', $tech->id_tech) }}">{{ $tech->name }}</a>
                                </figure>
                            </div>
                        </div>
                        @endforeach
                    </div>
                     <div class="d-flex justify-content-end">
                        {{ $data->links() }}
                    </div>
                    {{-- <div class="row">
                        <div class="col-12 load-more">
                            <a class="btn" href="#">Load More</a>
                        </div>
                    </div> --}}
                </div>
            </div>
@endsection
{{-- <li data-filter="*" class="filter-active">Semua</li>
    <li data-filter=".completed">Design</li>
    <li data-filter=".ongoing">Software</li>
    <li data-filter=".upcoming">Elektronik</li>
    <li data-filter=".upcoming">Furniture</li>
    <li data-filter=".upcoming">Ledeng</li>
--}}
{{--
    <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item ongoing">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="img/portfolio-2.jpg" alt="Portfolio Image">
                                    <a href="img/portfolio-2.jpg" class="link-preview" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="link-details"><i class="fa fa-link"></i></a>
                                    <a class="portfolio-title" href="#">Project Name Here</a>
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item upcoming">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="img/portfolio-3.jpg" alt="Portfolio Image">
                                    <a href="img/portfolio-3.jpg" class="link-preview" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="link-details"><i class="fa fa-link"></i></a>
                                    <a class="portfolio-title" href="#">Project Name Here</a>
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item completed">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="img/portfolio-1.jpg" alt="Portfolio Image">
                                    <a href="img/portfolio-1.jpg" class="link-preview" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="link-details"><i class="fa fa-link"></i></a>
                                    <a class="portfolio-title" href="#">Project Name Here</a>
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item ongoing">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="img/portfolio-2.jpg" alt="Portfolio Image">
                                    <a href="img/portfolio-2.jpg" class="link-preview" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="link-details"><i class="fa fa-link"></i></a>
                                    <a class="portfolio-title" href="#">Project Name Here</a>
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item upcoming">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="img/portfolio-3.jpg" alt="Portfolio Image">
                                    <a href="img/portfolio-3.jpg" class="link-preview" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="link-details"><i class="fa fa-link"></i></a>
                                    <a class="portfolio-title" href="#">Project Name Here</a>
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item completed">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="img/portfolio-1.jpg" alt="Portfolio Image">
                                    <a href="img/portfolio-1.jpg" class="link-preview" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="link-details"><i class="fa fa-link"></i></a>
                                    <a class="portfolio-title" href="#">Project Name Here</a>
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item ongoing">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="img/portfolio-2.jpg" alt="Portfolio Image">
                                    <a href="img/portfolio-2.jpg" class="link-preview" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="link-details"><i class="fa fa-link"></i></a>
                                    <a class="portfolio-title" href="#">Project Name Here</a>
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item upcoming">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="img/portfolio-3.jpg" alt="Portfolio Image">
                                    <a href="img/portfolio-3.jpg" class="link-preview" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="link-details"><i class="fa fa-link"></i></a>
                                    <a class="portfolio-title" href="#">Project Name Here</a>
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item completed">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="img/portfolio-1.jpg" alt="Portfolio Image">
                                    <a href="img/portfolio-1.jpg" class="link-preview" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="link-details"><i class="fa fa-link"></i></a>
                                    <a class="portfolio-title" href="#">Project Name Here</a>
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item ongoing">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="img/portfolio-2.jpg" alt="Portfolio Image">
                                    <a href="img/portfolio-2.jpg" class="link-preview" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="link-details"><i class="fa fa-link"></i></a>
                                    <a class="portfolio-title" href="#">Project Name Here</a>
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item upcoming">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="img/portfolio-3.jpg" alt="Portfolio Image">
                                    <a href="img/portfolio-3.jpg" class="link-preview" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="link-details"><i class="fa fa-link"></i></a>
                                    <a class="portfolio-title" href="#">Project Name Here</a>
                                </figure>
                            </div>
                        </div>
                    </div>
--}}
