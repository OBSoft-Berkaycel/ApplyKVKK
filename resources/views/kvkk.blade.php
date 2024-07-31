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
                        <h5 class="card-title">KVKK Aydınlatma Metni - Özel Letoon Hastanesi | Private Letoon Hospital</h5>
                        <small class="text-muted float-end">İlgili adımları takip ediniz.</small>
                    </div>
                    <div class="card-body">
                        Content
                    </div>
                    <div class="card-footer pt-5 float-right">
                        <div class="row">
                            <h6 class="card-subtitle mb-2 text-muted">Yukarıda açıkça belirtilen, Kişisel Verilerin Korunması Kanunu kapsamında ki metni okudum, anladım, onaylıyorum.</h6>
                            <div class="col-xl-3">
                                <canvas id="signature-pad" class="mb-3"></canvas><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <button id="clear" class="btn btn-warning">Temizle</button>
                                <button id="save" class="btn btn-primary">Kaydet</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

    <!-- Modal -->
    <div class="modal fade responseModal" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="responseModalLabel">Bilgilendirme</h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <p id="modalMessage"></p></br>
                            <p>5 saniye içerisinde yönlendirileceksiniz. Lütfen bekleyiniz.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<script>
    var canvas = document.getElementById('signature-pad');
    var signaturePad = new SignaturePad(canvas);

    document.getElementById('clear').addEventListener('click', function () {
        signaturePad.clear();
    });

    document.getElementById('save').addEventListener('click', function () {
        if (signaturePad.isEmpty()) {
            showModal("Hata", "Lütfen imza atın.");
        } else {
            var data = signaturePad.toDataURL('image/png');
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'save_signature.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // İmza kaydedildiğinde raporu kaydet
                    var reportXhr = new XMLHttpRequest();
                    reportXhr.open('POST', 'save_report.php', true);
                    reportXhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    reportXhr.onreadystatechange = function () {
                        if (reportXhr.readyState == 4 && reportXhr.status == 200) {
                            showModal("Başarılı", "İmza ve rapor kaydedildi ve PDF oluşturuldu.", function () {
                                // Yönlendirme işlemi
                                var isAdmin =  {{ 'admin' === 'admin' ? 'true' : 'false'}};
                                if (isAdmin) {
                                    window.location.href = 'list_pdfs.php';
                                } else {
                                    window.location.href = 'newform.php';
                                }
                            });
                        } else if (reportXhr.readyState == 4) {
                            showModal("Hata", "İmza veya rapor kaydedilemedi. Lütfen tekrar deneyin.");
                        }
                    };
                    reportXhr.send('user_id=<?php echo $_SESSION["user_id"]; ?>&report_content=Form ve imza kaydedildi.');
                } else if (xhr.readyState == 4) {
                    showModal("Hata", "İmza kaydedilemedi. Lütfen tekrar deneyin.");
                }
            };
            xhr.send('id=<?php echo $_GET["id"]; ?>&signature=' + encodeURIComponent(data));
        }
    });

    function showModal(title, message, callback) {
        document.getElementById('responseModalLabel').textContent = title;
        document.getElementById('modalMessage').textContent = message;
        $('.responseModal').modal('show');
        if (callback) {
            $('.responseModal').on('hidden.bs.modal', function () {
                callback();
                $('.responseModal').off('hidden.bs.modal');
            });
        }
        // Modal 5 saniye sonra otomatik kapanacak
        setTimeout(function () {
            $('.responseModal').modal('hide');
        }, 5000);
    }
</script>
@endsection