<div class="row my-2">
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
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> {{ isset($user) ? 'Update' : 'Submit' }}</button>
    </div>
</div>