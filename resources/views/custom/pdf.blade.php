<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <style>
        body { 
            font-family: 'DejaVu Sans', sans-serif; 
            margin: 0; 
            padding: 0; 
        }
        .container { 
            max-width: 800px; 
            margin: 0 auto; 
            padding: 20px; 
            padding-bottom: 100px; /* Increased bottom padding to avoid footer overlap */
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-bottom: 20px; 
        }
        table, th, td { 
            border: 1px solid #ddd; 
        }
        th, td { 
            padding: 8px; 
            text-align: left; 
        }
        th { 
            background-color: #f2f2f2; 
        }
        .img-fluid { 
            max-width: 100%; 
            height: auto; 
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            padding: 10px;
            background-color: #f1f1f1;
            border-top: 1px solid #ccc;
            z-index: 1000; /* Ensures footer stays on top */
        }
    </style>
</head>
<body>

<div class='container'>
    <h1 class='mb-8' style="text-align: center;">Özel Letoon Hastanesi</h1>
    <h3 class="mb-8" style="text-align: center;">Kişisel Verilerin Korunması Kanunu Aydınlatma Metni</h3>

    <p>Sayın <strong>{{$form->patient_name}} {{ $form->patient_surname }}</strong>,</p>
    <p>Bu form, kişisel verilerinizin korunması ve işlenmesi ile ilgili olarak tarafınızı
        bildirmek amacıyla hazırlanmıştır.</p>
    
    {{-- <p><h5 style="float: left;">Kişisel Bilgileriniz</h5></p> --}}
    <table class='table table-bordered'>
        <tr>
            <th scope='row' style='width: 120px;'>Ad</th>
            <td>{{$form->patient_name}}</td>
        </tr>
        <tr>
            <th scope='row' style='width: 120px;'>Soyad</th>
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

    <h4 class='mb-4'>KVKK Aydınlatma Metni</h4>
    <p>Bu metni KVKK aydınlatma metni olarak kullanabilirsiniz.</p>
    <ul style="list-style: auto;">
        <li>Kişisel verilerinizin toplanma amacı ve hukuki sebebi...</li>
        <li>Kişisel verilerinizin kimlere ve hangi amaçlarla aktarılabileceği...</li>
        <li>Kişisel verilerinizin toplanma yöntemi ve hukuki sebebi...</li>
        <li>Kişisel verilerinizin işlenme süresi...</li>
        <li>Veri sahibi olarak haklarınız...</li>
    </ul>
    <div style="float: right;">
        <h4 class='mb-4'>Onay ve İmza</h4>
        <p>{{$form->patient_name}} {{ $form->patient_surname }}</p>
        <div style="border: 1px solid #000; padding: 5px; display: inline-block;">
            <img src='{{$imagePath}}' class='img-fluid' />
        </div>
        <p>&copy; 2024 Özel Letoon Hastanesi.</p>
    </div>
</div>


</body>
</html>
