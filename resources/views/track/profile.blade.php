@extends('layouts.app')
@section('title', 'Corpse Profile')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Function to show/hide select elements based on "Storage" selection
    function updateStorageOptions() {
        var storage = $('#storage').val();
        var freezerOptions = $('#freezer-options');
        var embalmentOptions = $('#embalment-options');
        
        if (storage === 'Freezer') {
            freezerOptions.removeClass('d-none');
            embalmentOptions.addClass('d-none');
        } else if (storage === 'Embalment') {
            embalmentOptions.removeClass('d-none');
            freezerOptions.addClass('d-none');
        } else {
            freezerOptions.addClass('d-none');
            embalmentOptions.addClass('d-none');
        }
    }

    // Initial call to set the correct visibility based on the default selection
    updateStorageOptions();

    // Add event listener to the "Storage" select element
    $('#storage').on('change', updateStorageOptions);
});
</script>
<!-- Add this script to the corpse profile page -->

<!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
                  <div class="container-xxl flex-grow-1 container-p-y">
            
            <h4 class="py-3 mb-4">
  <span class="text-muted fw-light">MY Corpse Profile </span>
</h4>

<!-- Header -->
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="user-profile-header-banner">
        <img src="/assets/img/pages/profile-banner.png" alt="Banner image" class="rounded-top">
      </div>
      <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
        @if ($qrCodePath)
    <img src="{{ asset($qrCodePath) }}" alt="QR Code" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
    @else
        <img src="/assets/img/avatars/1.png" alt=" image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
    @endif
        </div>
        <div class="flex-grow-1 mt-3 mt-sm-5">
          <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
            <div class="user-profile-info">
              <h4>{{$corpse->name}}</h4>
              <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                <li class="list-inline-item fw-medium">
                  <i class='bx bx-pen'></i> 
                  @if ($corpse->identified == 1)
                  <span class="text-success">Identified</span>
                  @else
                <span class="text-danger">Unidentified</span> 
                  @endif
                </li>
                <li class="list-inline-item fw-medium">
                  <i class='bx bx-map'></i> {{$corpse->country}}
                </li>
                <li class="list-inline-item fw-medium">
                  <i class='bx bx-calendar-alt'></i> Enrolled <b>{{$corpse->created_at->format('d-M-Y')}}</b>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Header -->

<!-- Navbar pills -->
<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-sm-row mb-4">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class='bx bx-user me-1'></i> Profile</a></li>
    </ul>
  </div>
</div>
<!--/ Navbar pills -->
<!-- Multi Column with Form Separator -->
<div class="card mb-4">
  <h5 class="card-header">Corpse Profile</h5>
  <form class="card-body" action="#" method="POST">
    @csrf
    @method('PUT')
    <h6>1. Relative Details</h6>
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label" for="multicol-username">Name</label>
        <input type="text" id="multicol-username" class="form-control" placeholder="john doe" name="brought_by_name" value="{{ $broughtBy->name }}" disabled />
      </div>
      <div class="col-md-6">
        <label class="form-label" for="multicol-email">Brought In From</label>
        <div class="input-group ">
        <input type="text" disabled class="form-control" placeholder="john.doe" aria-label="{{ $broughtBy->from }}" name="from" value="{{ $broughtBy->from }}" aria-describedby="multicol-email2" />
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-password-toggle">
          <label class="form-label" for="multicol-password">Relationship</label>
          <div class="input-group ">
            <input type="text" disabled class="form-control" placeholder="Aunty" name="relationship" value="{{ $broughtBy->relationship }}" />
          </div>
        </div>
      </div>
      <div class="col-md-6">
      <label class="form-label" for="basic-icon-default-phone">Phone No</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
              <input type="number" disabled id="basic-icon-default-phone" class="form-control phone-mask" name="relative_number" value="{{ $corpse->relative_number }}" placeholder="{{ $corpse->relative_number }}" aria-label="{{ $corpse->relative_number }}" aria-describedby="basic-icon-default-phone2" />
            </div>
      </div>
    </div>
    <hr class="my-4 mx-n4" />
    <h6>2. Personal Info</h6>
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label" for="multicol-first-name">Full Name</label>
        <input type="text" id="multicol-first-name" disabled class="form-control" placeholder="John Doe" name="name"  value="{{$corpse->name}}" />
      </div>
      <div class="col-md-6">
        <label class="form-label" for="multicol-last-name">QR Code</label>
        <input type="text" id="multicol-last-name"  class="form-control" name="qr_code" value="{{$corpse->qr_code}}" disabled />
      </div>
      <div class="col-md-6">
        <label class="form-label" for="multicol-country">Country</label>
        <div class="input-group input-group-merge">
              <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-globe"></i></span>
        <input type="text" id="multicol-last-name"  class="form-control" name="country" value="{{$corpse->country}}" disabled />
        </div>
      </div>
      <div class="col-md-6 select2-primary">
        <label for="status{{$corpse->id}}" class="form-label">Stutus</label>
        <input type="text" id="multicol-last-name"  class="form-control" name="status" value="{{$corpse->status}}" disabled />
      </div>
      <div class="col-md-6">
        <label class="form-label" for="multicol-birthdate">Bill</label>
        <div class="input-group input-group-merge">
              <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-money"></i></span>
              <input type="number" disabled id="basic-icon-default-phone" class="form-control phone-mask" name="bill" value="{{ $corpse->bill }}" placeholder="{{ $corpse->bill }}" aria-label="{{ $corpse->bill }}" aria-describedby="basic-icon-default-phone2" />
            </div>
      </div>
      <div class="col-md-6 select2-primary">
        <label for="status{{$corpse->id}}" class="form-label">Identified?</label>
                <input type="text" id="multicol-last-name" class="form-control" name="identified" value="{{ $corpse->identified == 1 ? 'Yes' : 'No' }}" disabled />
      </div>
      <div class="col-md-6 select2-primary">
        <label for="status{{$corpse->id}}" class="form-label">Paid (Has settled Bill?)</label>
               <input type="text" id="multicol-last-name" class="form-control" name="paid" value="{{ $corpse->paid == 1 ? 'Yes' : 'No' }}" disabled />

      </div>
      <div class="col-md-6">
        <label class="form-label" for="multicol-birthdate">Removal Date</label>
        <input type="text" id="flatpickr-date" disabled class="form-control dob-picker" name="removal_date" value="{{$corpse->removal_date}}" placeholder="YYYY-MM-DD" />
      </div>
      <div class="col-md-6">
        <label class="form-label" for="multicol-phone">Cause of Death</label>
        <input type="text" name="cause_of_death" disabled class="form-control " name="cause_of_death" value="{{$corpse->cause_of_death}}" placeholder="Accident" aria-label="" />
      </div>
      
    </div>
 <div class="pt-4 text-center">
    @if($corpse->paid)
        <button type="button" class="btn btn-success" disabled>Paid</button>
    @else
        <button type="button" class="btn btn-primary">Pay Bill of {{ $corpse->bill }} XAF</button>
    @endif
</div>

  </form>
</div>

          </div>
          <!-- / Content -->

          <!-- Footer -->
                    <!-- Footer-->
@include('footer')
<!--/ Footer-->
                    <!-- / Footer -->
          <div class="content-backdrop fade"></div>
        </div>
        <!--/ Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

@endsection