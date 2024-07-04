@extends($adminTheme)

@section('title','Admin Setting')

@section('content')
<main id="main" class="main">

    {{-- Page Title --}}
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="pagetitle mb-0 pt-1">
                <h1>Admin Setting</h1>
            </div>
        </div>
        <div class="col-md-6 text-end">
            <a class="btn btn-danger text-white" href="{{ route('admin.home') }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
        </div>
    </div>

    {{-- Content --}}
    <div class="card">
        <div class="card-header"><i class="fas fa-gear me-1"></i>Admin Setting</div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.setting.update') }}" enctype="multipart/form-data" autocomplete="off" class="form-class">
                @csrf
                @method('PUT')

                <div class="row">
                    {{-- Front Logo --}}
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label class="form-label custom-label">Logo :</label><span class="text-danger">*</span>
                            <input id="logo" type="file" class="form-control" name="logo">
                            @error('logo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="logo mt-1">
                                @if(isset($adminSetting['logo']))
                                    <img style="width:auto;height:100px;" src="{{ asset('uploads/logo/'.$adminSetting['logo']['value']) }}">
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Favicon Icon --}}
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label class="form-label custom-label">Favicon Icon :</label><span class="text-danger">*</span>
                            <input id="favicon_icon" type="file" class="form-control" name="favicon_icon">
                            @error('favicon_icon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="favicon_icon mt-1">
                                @if(isset($adminSetting['favicon_icon']))
                                    <img style="width:100px;height:100px;" src="{{ asset('uploads/favicon_icon/'.$adminSetting['favicon_icon']['value']) }}">
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Title --}}
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label class="form-label custom-label">Title :</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" name="title" value="{{ isset($adminSetting['title']['value']) ? $adminSetting['title']['value'] : '' }}" placeholder="Enter Title">
                        </div>
                    </div>
                </div><hr>

                {{-- Submit Button --}}
                <div class="row">
                    <div class="col-md-12 text-center mb-1 mt-2">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        var frontLogoValue = "{{ $adminSetting['logo']['value'] }}";
        var faviconValue = "{{ $adminSetting['favicon_icon']['value'] }}";

        if (frontLogoValue === '') {
            $('.logo').hide();
        } else {
            $('.logo').show();
        }

        if (faviconValue === '') {
            $('.favicon_icon').hide();
        } else {
            $('.favicon_icon').show();
        }
    });
</script>
@endsection