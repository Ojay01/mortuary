@extends('layouts.admin')
@section('title', 'Profile')
@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Account Settings /</span> Account
        </h4>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('accountSetting') }}"><i class="bx bx-lock-alt me-1"></i> Security</a></li>
                </ul>
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ $user->photo ? asset('storage/' . $user->photo) : 'assets/img/avatars/1.png' }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" name="photo" hidden accept="image/png, image/jpeg" />
                                </label>
                                <button type="button" class="btn btn-label-secondary account-image-reset mb-4" onclick="document.getElementById('upload').value = null;">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>
                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="firstName" class="form-label">Name</label>
                                    <input class="form-control" type="text" id="firstName" name="name" value="{{ old('name', $user->name) }}" autofocus />
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input class="form-control" type="text" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="john.doe@example.com" />
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="phoneNumber">Phone Number</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">CMR (+1237)</span>
                                        <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" value="{{ old('phoneNumber', $user->phoneNumber) }}" placeholder="673909858" />
                                    </div>
                                    @error('phoneNumber')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user->address) }}" placeholder="Address" />
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="state" class="form-label">Region</label>
                                    <select id="state" name="region" class="select2 form-select">
                                        <option value="">Select</option>
                                        <option value="South West" {{ old('region', $user->region) == 'South West' ? 'selected' : '' }}>South West</option>
                                        <option value="North West" {{ old('region', $user->region) == 'North West' ? 'selected' : '' }}>North West</option>
                                        <option value="South" {{ old('region', $user->region) == 'South' ? 'selected' : '' }}>South</option>
                                        <option value="West" {{ old('region', $user->region) == 'West' ? 'selected' : '' }}>West</option>
                                        <option value="Adamawa" {{ old('region', $user->region) == 'Adamawa' ? 'selected' : '' }}>Adamawa</option>
                                        <option value="Far North" {{ old('region', $user->region) == 'Far North' ? 'selected' : '' }}>Far North</option>
                                        <option value="North" {{ old('region', $user->region) == 'North' ? 'selected' : '' }}>North</option>
                                        <option value="East" {{ old('region', $user->region) == 'East' ? 'selected' : '' }}>East</option>
                                        <option value="Littoral" {{ old('region', $user->region) == 'Littoral' ? 'selected' : '' }}>Littoral</option>
                                        <option value="Centre" {{ old('region', $user->region) == 'Centre' ? 'selected' : '' }}>Centre</option>
                                    </select>
                                    @error('region')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="country">Country</label>
                                    <select id="country" name="country" class="select2 form-select">
                                        <option value="">Select</option>
                                        <option value="Cameroon" {{ old('country', $user->country) == 'Cameroon' ? 'selected' : '' }}>Cameroon</option>
                                    </select>
                                    @error('country')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <button type="reset" class="btn btn-label-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
