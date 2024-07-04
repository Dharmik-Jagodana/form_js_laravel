@extends($adminTheme)

@section('title','Profile')

@section('content')
<main id="main" class="main">

    {{-- Page Title --}}
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="pagetitle mb-0 pt-1">
                <h1>Profile</h1>
            </div>
        </div>
        <div class="col-md-6 text-end">
            <a class="btn btn-danger text-white" href="{{ route('admin.home') }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
        </div>
    </div>

    {{-- User Data --}}
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-user me-1"></i>Profile</div>
        <div class="card-body">
            <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data" autocomplete="off" class="form-class">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mt-1">
                            <label class="form-label custom-label">Name :</label><span class="text-danger">*</span>
                            <input id="name" type="text" class="form-control" name="name" value="{{ isset($user) ? $user->name : '' }}" placeholder="Enter Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-1">
                            <label class="form-label custom-label">Email :</label><span class="text-danger">*</span>
                            <input id="email" type="text" class="form-control" name="email" value="{{ isset($user) ? $user->email : '' }}" placeholder="Enter Email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-1">
                            <label class="form-label custom-label">Password :</label><span class="text-danger">*</span>
                            <input id="password" type="text" class="form-control" name="password" value="{{ old('password') }}" placeholder="Enter Password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-1">
                            <label class="form-label custom-label">Confirm Password :</label><span class="text-danger">*</span>
                            <input id="confirm_password" type="text" class="form-control" name="confirm_password" value="{{ old('confirm_password') }}" placeholder="Enter Confirm Password">
                            @error('confirm_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection