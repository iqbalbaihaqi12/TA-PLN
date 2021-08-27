<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token( )}}">
    <style type="text/css">
        * {
          font-family: Verdana, Arial, sans-serif;
        }
        table{
          font-size: x-small;
        }
        tfoot tr td{
          font-weight: bold;
          font-size: x-small;
        }
        .gray {
          background-color: lightgray
        }
        pre {
          text-align: left;
          white-space: pre-line;
        }
      </style>
    <title>Laporan Inspeksi</title>
</head>
<body>
    <table width="100%">
        <tr>

          <td align="left">
            <h3>PT. PLN Persero</h3>
            <pre>
              Jl. Ahmad Yani No.47, Dusun Petahunan, Jajag<br>
              Kec. Gambiran, Kabupaten Banyuwangi<br>
              Jawa Timur<br>
            </pre>
          </td>
          <td align="right"><img src="{{('logo_pln.png') }}" alt="" style="width: 150px" /></td>
        </tr>

      </table>

      <table width="100%">
        <tr>
          <td style="text-transform: uppercase;"><center><strong><b >Laporan Hasil Inspeksi </b><br></center></td>
        </tr>

      </table>
<br/>
    <div class="form-group">
        <p align="center"></p>
        <table border="1"width="100%" style="text-transform: uppercase; border-collapse: collapse;  text-align: center;">
            <thead style="background-color: lightgray;">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nomor Temuan</th>
                <th>Konstruksi</th>
                <th>Penyulang</th>
                <th> Detail Temuan</th>
                <th>Section</th>
                <th>Alamat</th>
                <th>Koordinat</th>
                <th>Potensi Bahaya</th>
                <th>Evidence</th>
                <th>Tanggal</th>
                <th>Detail</th>
                <th>Evidence</th>
                <th>Tanggal</th>
                <th>Detail</th>
                <th>Evidence</th>
                <th>Status</th>
                <th> Keterangan</th>
            </tr>
            </thead>
            @foreach ($cetak as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                    <td>{{$item->nomor_temuan}}</td>
                    <td>{{$item->konstruksi}}</td>
                    <td>{{$item->jadwal->penyulang}}</td>
                    <td>{{$item->detail_temuan}}</td>
                    <td>{{$item->section}}</td>
                    <td>{{$item->alamat_temuan}}</td>
                    <td>{{$item->koordinat}}</td>
                    <td>{{$item->potensi_bahaya}}</td>
                    <td><img src="{{('image/'.$item->evidence)}}" height="50px" width="50px" alt="" srcset=""></td>
                    <td>{{Carbon\Carbon::parse($item->tindaklanjut->sosialisasi->tanggal)->translatedFormat('l, d F Y')}}</td>
                    <td>{{$item->tindaklanjut->sosialisasi->detail}}</td>
                    <td><img src="{{('image/'.$item->tindaklanjut->sosialisasi->evidence)}}" height="50px" width="50px" alt="" srcset=""></td>
                    <td>{{Carbon\Carbon::parse($item->tindaklanjut->upaya->tanggal)->translatedFormat('l, d F Y')}}</td>
                    <td>{{$item->tindaklanjut->upaya->detail}}</td>
                    <td><img src="{{('image/'.$item->tindaklanjut->upaya->evidence)}}" height="50px" width="50px" alt="" srcset=""></td>
                    <td>{{$item->tindaklanjut->status}}</td>
                    <td>{{$item->tindaklanjut->keterangan_tindak_lanjut}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <br><br><br>
    <footer><center><span>PT. PLN PERSERO ULP JAJAG BANYUWANGI</span></center></footer>
</body>
</html>
