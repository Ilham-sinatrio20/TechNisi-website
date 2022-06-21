@extends('layouts.layout')
<head>
        <link rel="stylesheet" href="css/notif.css">
</head>
@section('main-content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />

<div class="container">
            <div class="box shadow-sm rounded bg-white mb-3">
                <div class="box-title border-bottom p-3">
                    <h6 class="m-0">Recent</h6>
                </div>
                <div class="box-body p-0">
                    <div class="p-3 d-flex align-items-center bg-light border-bottom osahan-post-header">
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="https://i.pinimg.com/originals/91/a6/b1/91a6b1001107a5c6a682ef1715c8422b.jpg" alt="" />
                        </div>
                        <div class="font-weight-bold mr-3">
                            <div class="text-truncate">Pesanan Masuk</div>
                            <div class="small">Rian: AC tidak dingin</div>
                        </div>
                        <span class="ml-auto mb-auto">
                            <div class="btn-group">
                                <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                </div>
                            </div>
                            <br />
                            <div class="text-right text-muted pt-1">now</div>
                        </span>
                    </div>
                    <div class="p-3 d-flex align-items-center bg-light border-bottom osahan-post-header">
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="https://i.pinimg.com/736x/24/6f/85/246f85290e48c8b559cad272c5170cba.jpg" alt="" />
                        </div>
                        <div class="font-weight-bold mr-3">
                            <div class="text-truncate">Pesanan Masuk</div>
                            <div class="small">Intan: TV tidak bisa menyala</div>
                        </div>
                        <span class="ml-auto mb-auto">
                            <div class="btn-group">
                                <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                </div>
                            </div>
                            <br />
                            <div class="text-right text-muted pt-1">5m</div>
                        </span>
                    </div>
                    <div class="p-3 d-flex align-items-center bg-light border-bottom osahan-post-header">
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="https://th.bing.com/th/id/OIP.UfmefPnHZ31Hu9oyA8P2CAAAAA?pid=ImgDet&w=299&h=299&rs=1" alt="" />
                        </div>
                        <div class="font-weight-bold mr-3">
                            <div class="text-truncate">Pesanan Diproses</div>
                            <div class="small">Nadin: Ditunggu ya.</div>
                        </div>
                        <span class="ml-auto mb-auto">
                            <div class="btn-group">
                                <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                </div>
                            </div>
                            <br />
                            <div class="text-right text-muted pt-1">1h</div>
                        </span>
                    </div>
                    <div class="p-3 d-flex align-items-center bg-light border-bottom osahan-post-header">
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="https://th.bing.com/th/id/OIP.UfmefPnHZ31Hu9oyA8P2CAAAAA?pid=ImgDet&w=299&h=299&rs=1" alt="" />
                        </div>
                        <div class="font-weight-bold mr-3">
                            <div class="text-truncate">Pesanan Diproses</div>
                            <div class="small">Rika: Ditunggu ya. Alamat sudah sesuai.</div>
                        </div>
                        <span class="ml-auto mb-auto">
                            <div class="btn-group">
                                <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                </div>
                            </div>
                            <br />
                            <div class="text-right text-muted pt-1">2h</div>
                        </span>
                    </div>
                </div>
            </div>
            <div class="box shadow-sm rounded bg-white mb-3">
                <div class="box-title border-bottom p-3">
                    <h6 class="m-0">Earlier</h6>
                </div>
                <div class="box-body p-0">
                <div class="p-3 d-flex align-items-center bg-light border-bottom osahan-post-header">
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="https://peo.gov.au/public/assets/pass-the-bill/images/people/president.png" alt="" />
                        </div>
                        <div class="font-weight-bold mr-3">
                            <div class="text-truncate">Pesanan Selesai</div>
                            <div class="small">Hera: Terima kasih Teknisi!</div>
                        </div>
                        <span class="ml-auto mb-auto">
                            <div class="btn-group">
                                <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                </div>
                            </div>
                            <br />
                            <div class="text-right text-muted pt-1">4d</div>
                        </span>
                    </div>
                    <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                        <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="https://a0.anyrgb.com/pngimg/456/1028/topcoder-programming-language-source-code-programmer-software-developer-computer-programming-software-development-avatar-icon-design-conversation-thumbnail.png" alt="" /></div>
                        <div class="font-weight-bold mr-3">
                            <div class="text-truncate">Pesanan Selesai</div>
                            <div class="small">M.Arief: Terima kasih Teknisi!</div>
                        </div>
                        <span class="ml-auto mb-auto">
                            <div class="btn-group">
                                <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                </div>
                            </div>
                            <br />
                            <div class="text-right text-muted pt-1">4d</div>
                        </span>
                    </div>
                    <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                        <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="https://th.bing.com/th/id/OIP.UfmefPnHZ31Hu9oyA8P2CAAAAA?pid=ImgDet&w=299&h=299&rs=1" alt="" /></div>
                        <div class="font-weight-bold mr-3">
                            <div class="text-truncate">Pesanan Selesai</div>
                            <div class="small">Veranika: Terima kasih Teknisi!</div>
                        </div>
                        <span class="ml-auto mb-auto">
                            <div class="btn-group">
                                <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                </div>
                            </div>
                            <br />
                            <div class="text-right text-muted pt-1">4d</div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection