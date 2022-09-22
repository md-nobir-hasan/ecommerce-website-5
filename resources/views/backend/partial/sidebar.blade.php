<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="@if (isset($sit->image)) {{ asset($site->image) }}@else{{ asset('assets/images/default/site-logo.png') }} @endif" alt=""
            class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">
            @if (isset($site->name)) {{$site->name}} @else{{'Ecommerce Website'}}
            @endif

        </span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @include('backend.partial.menu')
            </ul>
        </nav>
    </div>

</aside>
