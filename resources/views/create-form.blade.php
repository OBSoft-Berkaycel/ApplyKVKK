@extends('layouts.master')

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light"></span></h4>

        <!-- Basic Layout -->
        <div class="row">
          <div class="col-xl">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">KVKK Onam Formu</h5>
                <small class="text-muted float-end">İlgili adımları takip ediniz.</small>
              </div>
              <div class="card-body">
                <form action="save_info.php" method="post">
                  <div class="mb-3">
                    <label class="form-label" for="first_name">Hasta Adı</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                      <input
                        type="text"
                        class="form-control"
                        id="first_name"
                        name="first_name"
                        placeholder="Hasta Adı" required/>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="last_name">Hasta Soyadı</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"
                        ><i class="bx bx-user"></i
                      ></span>
                      <input
                        type="text"
                        class="form-control"
                        id="last_name"
                        name="last_name"
                        placeholder="Hasta Soyadı" required/>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="id_number">T.C. Kimlik Numarası</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"><i class='bx bx-fingerprint'></i></span>
                      <input
                        type="text"
                        class="form-control"
                        id="id_number"
                        name="id_number"
                        placeholder="Hastaya ait T.C. Kimlik Numarası" required/>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="phone">Telefon Numarası</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"><i class='bx bx-phone'></i></span>
                      <input
                        type="text"
                        class="form-control"
                        id="phone"
                        name="phone"
                        placeholder="Hastaya ait telefon numarası" required/>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="address">Adres Bilgisi</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-message2" class="input-group-text"><i class='bx bx-current-location'></i></span>
                      <textarea
                        id="address"
                        name="address"
                        class="form-control"
                        placeholder="Hastaya ait açık adres bilgisi" required></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">İmzaya Geç</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- / Content -->
@endsection