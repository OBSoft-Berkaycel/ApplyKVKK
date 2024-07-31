<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <style>
        body { font-family: 'DejaVu Sans', sans-serif; }
        .container { max-width: 800px; margin: 0 auto; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .img-fluid { max-width: 100%; height: auto; }
    </style>
</head>
<body>

<div class='container'>
    <h2 class='mb-4'>Kişisel Bilgiler</h2>
    <table class='table table-bordered'>
        <tr>
            <th scope='row' style='width: 120px;'>Adı</th>
            <td>{{$form->patient_name}}</td>
        </tr>
        <tr>
            <th scope='row' style='width: 120px;'>Soyadı</th>
            <td>{{$form->patient_surname}}</td>
        </tr>
        <tr>
            <th scope='row' style='width: 120px;'>TC Kimlik No</th>
            <td>{{$form->patient_id}}</td>
        </tr>
        <tr>
            <th scope='row' style='width: 120px;'>Telefon</th>
            <td>{{$form->patient_phone}}</td>
        </tr>
        <tr>
            <th scope='row' style='width: 120px;'>Adres</th>
            <td>{{$form->patient_address}}</td>
        </tr>
    </table>
    <h2 class='mb-4'>KVKK Aydınlatma Metni</h2>
    <p>Bu metni KVKK aydınlatma metni olarak kullanabilirsiniz.</p>
    <h2 class='mb-4'>İmza</h2>
    <img src='{{$imagePath}}' class='img-fluid' />
</div>

</body>
</html>