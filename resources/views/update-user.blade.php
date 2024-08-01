@extends('custom.layout')

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <div class="card">
        <div class="card-body">
          <div class="app-brand justify-content-center">
            <a href="index.php" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">
                <img width="35" height="35" src="https://img.icons8.com/ios/35/add-user-male.png" alt="add-user-male"/>
              </span>
              <span class="app-brand-text demo text-body fw-bold">Kullanıcı Bilgilerimi Güncelle</span>
            </a>
          </div>
          <p class="mb-4">Sistem kullanıcısı veya yönetici hesap bilgilerinizi güncelleyebilirsiniz.</p>

          <form class="mb-3" action="{{route('user.update')}}" method="post">
            @csrf
            <div class="mb-3">
              <label for="firstname" class="form-label">Personel Adı</label>
              <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Personel Adı" autofocus value="{{ $user->name }}"/>
            </div>
            <div class="mb-3">
              <label for="lastname" class="form-label">Personel Soyadı</label>
              <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Personel Soyadı" value="{{ $user->surname }}" />
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Mail Adresi</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Mail Adresi" value="{{ $user->email }}" />
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Telefon Numarası</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefon Numarası" value="{{ $user->phone }}" />
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Kullanıcı Adı</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Kullanıcı Adı" value="{{ $user->username }}" />
            </div>
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">Şifre</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password_confirmation">Şifre Yeniden</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password_confirmation" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <button class="btn btn-primary d-grid w-100">Bilgilerimi Kaydet</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection