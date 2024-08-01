@extends('custom.layout')

@section('content')
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <div class="card">
          <div class="card-body">
            <div class="app-brand justify-content-center">
              <a href="index.html" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                      <img width="24" height="24" src="https://img.icons8.com/external-tal-revivo-filled-tal-revivo/24/external-login-access-of-user-with-a-right-direction-arrow-classic-filled-tal-revivo.png" alt="external-login-access-of-user-with-a-right-direction-arrow-classic-filled-tal-revivo"/>
                </span>
                <span class="app-brand-text demo text-body fw-bold">AresBPO</span>
              </a>
            </div>
            <h4 class="mb-2">KVKK Yönetim Sistemi 👋</h4>
            <p class="mb-4">Kullanıcı bilgileriniz ile sisteme giriş yapabilirsiniz.</p>

            <form action="{{route('login')}}" method="post" class="mb-3">
                @csrf
              <div class="mb-3">
                <label for="login" class="form-label">Kullanıcı Adı, Telefon veya Mail Adresi</label>
                <input type="text" class="form-control" id="login" name="login" placeholder="E-posta, telefon veya kullanıcı adı" autofocus required/>
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Şifreniz</label>
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required/>
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Giriş Yap</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection