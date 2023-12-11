@unless ($breadcrumbs->isEmpty())
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        @foreach ($breadcrumbs as $breadcrumb)
            @if(!$loop->last)
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ $breadcrumb->url }}" class="text-muted text-hover-primary">
                        {{ $breadcrumb->title }}
                    </a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-500 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
            @else
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-900">
                    {{ $breadcrumb->title }}
                </li>
                <!--end::Item-->
            @endif
        @endforeach
    </ul>
@endunless
