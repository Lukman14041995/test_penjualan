<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('Test Penjualan') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('BERKAH UD JAYA') }}</a>
        </div>
        <ul class="nav">
           
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Manjemen Pengguna') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li >
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('Profil Anda') }}</p>
                            </a>
                        </li>
                        <li >
                            <a href="{{ route('userindex')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Data Pengguna') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <li >
                <a href="{{route('productlist')}}">
                    <i class="tim-icons icon-bag-16"></i>
                    <p>{{ __('Product List') }}</p>
                </a>
            </li>
            <li >
                <a href="{{route('report')}}">
                    <i class="tim-icons icon-book-bookmark"></i>
                    <p>{{ __('Report Penjualan') }}</p>
                </a>
            </li>
           
            
        </ul>
    </div>
</div>
