<div class="row my-2">
    <div class="col-md-6">
        <div class="form-group mt-1">
            <label class="form-label custom-label">Name :</label><span class="text-danger">*</span>
            <input id="name" type="text" class="form-control" name="name" value="{{ isset($user) ? $user->name : '' }}" placeholder="Enter Name">
            <span class="text-danger error-text name_err"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mt-1">
            <label class="form-label custom-label">Email :</label><span class="text-danger">*</span>
            <input id="email" type="text" class="form-control" name="email" value="{{ isset($user) ? $user->email : '' }}" placeholder="Enter Email">
            <span class="text-danger error-text email_err"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mt-1">
            <label class="form-label custom-label">Password :</label><span class="text-danger">*</span>
            <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Enter Password">
            <span class="text-danger error-text password_err"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mt-1">
            <label class="form-label custom-label">Confirm Password :</label><span class="text-danger">*</span>
            <input id="confirm_password" type="password" class="form-control" name="confirm_password" value="{{ old('confirm_password') }}" placeholder="Enter Confirm Password">
            <span class="text-danger error-text confirm_password_err"></span>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12 text-center">
        <button type="submit" class="save-btn btn btn-primary"><i class="fa fa-save"></i> Save</button>
    </div>
</div>