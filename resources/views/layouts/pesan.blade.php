@if ($errors->any())
<div class="bs-toast toast toast-placement-ex m-2 show bg-danger top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true" id="errorToast">
    <div class="toast-header">
      <i class='bx bx-bell me-2'></i>
      <div class="me-auto fw-medium">Error</div>
      <small>1 mins ago</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      <ul>
        @foreach ($errors->all() as $item)
            <li>{{$item}}</li>
        @endforeach
      </ul>
    </div>
  </div>

  <script>
    // Menutup pesan kesalahan secara otomatis setelah 5 detik
    setTimeout(function () {
        var toast = new bootstrap.Toast(document.getElementById('errorToast'));
        toast.hide();
    }, 3000);
</script>
@endif

@if (Session::get('success'))
<div class="bs-toast toast toast-placement-ex m-2 show bg-success top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true" id="successToast">
    <div class="toast-header">
      <i class='bx bx-bell me-2'></i>
      <div class="me-auto fw-medium">Success</div>
      <small>1 mins ago</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      <ul>
        <li>{{Session::get('success')}}</li>
      </ul>
    </div>
  </div>

  <script>
    // Menutup pesan kesalahan secara otomatis setelah 5 detik
    setTimeout(function () {
        var toast = new bootstrap.Toast(document.getElementById('successToast'));
        toast.hide();
    }, 3000);
</script>
@endif