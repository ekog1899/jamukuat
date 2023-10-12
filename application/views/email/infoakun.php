<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Informasi Akun</h2>

<table>
    <td>Nama Lengkap</td>
    <td><?= $users['fullname']; ?></td>
  </tr>
  <tr>
    <td>Username </td>
    <td><?= $users['username']; ?></td>
  </tr> 
  <tr>
    <td>Password </td>
    <td><?= base64_decode($users['password']); ?></td>
  </tr> 
  
  <tr>
    <td>NO HP </td>
    <td><?= $users['handphone']; ?></td>
  </tr> 
  
  <tr>
    <td>Email </td>
    <td><?= $users['email']; ?></td>
  </tr>
  
  <tr>
    <td>Satuan Kerja / Wilayah  </td>
    <td><?= $users['nama']; ?></td>
  </tr><tr>
    <td>Satuan Kerja Mitra  </td>
    <td><?= $users['nama_satker']; ?></td>
  </tr>
  <tr>
    <td>Kewenangan </td>
      <td><?= $users['nama_group']; ?></td>
  </tr>
 
  
</table>

</body>
</html>

