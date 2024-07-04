@extends($adminTheme)

@section('title','User Create')

@section('content')
<main id="main" class="main">

    {{-- Page Title --}}
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="pagetitle mb-0 pt-1">
                <h1>User Create</h1>
            </div>
        </div>
        <div class="col-md-6 text-end">
            <a class="btn btn-danger text-white" href="{{ route('user.index') }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
        </div>
    </div>

    <div class="card">
        <div class="card-header"><i class="fas fa-users me-1"></i>User Create</div>
        <div class="card-body">
            <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data" autocomplete="off" class="form-class">
                @csrf
                @include('admin.user.form')
            </form>
        </div>
    </div>
</main>
@endsection