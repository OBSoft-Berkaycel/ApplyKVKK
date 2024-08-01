@extends('layouts.master')
@section('content')
<div class="container-xxl container-p-y">
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
                @foreach ($forms as $form)
                    <tr>
                        <td>{{ $form->id }}</td>
                        <td>{{ $form->patient_name }}</td>
                        <td>{{ $form->patient_surname }}</td>
                        <td>{{ $form->patient_id }}</td>
                        <td>{{ $form->patient_phone }}</td>
                        <td>{{ $form->patient_address }}</td>
                        <td>
                            <form action="{{route('download.pdf',['form' => $form->id])}}" method="post">
                                @csrf
                                <button type="submit" class='btn btn-primary' target='_blank'>
                                    <i class='bx bxs-cloud-download me-2'></i> İndir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('scripts')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/custom/datatable/bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/custom/datatable/buttons.bootstrap4.min.css')}}">
    <script src="{{asset('assets/custom/datatable/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/custom/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/custom/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/custom/datatable/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/custom/datatable/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/custom/datatable/jszip.min.js')}}"></script>
    <script src="{{asset('assets/custom/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/custom/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/custom/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/custom/datatable/buttons.print.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#pdfTable').DataTable({
                "language": {
                    url: 'assets/json/tr.json',
                },
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Tümü"]],
                "pageLength": 10,
                "dom": '<"top"fB>t<"bottom"lp><"clear">',
                "buttons": [
                    {
                        extend: 'pdfHtml5',
                        text: 'Tabloyu PDF İndir',
                        title: 'KVKK Onaylı Bildirim Tablosu',
                        filename: 'kullanici_bilgileri',
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5]
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
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script>
    function updateTime() {
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();
        var formattedTime = hours + ":" + minutes + ":" + seconds;
        document.getElementById('current-time').textContent = formattedTime;
    }
    setInterval(updateTime, 1000);
    updateTime();
    </script>
@endsection