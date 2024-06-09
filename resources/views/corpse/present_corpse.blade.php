@extends('layouts.admin')
@section('title', 'Available Corpse')
@section('content')

     <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
                  <div class="container-xxl flex-grow-1 container-p-y">
            
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Corpse/</span> Available Corpse</h4>

<!-- Basic Layout -->
<!-- Users List Table -->
<div class="card">
  <div class="card-header">
    <h5 class="card-title mb-0">Available Corpse</h5>
  </div>
  <div class="card-datatable table-responsive">
    <table class=" table border-top">
    <thead>
        <tr>
            <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 0px; display: none;" tabindex="0"></th>
            <th>Name</th>
            <th>Location</th>
            <th>Contact</th>
            <th>Status</th>
            <th>Removal Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
   @foreach($availableCorpse as $corpse)
<tr class="odd">
    <td class="sorting_1">
        <div class="d-flex justify-content-start align-items-center user-name">
            <div class="avatar-wrapper">
                <div class="avatar avatar-sm me-3">
                    <span class="avatar-initial rounded-circle bg-label-info">{{$corpse->id}}</span>
                </div>
            </div>
            <div class="d-flex flex-column">
            <a href="{{ route('corpseProfile', $corpse->qr_code) }}" class="text-body text-truncate">
                <span class="fw-medium">{{ $corpse->name }}</span>
            </a>
            <span class="fw-medium text-muted">{{ $corpse->qr_code }}</span>
        </div>

        </div>
    </td>
    <td>
                        <span class="user-email">
                            @if($corpse->freezer_id)
                                {{ $corpse->freezer->name }}
                            @elseif($corpse->embalment_id)
                                {{ $corpse->embalmment->name }}
                            @else
                                N/A
                            @endif
                        </span>
                    </td>
    <td>
        <span class="user-email">{{$corpse->relative_number}}</span>
    </td>
    <td class="text-center">
    @if($corpse->status == 'available')
            <i class="bx fs-4 bx-check-circle text-success"> Available</i>
        @elseif($corpse->status == 'autopsy')
            <i class="bx fs-4 bx-x-circle text-warning"> In Autopsy</i>
        @elseif($corpse->status == 'removed')
            <i class="bx fs-4 bx-trash text-info"> Removed</i>
        @else
            <i class="bx fs-4 bx-error text-danger"> Missing</i>
        @endif
    </td>
    <td>
        <span class="user-email">{{$corpse->removal_date}}</span>
    </td>
    <td>
        <div class="d-inline-block text-nowrap">
            <button class="btn btn-sm btn-icon edit-record" data-id="{{$corpse->id}}" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUpdatecorpse{{$corpse->id}}">
                <i class="bx bx-edit"></i>
            </button>
            <button class="btn btn-sm btn-icon delete-record" data-id="{{$corpse->id}}">
                <i class="bx bx-trash"></i>
            </button>
        </div>
    </td>
</tr>

<!-- Offcanvas to update corpse -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUpdatecorpse{{$corpse->id}}" aria-labelledby="offcanvasUpdatecorpseLabel{{$corpse->id}}">
    <div class="offcanvas-header">
        <h5 id="offcanvasUpdatecorpseLabel{{$corpse->id}}" class="offcanvas-title">Update corpse</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
        <form class="add-new-user pt-0" id="addNewUserForm{{$corpse->id}}" action="#" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label" for="add-user-fullname{{$corpse->id}}">Name</label>
                <input type="text" class="form-control" id="add-user-fullname{{$corpse->id}}" value="{{$corpse->name}}" placeholder="embalm101" name="name" aria-label="embalm101" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-email{{$corpse->id}}">Location</label>
                @php
    $storageName = 'N/A';
    if ($corpse->freezer_id) {
        $storageName = $corpse->freezer->name;
    } elseif ($corpse->embalment_id) {
        $storageName = $corpse->embalmment->name;
    }
@endphp

<input type="text" id="add-user-email{{ $corpse->id }}" class="form-control" value="{{ $storageName }}" placeholder="corpse room1" aria-label="corpse room1" name="location" required />

                <div class="mb-3">
        <label class="form-label" for="capacity">Contact</label>
        <input type="relative_number" id="capacity" class="form-control" placeholder="Relative phone number" value="{{$corpse->relative_number}}" aria-label="12" name="relative_number" required />
    </div>
            </div>
            <div class="mb-3 ">
                                    <label for="status{{$corpse->id}}" class="form-label">Stutus</label>
                                    <select id="status{{$corpse->id}}" name="status" class=" form-select" required>
                                        <option value="" disabled>Select</option>
                                       <option value="available" {{  $corpse->status == 'available' ? 'selected' : '' }}>Available</option>
                                        <option value="autopsy" {{ $corpse->status == 'autopsy' ? 'selected' : '' }}>Autopsy</option>
                                        <option value="removed" {{ $corpse->status == 'removed' ? 'selected' : '' }}>Removed</option>
                                        <option value="missing" {{  $corpse->status == 'missing' ? 'selected' : '' }}>Missing</option>
                                    </select>
                                </div>
            <button type="button" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        </form>
    </div>
</div>
@endforeach

       
    </tbody>
</table>

</div>


  <!-- Offcanvas to add new user -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditcorpse" aria-labelledby="offcanvasAddcorpseLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasAddcorpseLabel" class="offcanvas-title">Add corpse</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
      <form class="add-new-user pt-0" id="addNewUserForm" action="#" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label" for="add-user-fullname">Name</label>
        <input type="text" class="form-control" id="add-user-fullname" placeholder="embalm101" name="name" aria-label="embalm101" required />
    </div>
    <div class="mb-3">
        <label class="form-label" for="add-user-email">Location</label>
        <input type="text" id="add-user-email" class="form-control" placeholder="corpse room1" aria-label="corpse room1" name="location" required />
    </div>
    <div class="mb-3">
        <label class="form-label" for="capacity">Capacity</label>
        <input type="number" id="capacity" class="form-control" placeholder="number of corpses" aria-label="12" name="capacity" required />
    </div>
    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
</form>

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