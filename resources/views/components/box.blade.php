@if (isset($title))
<h4>{{ $title }}</h4>
@endif
<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
            {{ $slot }}
            </div>
        </div>
    </div>
</div>
