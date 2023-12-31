

@extends('layouts/blankLayout')

@section('title', 'Check Kuota - Check')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection
<div id="customToast" class="bs-toast toast toast-placement-ex m-2 top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
      <i class="bx bx-bell me-2"></i>
      <div class="me-auto fw-medium"></div>
      <small>1 min ago</small>
      <button type="button" class="btn-close" data-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body"></div>
</div>
@section('content')
<div id="cover-spin"></div>
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'var(--bs-primary)'])</span>
              <span class="app-brand-text demo text-body fw-bold">{{config('variables.templateName')}}</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Welcome to {{config('variables.templateName')}}! 👋</h4>
          <p class="mb-4">Sidompul Check Kuota V1</p>

          <div id="formnya" class="mb-3">
            <div class="mb-3">
              <label for="msisdn" class="form-label">Nomor Xl Kamu</label>
              <input type="number" class="form-control" id="msisdn" name="msisdn" placeholder="Ex: 0878xxx/62878xxx" autofocus>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me">
                <label class="form-check-label" for="remember-me">
                  Remember number
                </label>
              </div>
            </div>
            <div class="mb-3">
              <button id="submitCekKuota" class="btn btn-primary d-grid w-100">Check</button>
            </div>
          </div>

          <p class="text-center">
            <span>Ingin Coba Fitur untuk V2rey Stb?</span>
            <a href="{{url('copybflash')}}">
              <span>(CopyBFlash)</span>
            </a>
          </p>
          <p class="text-left" id="hasilnya"></p>
        </div>
        
      </div>
    </div>
    <!-- /Register -->
  </div>
</div>
</div>
<style>
  #cover-spin {
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background-color: rgba(255, 255, 255, 0.7);
    z-index: 9999;
    display: none;
}

.spinner {
    position: absolute;
    top: 50%;
    left: 50%;
    border: 8px solid #f3f3f3;
    border-top: 8px solid #3498db;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: translate(-50%, -50%) rotate(0deg); }
    100% { transform: translate(-50%, -50%) rotate(360deg); }
}

</style>
<!-- Custom JavaScript -->
<script type="text/javascript">
  $(document).ready(function(){
      $('#submitCekKuota').click(function(){
          $.ajax({
              type: 'GET',
              crossDomain: true,
              url: "https://apigw.kmsp-store.com/sidompul/v1/cek_kuota?msisdn=" + $('#msisdn').val() + "&isJSON=true",
              data: {},
              dataType: 'JSON',
              'contentType': 'application/x-www-form-urlencoded',
              error: function(xhr, ajaxOptions, thrownError){
                  //error
                  $('#cover-spin').hide();
                  showCustomToast('error', 'Terjadi kesalahan. Silakan coba lagi!');
              },
              cache: false,
              beforeSend: function(request){
                  request.setRequestHeader('Authorization', 'Basic c2lkb21wdWxhcGk6YXBpZ3drbXNw');
                  request.setRequestHeader('X-API-Key', '6fb99971-2a2f-40ed-815d-a64df9f3c975');
                  request.setRequestHeader('X-App-Version', '1.0.0');
                  //sebelum kirim
                  $('#cover-spin').show(0);
              },
              success: function(s){
                  //console.log(s);
                  $('#cover-spin').hide();

                  if(s['status'] == false) {
                      showCustomToast('error', s['message']);
                      $('#hasilnya').html('');
                      $('#hasilnya').html("<br>" + '<font style="color: red;"><b>' + s['data']['keteranganError'] + '</b></font>');
                  }

                  if(s['status'] == true) {
                      showCustomToast('success', s['message']);
                      $('#hasilnya').html('');
                      $('#hasilnya').html("<br>" + s['data']['hasil']);
                  }
              }
          });
      });
  });

  $(document).on('keypress', function(e) {
      if(e.which == 13 && $("#msisdn").is(":focus")) {
          $.ajax({
              type: 'GET',
              crossDomain: true,
              url: "https://apigw.kmsp-store.com/sidompul/v1/cek_kuota?msisdn=" + $('#msisdn').val() + "&isJSON=true",
              data: {},
              dataType: 'JSON',
              'contentType': 'application/x-www-form-urlencoded',
              error: function(xhr, ajaxOptions, thrownError){
                  //error
                  $('#cover-spin').hide();
                  showCustomToast('error', 'Terjadi kesalahan. Silakan coba lagi!');
              },
              cache: false,
              beforeSend: function(request){
                  request.setRequestHeader('Authorization', 'Basic c2lkb21wdWxhcGk6YXBpZ3drbXNw');
                  request.setRequestHeader('X-API-Key', '6fb99971-2a2f-40ed-815d-a64df9f3c975');
                  request.setRequestHeader('X-App-Version', '1.0.0');
                  //sebelum kirim
                  $('#cover-spin').show(0);
              },
              success: function(s){
                  //console.log(s);
                  $('#cover-spin').hide();

                  if(s['status'] == false) {
                      showCustomToast('error', s['message']);
                      $('#hasilnya').html('');
                      $('#hasilnya').html("<br>" + '<font style="color: red;"><b>' + s['data']['keteranganError'] + '</b></font>');
                  }

                  if(s['status'] == true) {
                      toastr.success(s['message']);
                      showCustomToast('success', s['message']);
                      $('#hasilnya').html('');
                      $('#hasilnya').html("<br>" + s['data']['hasil']);
                  }
              }
          });
      }
  });

  function showCustomToast(type, message) {
    var customToast = document.getElementById('customToast');
    var header = customToast.querySelector('.toast-header .me-auto');
    var body = customToast.querySelector('.toast-body');

    // Set nilai sesuai dengan parameter
    header.innerHTML = type;
    body.innerHTML = message;

    // Tambahkan class sesuai dengan jenis pesan
    customToast.classList.remove('bg-danger', 'bg-success'); // Hapus class yang mungkin sudah ada
    if (type === 'error') {
        customToast.classList.add('bg-danger');
    } else if (type === 'success') {
        customToast.classList.add('bg-success');
    }

    // Periksa jenis pesan, lalu tampilkan atau sembunyikan
    if (type === 'error' || type === 'success') {
        customToast.style.display = 'block';

        // Sembunyikan Toast setelah beberapa detik (misalnya, 5 detik)
        setTimeout(function () {
            customToast.style.display = 'none';
        }, 5000);
    }
}

</script>


@endsection
