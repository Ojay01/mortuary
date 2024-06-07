@extends('layouts.admin')
@section('title', 'Add Staff')
@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Staff /</span> Add
        </h4>
        <div class="row mx-auto">
<div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Add Staff</h5>
        <small class="text-muted float-end">Add Mortuary Staffs</small>
      </div>
      <div class="card-body">
       <form method="POST" action="{{ route('staffs.store') }}">
    @csrf
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
              <input type="text" name="name" class="form-control" id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-company">Address</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
              <input type="text" name="address" id="basic-icon-default-company" class="form-control" placeholder="Bepanda Omnisport." aria-label="Bepanda Omnisport." aria-describedby="basic-icon-default-company2" />
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-email">Email</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="bx bx-envelope"></i></span>
              <input type="email" name="email" id="basic-icon-default-email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-icon-default-email2" />
              <span id="basic-icon-default-email2" class="input-group-text">@mortuary.cloud</span>
            </div>
            <div class="form-text"> You can use letters, numbers & periods </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-phone">Phone No</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
              <input type="number" name="phoneNumber" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
            </div>
          </div>
          <div class="mb-3 col-md-12">
    <label class="form-label" for="country">Country</label>
        <select class="form-select select2"  name="country">
            <option disabled  label="Select Country"> Select Country </option>
            <option selected value="Cameroon">Cameroon</option>
            <option value="Nigeria">Nigeria</option>
            <option value="Chad">Chad</option>
            <option value="Senegal">Senegal</option>
            <option value="Gabon">Gabon</option>
            <option value="Other">Other</option>
        </select>
</div>
          <div class="mb-3 col-md-12">
    <label class="form-label" for="country">Region</label>
        <select class="form-select select2"  name="region">
            <option disabled  value="">Select</option>
                                        <option value="South West" >South West</option>
                                        <option value="North West" >North West</option>
                                        <option value="South" >South</option>
                                        <option value="West" >West</option>
                                        <option value="Adamawa" >Adamawa</option>
                                        <option value="Far North" >Far North</option>
                                        <option value="North" >North</option>
                                        <option value="East" >East</option>
                                        <option value="Littoral" >Littoral</option>
                                        <option value="Centre">Centre</option>
        </select>
</div>

<div class="mb-3 form-password-toggle">
              <label class="form-label" for="newPassword"> Password</label>
              <div class="input-group input-group-merge">
                <input class="form-control" type="password" id="newPassword" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>

            <div class="mb-3  form-password-toggle">
              <label class="form-label" for="confirmPassword">Confirm Password</label>
              <div class="input-group input-group-merge">
                <input class="form-control" type="password" name="password_confirmation" id="confirmPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
              
            <div class="col-12 mb-4">
              <p class="fw-medium mt-2">Password Requirements:</p>
              <ul class="ps-3 mb-0">
                <li class="mb-1">
                  Minimum 8 characters long - the more, the better
                </li>
                <li class="mb-1">At least one lowercase character</li>
                <li>At least one number, symbol, or whitespace character</li>
              </ul>
            </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>


    </div>
    @include('footer')
</div>
@endsection
