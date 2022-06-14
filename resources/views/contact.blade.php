@extends('layouts.layout')
@section('main-content')
            <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Contact Us</h2>
                        </div>
                        <div class="col-12">
                            <a href="/">Home</a>
                            <a href="">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->


            <!-- Contact Start -->
            <div class="contact">
                <div class="container">
                    <div class="section-header">
                        <p>Contact Us</p>
                        <h2>Temukan Jawaban / Kirim Pesan</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="faqs">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                                                <span>1</span> Servis apa saja yang bisa dikerjakan?
                                            </a>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                            <div class="card-body">
                                                Servis yang dapat dikerjakan sangat bervariasi seperti servis TV, AC, Kulkas, dan Laptop.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link" data-toggle="collapse" href="#collapseTwo">
                                                <span>2</span> Berapa lama proses perbaikan?
                                            </a>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                Lama proses perbaikan sesuai dengan tingkat kerusakan, teknisi dapat menangani perbaikan biasanya selama maksimal 7 hari kerja.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link" data-toggle="collapse" href="#collapseThree">
                                                <span>3</span> Berapa biaya untuk servis?
                                            </a>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                Biaya servis tergantung jenis barang dan tingkat kerusakan, biaya servis dijamin terjangkau.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link" data-toggle="collapse" href="#collapseFour">
                                                <span>4</span> Bagaimana cara memesan servis?
                                            </a>
                                        </div>
                                        <div id="collapseFour" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                Pelanggan dapat melakukan pendaftaran terlebih dahulu pada web TechNisi, kemudian pelanggan dapat melakukan pemesanan servis pada web tersebut.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link" data-toggle="collapse" href="#collapseFour">
                                                <span>5</span> Kapan hari kerja untuk teknisi servis?
                                            </a>
                                        </div>
                                        <div id="collapseFour" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                Hari kerja untuk teknisi adalah 7 hari kerja.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-form">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" placeholder="Nama Anda" required="required" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="email" class="form-control" placeholder="Email Anda" required="required" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Subjek" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="6" placeholder="Pesan" required="required" ></textarea>
                                    </div>
                                    <div><button class="btn" type="submit">Kirim Pesan</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
