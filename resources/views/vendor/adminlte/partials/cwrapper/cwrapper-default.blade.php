@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@if ($layoutHelper->isLayoutTopnavEnabled())
    @php($def_container_class = 'container')
@else
    @php($def_container_class = 'container-fluid')
@endif

{{-- Default Content Wrapper --}}
<div class="content-wrapper {{ config('adminlte.classes_content_wrapper', '') }}">

    {{-- Content Header --}}
    @hasSection('content_header')
        <div class="content-header">
            <div class="{{ config('adminlte.classes_content_header') ?: $def_container_class }}">
                @if (Session::has('errors'))
                    <div class="alert alert-danger" role="alert">
                        @foreach (Session::get('errors')->messages() as $errors)
                            @foreach ($errors as $error)
                                {{ $error }}
                            @endforeach
                        @endforeach
                    </div>
                @endif
                @yield('content_header')
            </div>
        </div>


    @endif

    {{-- Main Content --}}
    <div class="content">
        <div class="{{ config('adminlte.classes_content') ?: $def_container_class }}">
            @yield('content')
        </div>
    </div>

</div>
