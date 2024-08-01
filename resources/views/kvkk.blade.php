@extends('layouts.master')
@section('styles')
<style>
    canvas {
        border: 1px solid black;
    }
</style>
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light"></span></h4>
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
                        <form id="drawingForm" action="{{route('form.save')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-xl-3">
                                    <label for="is_accepted">Okudum, onaylıyorum.</label>
                                    <input type="checkbox" name="is_accepted" id="is_accepted">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <h6 class="card-subtitle mb-2 text-muted">Yukarıda açıkça belirtilen, Kişisel Verilerin Korunması Kanunu kapsamında ki metni okudum, anladım, onaylıyorum.</h6>
                                <div class="col-xl-3">
                                    <canvas id="drawingCanvas" class="mb-3"></canvas>
                                    <input type="hidden" name="image_data" id="imageData">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <button id="clear" class="btn btn-warning">Temizle</button>
                                    <button id="save" type="submit" class="btn btn-primary">Kaydet</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <script src="{{asset('assets/custom/canvas/jquery-3.2.1.slim.min.js')}}"></script>
    <script src="{{asset('assets/custom/canvas/popper.min.js')}}"></script>
    <script src="{{asset('assets/custom/canvas/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/custom/canvas/signature_pad.umd.min.js')}}"></script>
    <script>
        const canvas = document.getElementById('drawingCanvas');
        const ctx = canvas.getContext('2d');
        let drawing = false;

        canvas.addEventListener('mousedown', (e) => {
            drawing = true;
            ctx.beginPath();
            ctx.moveTo(e.offsetX, e.offsetY);
        });

        canvas.addEventListener('mousemove', (e) => {
            if (drawing) {
                ctx.lineTo(e.offsetX, e.offsetY);
                ctx.stroke();
            }
        });

        canvas.addEventListener('mouseup', () => {
            drawing = false;
        });

        document.getElementById('clear').addEventListener('click', () => {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        });

        document.getElementById('drawingForm').addEventListener('submit', (e) => {
            const imageData = canvas.toDataURL('image/png');
            document.getElementById('imageData').value = imageData;
        });
    </script>
@endsection