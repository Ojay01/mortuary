@extends('layouts.admin')
@section('title', 'Generate QR code')
@section('content')

<!-- Content wrapper -->
<div class="content-wrapper">

  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Corpse /</span> Generate QR Code</h4>

    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">QR Code</h5>
            <small class="text-muted float-end">Select corpse to generate Code</small>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('qr.code') }}">
              @csrf
              <div class="mb-3">
                <label class="form-label" for="corpse">Corpses</label>
                <select class="select2" name="corpse">
                  <option disabled selected>Select Corpse to generate code</option>
                  @foreach ($corpses as $corpse)
                    <option value="{{ $corpse->id }}" 
                        {{ isset($selectedCorpse) && $selectedCorpse->id == $corpse->id ? 'selected' : '' }}>
                      {{ $corpse->name }} ({{ $corpse->created_at->format('d/m/Y') }})
                    </option>
                  @endforeach
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Generate</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    @if (isset($qrCodePath))
    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Generated QR Code</h5>
          </div>
          <div class="card-body text-center">
            <h5>{{ $selectedCorpse->name }}</h5>
            <img src="{{ asset($qrCodePath) }}" alt="QR Code">
            <br><br>
            <a href="{{ asset($qrCodePath) }}" download="{{ $selectedCorpse->name }}_QRCode.png" class="btn btn-success">Download QR Code</a>
          </div>
        </div>
      </div>
    </div>
    @endif

  </div>
  <!-- / Content -->

  <!-- Footer -->
  @include('footer')
  <!-- / Footer -->

  <div class="content-backdrop fade"></div>
</div>
<!--/ Content wrapper -->

@endsection
