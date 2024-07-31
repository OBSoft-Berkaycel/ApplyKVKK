@extends('layouts.master')

@section('content')
<div class="container-xxl container-p-y">
    <!-- Basic Layout -->
    <div class="table-responsive text-nowrap mt-5">
        <table id="pdfTable" class="table card-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Adı</th>
                    <th>Soyadı</th>
                    <th>TC Kimlik No</th>
                    <th>Telefon</th>
                    <th>Adres</th>
                    <th>PDF</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>name</td>
                    <td>surname</td>
                    <td>tc kimlik no</td>
                    <td>telefon</td>
                    <td><address></address></td>
                    <td>
                        <a href='download' class='btn btn-primary' target='_blank'>
                            <i class='bx bxs-cloud-download me-2'></i> İndir
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection

@section('scripts')
    <!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.bootstrap4.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.print.min.js"></script>


<script>
    $(document).ready(function() {
        $('#pdfTable').DataTable({
            "language": {
                url: '//cdn.datatables.net/plug-ins/2.0.8/i18n/tr.json',
            },
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Tümü"]],
            "pageLength": 10,
            "dom": '<"top"fB>t<"bottom"lp><"clear">',
            "buttons": [
                {
                    extend: 'pdfHtml5',
                    text: 'Tabloyu PDF İndir',
                    title: 'KVKK Onaylı Bildirim Tablosu', // PDF başlığı
                    filename: 'kullanici_bilgileri', // Dosya adı
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5] // Sadece bu sütunlar dahil edilecek
                    },
                    customize: function(doc) {
                        doc.defaultStyle.alignment = 'center';
                        doc.styles.tableHeader.alignment = 'center';
                        doc.styles.title.alignment = 'center';
                        doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                    }
                }
            ]
        });
    });
</script>

<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

    <script>
  // Fonksiyon: Zaman bilgisini güncelle
  function updateTime() {
    var currentTime = new Date();
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();
    var seconds = currentTime.getSeconds();
    var formattedTime = hours + ":" + minutes + ":" + seconds;

    // Zaman bilgisini sayfaya yaz
    document.getElementById('current-time').textContent = formattedTime;
  }

  // Belirli aralıklarla zaman bilgisini güncelle (örneğin her saniye)
  setInterval(updateTime, 1000);

  // Sayfa yüklendiğinde zaman bilgisini ilk defa güncelle
  updateTime();
</script>
@endsection