<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Rekapitulasi Biaya Kesehatan</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 30px;
      table-layout: fixed;
    }

    th, td {
      border: 1px solid #999;
      padding: 8px;
      text-align: center;
      vertical-align: middle;
    }

    th {
      background-color: #0077c0;
      color: white;
    }

    th[colspan] {
      background-color: #005f99;
      font-weight: bold;
    }

    th.group-header {
      background-color: #004c78;
    }

    th:first-child,
    td:first-child {
      width: 8%;
    }

    input[type="number"],
    input[type="text"] {
      width: 100%;
      padding: 6px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[readonly] {
      background-color: #f5f5f5;
    }

    .submit-btn {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #0077c0;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
    }

    .submit-btn:hover {
      background-color: #005f99;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Rekapitulasi Biaya Kesehatan</h2>
    <form method="POST" action="/rekap-biaya/simpan">
      <table>
        <thead>
          <tr>
            <th rowspan="2">Rekap Bulan</th>
            <th colspan="9" class="group-header">REAL BIAYA</th>
            <th rowspan="2">Transport</th>
            <th rowspan="2">Hiperkes</th>
            <th rowspan="2">Total Biaya Kesehatan</th>
          </tr>
          <tr>
            <th>Gol. III-IV</th>
            <th>Gol. I-II</th>
            <th>Kampanye</th>
            <th>Honor + ILA + OS</th>
            <th>Pens. III-IV</th>
            <th>Pens. I-II</th>
            <th>Direksi</th>
            <th>Dekom</th>
            <th>Pengacara</th>
          </tr>
        </thead>
        <tbody>
                                <tr>
                        <td><input type="text" value="Jan" name="data[Jan][bulan]" readonly></td>
                        <td><input type="number" name="data[Jan][gol_3_4]"></td>
                        <td><input type="number" name="data[Jan][gol_1_2]"></td>
                        <td><input type="number" name="data[Jan][kampanye]"></td>
                        <td><input type="number" name="data[Jan][honor]"></td>
                        <td><input type="number" name="data[Jan][pens_3_4]"></td>
                        <td><input type="number" name="data[Jan][pens_1_2]"></td>
                        <td><input type="number" name="data[Jan][direksi]"></td>
                        <td><input type="number" name="data[Jan][dekom]"></td>
                        <td><input type="number" name="data[Jan][pengacara]"></td>
                        <td><input type="number" name="data[Jan][transport]"></td>
                        <td><input type="number" name="data[Jan][hiperkes]"></td>
                        <td><input type="number" name="data[Jan][total]"></td>
                    </tr>

                    <tr>
                        <td><input type="text" value="Feb" name="data[Feb][bulan]" readonly></td>
                        <td><input type="number" name="data[Feb][gol_3_4]"></td>
                        <td><input type="number" name="data[Feb][gol_1_2]"></td>
                        <td><input type="number" name="data[Feb][kampanye]"></td>
                        <td><input type="number" name="data[Feb][honor]"></td>
                        <td><input type="number" name="data[Feb][pens_3_4]"></td>
                        <td><input type="number" name="data[Feb][pens_1_2]"></td>
                        <td><input type="number" name="data[Feb][direksi]"></td>
                        <td><input type="number" name="data[Feb][dekom]"></td>
                        <td><input type="number" name="data[Feb][pengacara]"></td>
                        <td><input type="number" name="data[Feb][transport]"></td>
                        <td><input type="number" name="data[Feb][hiperkes]"></td>
                        <td><input type="number" name="data[Feb][total]"></td>
                    </tr>

                    <tr>
                        <td><input type="text" value="Mar" name="data[Mar][bulan]" readonly></td>
                        <td><input type="number" name="data[Mar][gol_3_4]"></td>
                        <td><input type="number" name="data[Mar][gol_1_2]"></td>
                        <td><input type="number" name="data[Mar][kampanye]"></td>
                        <td><input type="number" name="data[Mar][honor]"></td>
                        <td><input type="number" name="data[Mar][pens_3_4]"></td>
                        <td><input type="number" name="data[Mar][pens_1_2]"></td>
                        <td><input type="number" name="data[Mar][direksi]"></td>
                        <td><input type="number" name="data[Mar][dekom]"></td>
                        <td><input type="number" name="data[Mar][pengacara]"></td>
                        <td><input type="number" name="data[Mar][transport]"></td>
                        <td><input type="number" name="data[Mar][hiperkes]"></td>
                        <td><input type="number" name="data[Mar][total]"></td>
                    </tr>

                    <tr>
                        <td><input type="text" value="Apr" name="data[Apr][bulan]" readonly></td>
                        <td><input type="number" name="data[Apr][gol_3_4]"></td>
                        <td><input type="number" name="data[Apr][gol_1_2]"></td>
                        <td><input type="number" name="data[Apr][kampanye]"></td>
                        <td><input type="number" name="data[Apr][honor]"></td>
                        <td><input type="number" name="data[Apr][pens_3_4]"></td>
                        <td><input type="number" name="data[Apr][pens_1_2]"></td>
                        <td><input type="number" name="data[Apr][direksi]"></td>
                        <td><input type="number" name="data[Apr][dekom]"></td>
                        <td><input type="number" name="data[Apr][pengacara]"></td>
                        <td><input type="number" name="data[Apr][transport]"></td>
                        <td><input type="number" name="data[Apr][hiperkes]"></td>
                        <td><input type="number" name="data[Apr][total]"></td>
                    </tr>

                    <tr>
                        <td><input type="text" value="May" name="data[May][bulan]" readonly></td>
                        <td><input type="number" name="data[May][gol_3_4]"></td>
                        <td><input type="number" name="data[May][gol_1_2]"></td>
                        <td><input type="number" name="data[May][kampanye]"></td>
                        <td><input type="number" name="data[May][honor]"></td>
                        <td><input type="number" name="data[May][pens_3_4]"></td>
                        <td><input type="number" name="data[May][pens_1_2]"></td>
                        <td><input type="number" name="data[May][direksi]"></td>
                        <td><input type="number" name="data[May][dekom]"></td>
                        <td><input type="number" name="data[May][pengacara]"></td>
                        <td><input type="number" name="data[May][transport]"></td>
                        <td><input type="number" name="data[May][hiperkes]"></td>
                        <td><input type="number" name="data[May][total]"></td>
                    </tr>
                    <tr>
                        <td><input type="text" value="Jun" name="data[Jun][bulan]" readonly></td>
                        <td><input type="number" name="data[Jun][gol_3_4]"></td>
                        <td><input type="number" name="data[Jun][gol_1_2]"></td>
                        <td><input type="number" name="data[Jun][kampanye]"></td>
                        <td><input type="number" name="data[Jun][honor]"></td>
                        <td><input type="number" name="data[Jun][pens_3_4]"></td>
                        <td><input type="number" name="data[Jun][pens_1_2]"></td>
                        <td><input type="number" name="data[Jun][direksi]"></td>
                        <td><input type="number" name="data[Jun][dekom]"></td>
                        <td><input type="number" name="data[Jun][pengacara]"></td>
                        <td><input type="number" name="data[Jun][transport]"></td>
                        <td><input type="number" name="data[Jun][hiperkes]"></td>
                        <td><input type="number" name="data[Jun][total]"></td>
                    </tr>
                    <tr>
                        <td><input type="text" value="Jul" name="data[Jul][bulan]" readonly></td>
                        <td><input type="number" name="data[Jul][gol_3_4]"></td>
                        <td><input type="number" name="data[Jul][gol_1_2]"></td>
                        <td><input type="number" name="data[Jul][kampanye]"></td>
                        <td><input type="number" name="data[Jul][honor]"></td>
                        <td><input type="number" name="data[Jul][pens_3_4]"></td>
                        <td><input type="number" name="data[Jul][pens_1_2]"></td>
                        <td><input type="number" name="data[Jul][direksi]"></td>
                        <td><input type="number" name="data[Jul][dekom]"></td>
                        <td><input type="number" name="data[Jul][pengacara]"></td>
                        <td><input type="number" name="data[Jul][transport]"></td>
                        <td><input type="number" name="data[Jul][hiperkes]"></td>
                        <td><input type="number" name="data[Jul][total]"></td>
                    </tr>
                    <tr>
                        <td><input type="text" value="Aug" name="data[Aug][bulan]" readonly></td>
                        <td><input type="number" name="data[Aug][gol_3_4]"></td>
                        <td><input type="number" name="data[Aug][gol_1_2]"></td>
                        <td><input type="number" name="data[Aug][kampanye]"></td>
                        <td><input type="number" name="data[Aug][honor]"></td>
                        <td><input type="number" name="data[Aug][pens_3_4]"></td>
                        <td><input type="number" name="data[Aug][pens_1_2]"></td>
                        <td><input type="number" name="data[Aug][direksi]"></td>
                        <td><input type="number" name="data[Aug][dekom]"></td>
                        <td><input type="number" name="data[Aug][pengacara]"></td>
                        <td><input type="number" name="data[Aug][transport]"></td>
                        <td><input type="number" name="data[Aug][hiperkes]"></td>
                        <td><input type="number" name="data[Aug][total]"></td>
                    </tr>
                    <tr>
                        <td><input type="text" value="Sep" name="data[Sep][bulan]" readonly></td>
                        <td><input type="number" name="data[Sep][gol_3_4]"></td>
                        <td><input type="number" name="data[Sep][gol_1_2]"></td>
                        <td><input type="number" name="data[Sep][kampanye]"></td>
                        <td><input type="number" name="data[Sep][honor]"></td>
                        <td><input type="number" name="data[Sep][pens_3_4]"></td>
                        <td><input type="number" name="data[Sep][pens_1_2]"></td>
                        <td><input type="number" name="data[Sep][direksi]"></td>
                        <td><input type="number" name="data[Sep][dekom]"></td>
                        <td><input type="number" name="data[Sep][pengacara]"></td>
                        <td><input type="number" name="data[Sep][transport]"></td>
                        <td><input type="number" name="data[Sep][hiperkes]"></td>
                        <td><input type="number" name="data[Sep][total]"></td>
                    </tr>
                    <tr>
                        <td><input type="text" value="Oct" name="data[Oct][bulan]" readonly></td>
                        <td><input type="number" name="data[Oct][gol_3_4]"></td>
                        <td><input type="number" name="data[Oct][gol_1_2]"></td>
                        <td><input type="number" name="data[Oct][kampanye]"></td>
                        <td><input type="number" name="data[Oct][honor]"></td>
                        <td><input type="number" name="data[Oct][pens_3_4]"></td>
                        <td><input type="number" name="data[Oct][pens_1_2]"></td>
                        <td><input type="number" name="data[Oct][direksi]"></td>
                        <td><input type="number" name="data[Oct][dekom]"></td>
                        <td><input type="number" name="data[Oct][pengacara]"></td>
                        <td><input type="number" name="data[Oct][transport]"></td>
                        <td><input type="number" name="data[Oct][hiperkes]"></td>
                        <td><input type="number" name="data[Oct][total]"></td>
                    </tr>
                    <tr>
                        <td><input type="text" value="Nov" name="data[Nov][bulan]" readonly></td>
                        <td><input type="number" name="data[Nov][gol_3_4]"></td>
                        <td><input type="number" name="data[Nov][gol_1_2]"></td>
                        <td><input type="number" name="data[Nov][kampanye]"></td>
                        <td><input type="number" name="data[Nov][honor]"></td>
                        <td><input type="number" name="data[Nov][pens_3_4]"></td>
                        <td><input type="number" name="data[Nov][pens_1_2]"></td>
                        <td><input type="number" name="data[Nov][direksi]"></td>
                        <td><input type="number" name="data[Nov][dekom]"></td>
                        <td><input type="number" name="data[Nov][pengacara]"></td>
                        <td><input type="number" name="data[Nov][transport]"></td>
                        <td><input type="number" name="data[Nov][hiperkes]"></td>
                        <td><input type="number" name="data[Nov][total]"></td>
                    </tr>
                    <tr>
                        <td><input type="text" value="Dec" name="data[Dec][bulan]" readonly></td>
                        <td><input type="number" name="data[Dec][gol_3_4]"></td>
                        <td><input type="number" name="data[Dec][gol_1_2]"></td>
                        <td><input type="number" name="data[Dec][kampanye]"></td>
                        <td><input type="number" name="data[Dec][honor]"></td>
                        <td><input type="number" name="data[Dec][pens_3_4]"></td>
                        <td><input type="number" name="data[Dec][pens_1_2]"></td>
                        <td><input type="number" name="data[Dec][direksi]"></td>
                        <td><input type="number" name="data[Dec][dekom]"></td>
                        <td><input type="number" name="data[Dec][pengacara]"></td>
                        <td><input type="number" name="data[Dec][transport]"></td>
                        <td><input type="number" name="data[Dec][hiperkes]"></td>
                        <td><input type="number" name="data[Dec][total]"></td>
                    </tr>

        </tbody>
      </table>

      <button type="submit" class="submit-btn">Simpan Rekap</button>
    </form>
  </div>
</body>
</html>
