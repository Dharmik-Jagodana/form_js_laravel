@extends($adminTheme)

@section('title','User Edit')

@section('content')
<main id="main" class="main">

    {{-- Page Title --}}
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="pagetitle mb-0 pt-1">
                <h1>User Edit</h1>
            </div>
        </div>
        <div class="col-md-6 text-end">
            <a class="btn btn-danger text-white" href="{{ route('user.index') }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
        </div>
    </div>

    <div class="card">
        <div class="card-header"><i class="fas fa-users me-1"></i>User Edit</div>
        <div class="card-body">
            <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data" autocomplete="off" class="form-class">
                @method('PUT')
                @csrf
                @include('admin.user.form')
            </form>
        </div>
    </div>
</main>
@endsection