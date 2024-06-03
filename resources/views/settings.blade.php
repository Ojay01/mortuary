@extends('layouts.admin')
@section('title', 'Settings')
@section('content')

<!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
                  <div class="container-xxl flex-grow-1 container-p-y">
            
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Settings/</span> Billing</h4>

<!-- Basic Layout -->
<div class="row">

  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Billing</h5>
        <small class="text-muted float-end">The cost of storage facilities</small>
      </div>
      <div class="card-body">
       <form method="POST" action="{{ route('settings.save') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label" for="freezers">Freezers</label>
        <div class="input-group input-group-merge">
            <span class="input-group-text">XAF/day</span>
            <input type="number" name="freezers" class="form-control" id="freezers" placeholder="25,000" aria-label="25,000" value="{{ $settings['freezers'] ?? 0 }}" required />
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="embalment_room">Embalmment Room</label>
        <div class="input-group input-group-merge">
            <span class="input-group-text">XAF/day</span>
            <input type="number" name="embalment_room" class="form-control" id="embalment_room" placeholder="12,000" aria-label="12,000" value="{{ $settings['embalment_room'] ?? 0 }}" required />
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>

      </div>
    </div>
  </div>
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

@endsection