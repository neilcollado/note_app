@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle me-3"></i> {{ session('success') }}
    <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if (session('failed'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <i class="fas fa-times-circle me-3"></i> {{ session('failed') }}
  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
</div>
@endif
