@extends('layouts.admin')

@section('title', 'Add Corpse')

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
     <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
                  <div class="container-xxl flex-grow-1 container-p-y">
            
            <h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Corpses/</span> Add Corpse
</h4>
<div class="row">
  <div class="col-12">
    <h5>Enroll</h5>
  </div>

  <!-- Default Wizard -->
  <div class="col-12 mb-4">
    <small class="text-light fw-medium">Basic</small>
    <div class="bs-stepper wizard-numbered mt-2">
      <div class="bs-stepper-header">
        <div class="step" data-target="#account-details">
          <button type="button" class="step-trigger">
            <span class="bs-stepper-circle">1</span>
            <span class="bs-stepper-label mt-1">
              <span class="bs-stepper-title">Brought By</span>
              <span class="bs-stepper-subtitle">Brought in by.</span>
            </span>
          </button>
        </div>
        <div class="line">
          <i class="bx bx-chevron-right"></i>
        </div>
        <div class="step" data-target="#personal-info">
          <button type="button" class="step-trigger">
            <span class="bs-stepper-circle">2</span>
            <span class="bs-stepper-label mt-1">
              <span class="bs-stepper-title">Corpse Info</span>
              <span class="bs-stepper-subtitle">Add Corpse info</span>
            </span>

          </button>
        </div>
        <div class="line">
          <i class="bx bx-chevron-right"></i>
        </div>
        <div class="step" data-target="#social-links">
          <button type="button" class="step-trigger">
            <span class="bs-stepper-circle">3</span>
            <span class="bs-stepper-label mt-1">
              <span class="bs-stepper-title">Storage Facility</span>
              <span class="bs-stepper-subtitle">Add Storage facility</span>
            </span>
          </button>
        </div>
      </div>
      <div class="bs-stepper-content">
        <form action=" {{route('add.corspe')}} " method="POST" >
        @csrf
          <!-- Account Details -->
          <div id="account-details" class="content">
            <div class="content-header mb-3">
              <h6 class="mb-0">Brought in by Details</h6>
              <small>Enter info about who brought in Corpse</small>
            </div>
            <div class="row g-3">
              <div class="col-sm-6">
                <label class="form-label" for="username">Name</label>
                <input type="text" id="username" class="form-control" placeholder="johndoe" name="brought_in_by_name" />
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="relative">Relation</label>
                <input type="text"  class="form-control" name="brought_in_by_relationship" placeholder="neighbor, witness, friend" aria-label="neighbor, witness, friend" />
              </div>
              <div class="col-sm-6 form-password-toggle">
                <label class="form-label" for="password">Brought Corpse from</label>
                <div class="input-group input-group-merge">
                <input type="text"  class="form-control" name="brought_in_by_from" placeholder="hospital, house, gutter..." aria-label="hospital, house, gutter..." />
                </div>
              </div>
              <div class="col-sm-6 form-password-toggle">
                <label class="form-label" for="confirm-password">Number of close relative</label>
                <div class="input-group input-group-merge">
                <input type="text"  class="form-control" name="relative_number" placeholder="+237677007700" aria-label="+237677007700" required />
                </div>
              </div>
              <div class="col-12 d-flex justify-content-between">
                <button class="btn btn-label-secondary btn-prev" disabled>
                  <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button type="button" class="btn btn-primary btn-next">
                  <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                  <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                </button>
              </div>
            </div>
          </div>
          <!-- Personal Info -->
          <div id="personal-info" class="content">
            <div class="content-header mb-3">
              <h6 class="mb-0">Personal Info</h6>
              <small>Enter Your Personal Info.</small>
            </div>
            <div class="row g-3">
              <div class="col-sm-6">
                <label class="form-label" for="corpse_name">Full Name</label>
                <input type="text"  class="form-control" placeholder="John Doe" name="corpse_name" required />
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="cause_of_death">Cause of Death</label>
                <input type="text"  class="form-control" placeholder="heart attack" name="cause_of_death" />
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="country">Country</label>
                <select class="select2" id="country" name="country" >
                  <option label=" "></option>
                  <option value="Cameroon" >Cameroon</option>
                  <option value="Nigeria" >Nigeria</option>
                  <option value="Chad" >Chad</option>
                  <option value="Senegal" >Senegal</option>
                  <option value="Gabon" >Gabon</option>
                  <option value="Other" >Other</option>
                </select>
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="flatpickr-date">Date of Removal</label>
                <input type="text" class="form-control" placeholder="YYYY-MM-DD" id="flatpickr-date" name="removal_date" />
              </div>
              <div class="col-12 d-flex justify-content-between">
                <button type="button" class="btn btn-primary btn-prev">
                  <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button type="button" class="btn btn-primary btn-next">
                  <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                  <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                </button>
              </div>
            </div>
          </div>
          <!-- Social Links -->
          <div id="social-links" class="content">
            <div class="content-header mb-3">
              <h6 class="mb-0">Storage facility Links</h6>
              <small>Corpse Storage Facility</small>
            </div>
            <div class="row g-3">
              <div class="col-sm-6">
                <label class="form-label" for="identified">Identified?</label>
        <select class="select2" name="identified" >
                <option disabled selected> Has the corpse been identified</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
                </select>
              </div>
              <div class="col-sm-6">
        <label class="form-label" for="storage">Storage</label>
        <select class="select2" id="storage">
            <option disabled selected> Select storage</option>
            <option value="Embalment">Embalment</option>
            <option value="Freezer">Freezer</option>
        </select>
    </div>

    <div class="col-sm-6 d-none" id="freezer-options">
        <label class="form-label" for="freezer-select">Choose Free Freezer</label>
        <select class="select2" id="freezer-select" name="freezer_id">
                <option disabled selected> Select free freezer</option>
        @foreach ($freezers as $freezer)
            <option value="{{$freezer->id}}">{{$freezer->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-sm-6 d-none" id="embalment-options">
        <label class="form-label" for="embalment-select">Choose Embalment</label>
        <select class="select2" id="embalment-select" name="embalment_id" >
                <option disabled selected> Select embalment room</option>
            @foreach ($embalments as $embalment)
            <option value="{{$embalment->id}}">{{$embalment->name}}</option>
            @endforeach
        </select>
    </div>
              
              <div class="col-12 d-flex justify-content-between">
                <button type="button" class="btn btn-primary btn-prev">
                  <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button type="submit" class="btn btn-success ">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /Default Wizard -->

<!-- Validation Wizard ->
  <div class="col-12 mb-4">
    <small class="text-light fw-medium">Validation</small>
    <div id="wizard-validation" class="bs-stepper mt-2">
      <div class="bs-stepper-header">
        <div class="step" data-target="#account-details-validation">
          <button type="button" class="step-trigger">
            <span class="bs-stepper-circle">1</span>
            <span class="bs-stepper-label mt-1">
              <span class="bs-stepper-title">Account Details</span>
              <span class="bs-stepper-subtitle">Setup Account Details</span>
            </span>
          </button>
        </div>
        <div class="line">
          <i class="bx bx-chevron-right"></i>
        </div>
        <div class="step" data-target="#personal-info-validation">
          <button type="button" class="step-trigger">
            <span class="bs-stepper-circle">2</span>
            <span class="bs-stepper-label mt-1">
              <span class="bs-stepper-title">Personal Info</span>
              <span class="bs-stepper-subtitle">Add personal info</span>
            </span>
          </button>
        </div>
        <div class="line">
          <i class="bx bx-chevron-right"></i>
        </div>
        <div class="step" data-target="#social-links-validation">
          <button type="button" class="step-trigger">
            <span class="bs-stepper-circle">3</span>
            <span class="bs-stepper-label mt-1">
              <span class="bs-stepper-title">Social Links</span>
              <span class="bs-stepper-subtitle">Add social links</span>
            </span>
          </button>
        </div>
      </div>
      <div class="bs-stepper-content">
        <form id="wizard-validation-form" onSubmit="return false">
          <!-- Account Details ->
          <div id="account-details-validation" class="content">
            <div class="content-header mb-3">
              <h6 class="mb-0">Account Details</h6>
              <small>Enter Your Account Details.</small>
            </div>
            <div class="row g-3">
              <div class="col-sm-6">
                <label class="form-label" for="formValidationUsername">Username</label>
                <input type="text" name="formValidationUsername" id="formValidationUsername" class="form-control" placeholder="johndoe" />
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="formValidationEmail">Email</label>
                <input type="email" name="formValidationEmail" id="formValidationEmail" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe" />
              </div>
              <div class="col-sm-6 form-password-toggle">
                <label class="form-label" for="formValidationPass">Password</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="formValidationPass" name="formValidationPass" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="formValidationPass2" />
                  <span class="input-group-text cursor-pointer" id="formValidationPass2"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="col-sm-6 form-password-toggle">
                <label class="form-label" for="formValidationConfirmPass">Confirm Password</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="formValidationConfirmPass" name="formValidationConfirmPass" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="formValidationConfirmPass2" />
                  <span class="input-group-text cursor-pointer" id="formValidationConfirmPass2"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="col-12 d-flex justify-content-between">
                <button class="btn btn-label-secondary btn-prev" disabled>
                  <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button class="btn btn-primary btn-next">
                  <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                  <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                </button>
              </div>
            </div>
          </div>
          <!-- Personal Info ->
          <div id="personal-info-validation" class="content">
            <div class="content-header mb-3">
              <h6 class="mb-0">Personal Info</h6>
              <small>Enter Your Personal Info.</small>
            </div>
            <div class="row g-3">
              <div class="col-sm-6">
                <label class="form-label" for="formValidationFirstName">First Name</label>
                <input type="text" id="formValidationFirstName" name="formValidationFirstName" class="form-control" placeholder="John" />
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="formValidationLastName">Last Name</label>
                <input type="text" id="formValidationLastName" name="formValidationLastName" class="form-control" placeholder="Doe" />
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="formValidationCountry">Country</label>
                <select class="select2" id="formValidationCountry" name="formValidationCountry">
                  <option label=" "></option>
                  <option>UK</option>
                  <option>USA</option>
                  <option>Spain</option>
                  <option>France</option>
                  <option>Italy</option>
                  <option>Australia</option>
                </select>
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="formValidationLanguage">Language</label>
                <select class="selectpicker w-auto" id="formValidationLanguage" data-style="btn-transparent" data-icon-base="bx" data-tick-icon="bx-check text-white" name="formValidationLanguage" multiple>
                  <option>English</option>
                  <option>French</option>
                  <option>Spanish</option>
                </select>
              </div>
              <div class="col-12 d-flex justify-content-between">
                <button class="btn btn-primary btn-prev">
                  <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button class="btn btn-primary btn-next">
                  <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                  <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                </button>
              </div>
            </div>
          </div>
          <!-- Social Links ->
          <div id="social-links-validation" class="content">
            <div class="content-header mb-3">
              <h6 class="mb-0">Social Links</h6>
              <small>Enter Your Social Links.</small>
            </div>
            <div class="row g-3">
              <div class="col-sm-6">
                <label class="form-label" for="formValidationTwitter">Twitter</label>
                <input type="text" name="formValidationTwitter" id="formValidationTwitter" class="form-control" placeholder="https://twitter.com/abc" />
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="formValidationFacebook">Facebook</label>
                <input type="text" name="formValidationFacebook" id="formValidationFacebook" class="form-control" placeholder="https://facebook.com/abc" />
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="formValidationGoogle">Google+</label>
                <input type="text" name="formValidationGoogle" id="formValidationGoogle" class="form-control" placeholder="https://plus.google.com/abc" />
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="formValidationLinkedIn">LinkedIn</label>
                <input type="text" name="formValidationLinkedIn" id="formValidationLinkedIn" class="form-control" placeholder="https://linkedin.com/abc" />
              </div>
              <div class="col-12 d-flex justify-content-between">
                <button class="btn btn-primary btn-prev">
                  <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button class="btn btn-success btn-next btn-submit">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /Validation Wizard -->

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

        <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
  </div>
  <!-- / Layout wrapper -->
    <!--/ Layout Content -->
@endsection