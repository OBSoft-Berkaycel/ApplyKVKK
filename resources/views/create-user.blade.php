@extends('custom.layout')

@section('content')
div class="container-xxl">
<div class="authentication-wrapper authentication-basic container-p-y">
  <div class="authentication-inner">
    <!-- Register Card -->
    <div class="card">
      <div class="card-body">
        <!-- Logo -->
        <div class="app-brand justify-content-center">
          <a href="index.php" class="app-brand-link gap-2">
            <span class="app-brand-logo demo">
<img width="35" height="35" src="https://img.icons8.com/ios/35/add-user-male.png" alt="add-user-male"/>
            </span>
            <span class="app-brand-text demo text-body fw-bold">Personel Oluştur</span>
          </a>
        </div>
        <!-- /Logo -->
        <p class="mb-4">Sistem kullanıcısı veya yönetici hesabı oluşturabilirsiniz.</p>

        <form id="formAuthentication" class="mb-3" action="save_user.php" method="post">
          <div class="mb-3">
            <label for="firstname" class="form-label">Personel Adı</label>
            <input
              type="text"
              class="form-control"
              id="firstname"
              name="firstname"
              placeholder="Personel Adı"
              autofocus />
          </div>
          <div class="mb-3">
            <label for="lastname" class="form-label">Personel Soyadı</label>
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Personel Soyadı" />
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Telefon Numarası</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefon Numarası" />
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Kullanıcı Adı</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Kullanıcı Adı" />
          </div>
          <div class="mb-3 form-password-toggle">
            <label class="form-label" for="password">Şifre</label>
            <div class="input-group input-group-merge">
              <input
                type="password"
                id="password"
                class="form-control"
                name="password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password" />
              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
          </div>
                                <div class="mb-3">
                  <label for="role" class="form-label">Yetki Seçiniz</label>
                  <select class="form-select" id="role" name="role" aria-label="Default select example">
                    <option selected>Yetkileri Göster</option>
          <option value="user">Kullanıcı</option>
          <option value="admin">Admin</option>
                  </select>
                </div>

          <button class="btn btn-primary d-grid w-100">Personel Oluştur</button>
        </form>

      </div>
    </div>
    <!-- Register Card -->
  </div>
</div>
</div>
@endsection