@extends('layouts/blankLayout')

@section('title', 'CopyBflash- Account V2rey')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection


@section('content')
<div id="cover-spin"></div>
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register Card -->
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
          <h4 class="mb-2">Welcome to {{config('variables.templateName')}}! 🚀</h4>
          <p class="mb-4">Generate Akun V2rey BFlash, Tinggal Tempel di stb config kalian</p>

          <div id="formnya" class="mb-3">
            <div class="mb-3">
              <label for="domain" class="form-label">Bug domain</label>
                <div class="inline-spacing">
                  <button id="bugVisionBtn" class="btn btn-primary">Vision +</button>
                  <button id="bugEdukasiBtn" class="btn btn-primary">Edukasi</button>
                </div>
              <textarea id="domainInput" name="domainInput" class="form-control mt-2" rows="3" placeholder="Ex: facebook.com, google.com, 192.178.298, link"></textarea>
            </div>
            <div class="mb-3">
              <label for="port" class="form-label">Ubah Port</label>
              <input id="port" name="port" class="form-control" rows="3" placeholder="Ex: 80 or 443">
              <div id="defaultFormControlHelp" class="form-text">masukkan port yang diinginkan.</div>
            </div>
            <div class="mb-3">
              <label for="account" class="form-label">account v2rey</label>
              <textarea id="accountInput" name="accountInput" class="form-control" rows="3" placeholder="Ex: vmess://kasdkasdiek..."></textarea>
              <div id="defaultFormControlHelp" class="form-text">Di rekomendasikan menggunakan vmess non tls.</div>
            </div>

            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
                <label class="form-check-label" for="terms-conditions">
                  I agree to
                  <a href="javascript:void(0);">privacy policy & terms</a>
                </label>
              </div>
            </div>
            <button id="generate" class="btn btn-primary d-grid w-100">
              Generate
            </button>
          </div>

          <p class="text-center">
            <span>Check Kuota Sidompul V1?</span>
            <a href="{{url('/')}}">
              <span>Sayunk</span>
            </a>
          </p>
          <div class="mb-3">
            <label for="hasilnya" class="form-label">Hasil Generate</label>
            <textarea class="form-control" rows="3" name="hasilnya" id="hasilnya"></textarea>
            <button id="copyButton" type="button" class="btn btn-outline-primary">
              <span class="tf-icons bx bx-copy-alt me-1"></span>Copy Hasil
            </button>
          </div>
        </div>
      </div>
      <!-- Register Card -->
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
<script src="https://cdn.jsdelivr.net/npm/js-yaml@3.14.1/dist/js-yaml.min.js"></script>

<script>
  document.getElementById('bugVisionBtn').addEventListener('click', function() {
    fillTextareaWithBugVision();
  });
  document.getElementById('bugEdukasiBtn').addEventListener('click', function() {
    fillTextareaWithBugEdukasi();
  });

  document.getElementById('generate').addEventListener('click', function() {
    try {
      $('#cover-spin').show(0);
      processInputAndGenerate();
    } catch (error) {
      $('#cover-spin').hide();
      $('#hasilnya').html('');
      $('#hasilnya').html('' + error + '');
    }
  });

  function fillTextareaWithBugVision() {
    var bugVisionDomains = [
      "graph.facebook.com", "www.google.com", "shopee.co.id", "sb.scorecardresearch.com",
      "googleads.g.doubleclick.net", "certify.alexametrics.com", "pagead2.googlesyndication.com",
      "104.21.235.171", "104.21.235.172", "104.18.226.52", "104.18.225.52", "104.17.3.81",
      "104.17.2.81", "104.21.73.208", "172.67.192.40", "172.64.198.18", "172.64.199.18", "104.18.20.94",
      "162.159.128.7", "162.159.138.6", "104.22.62.150", "104.22.63.150", "172.67.8.9", "visionplus.id",
      "stream-cdn.mncnow.id", "api.visionplus.id", "www.visionplus.id", "stream.visionplus.id",
      "api.onesignal.com", "cdn.appsflyer.com", "zendesk1.shopee.tw", "zendesk1.shopee.sg",
      "zendesk1.shopee.ph", "api.midtrans.com",
    ];

    var domainInput = document.getElementById('domainInput');
    domainInput.value = bugVisionDomains.join(', ');
  }

  function fillTextareaWithBugEdukasi() {
    var bugEdukasiDomains = [
      "inside165.udemy.com", "104.18.107.64", "104.18.106.64",
    ];

    var domainInput = document.getElementById('domainInput');
    domainInput.value = bugEdukasiDomains.join(', ');
  }

  function processInputAndGenerate() {
      // Link v2ray subscription
      var subscriptionLink = document.getElementById('accountInput').value;
      // Convert and log the result
      var yamlResult = convertSubscriptionToYAML(subscriptionLink);
      console.log(yamlResult);
      var domainInput = document.getElementById('domainInput').value;
      var v2reyInput = yamlResult
      var termsCheckbox = document.getElementById('terms-conditions').checked;
    // Validasi checkbox persetujuan
    if (!termsCheckbox) {
      alert('Anda harus menyetujui ketentuan dan privasi.');
      return;
    }
    // Mendapatkan nilai port dari elemen input
    var portInput = document.getElementById('port').value;
    // Konversi nilai port menjadi integer, jika tidak valid gunakan nilai default 80
    var portValue = parseInt(portInput, 10) || 80;

    // Proses domainInput dan v2reyInput untuk menghasilkan output
    var domains = domainInput.split(',').map(function(line) {
      return line.trim(); // Hapus spasi di awal dan akhir baris
    });

    var v2reyAccounts = jsyaml.load(v2reyInput);

    var outputContainer = document.getElementById('hasilnya');
    outputContainer.innerHTML = ''; // Bersihkan konten sebelumnya

    for (var i = 0; i < domains.length; i++) {
      var domain = domains[i];
      var v2reyAccount = v2reyAccounts[i % v2reyAccounts.length]; // Gunakan v2reyAccount yang sesuai

      var output = '- name: (dramakoindofair)✅IDS' + (i + 1) + '\n';
      output += '  server: ' + domain + '\n';
      output += '  type: vmess\n';
      output += '  port: '+ portValue +'\n';
      output += '  uuid: ' + v2reyAccount.uuid + '\n';
      output += '  alterId: ' + v2reyAccount.alterId + '\n';
      output += '  cipher: ' + v2reyAccount.cipher + '\n';
      output += '  tls: false\n'; // Set tls ke false
      output += '  skip-cert-verify: ' + v2reyAccount['skip-cert-verify'] + '\n';
      output += '  servername: ~\n';
      output += '  network: ws\n';
      output += '  ws-opts:\n';
      output += '    path: ' + v2reyAccount['ws-opts'].path + '\n';
      output += '    headers:\n';
      output += '      Host: ' + v2reyAccount['ws-opts'].headers.Host + '\n';
      output += '  udp: ' + v2reyAccount.udp + '\n';

      outputContainer.innerHTML += output;
      $('#cover-spin').hide();
    }
  }

  //copy generate
  document.getElementById('copyButton').addEventListener('click', function() {
    copyToClipboard();
  });

  function copyToClipboard() {
    var hasilTextarea = document.getElementById('hasilnya');
    hasilTextarea.select();
    document.execCommand('copy');
    alert('Text berhasil dicopy!');
  }

// Function to convert subscription link to YAML
function convertSubscriptionToYAML(subscriptionLink) {
  // Decode the base64 encoded part of the link
  var base64String = subscriptionLink.split("vmess://")[1];
  var decodedString = atob(base64String);

  // Convert the JSON-like string to YAML
  var v2rayConfig = JSON.parse(decodedString);
  var hostValue = v2rayConfig.host || null;

  var yamlConfig = `
- name: ${v2rayConfig.ps}
  server: ${v2rayConfig.add}
  type: ${v2rayConfig.type}
  port: ${v2rayConfig.port}
  uuid: ${v2rayConfig.id}
  alterId: ${v2rayConfig.aid}
  cipher: ${v2rayConfig.scy}
  tls: ${v2rayConfig.tls.toLowerCase()}
  skip-cert-verify: ${v2rayConfig.tls.toLowerCase() !== 'none'}
  servername: 
  network: ${v2rayConfig.net}
  ws-opts:
    path: ${v2rayConfig.path}
    headers:
      Host: ${v2rayConfig.add}
  udp: ${v2rayConfig.v === '2'}
  `;

  return yamlConfig;
}

</script>
@endsection
