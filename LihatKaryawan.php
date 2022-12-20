<?php
require_once "Config/Database.php";
$conn = getConnection();
$sql = "SELECT id_karyawan, karyawan.nama, karyawan.no_telepon 'no-telp', email FROM karyawan JOIN role ON(karyawan.role = role.id_role) WHERE role.id_role = 2;";
$hasil = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="karyawan.css" />

  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <title>Lihat Karyawan</title>
</head>

<body>
  <section id="menu">
    <div class="logo">
      <img src="detergent.png" alt="" />
      <h2>MyLaundry</h2>
    </div>
    <div class="items">
      <li>
        <span class="material-icons"> pie_chart </span>
        <a href="#" class="menu-text">Dashboard</a>
      </li>
      <li id="manajemen-li" onclick="dropManajemen()">
        <span class="material-symbols-outlined"> manage_accounts </span>
        <a href="#" class="menu-text">Manajemen User</a>
      </li>
      <div id="manajemen">
        <div onclick="pindahPage('LihatKaryawan.php')">
          <!-- <span></span> -->
          <a>Karyawan</a>
        </div>
        <div onclick="pindahPage('Admin.php')">
          <!-- <span></span> -->
          <a href="#">Administrator</a>
        </div>
      </div>
      <li onclick="pindahPage('Transaksi.php')" id="transaksi-li">
        <span class="material-symbols-outlined"> payments </span>
        <a href="#" class="menu-text">Transaksi</a>
      </li>
      <li onclick="pindahPage('Paket.php')">
        <span class="material-symbols-outlined"> laundry </span>
        <a href="#" class="menu-text">Paket Laundry</a>
      </li>
      <li onclick="pindahPage('Customer.php')">
        <span class="material-symbols-outlined"> person </span>
        <a href="#" class="menu-text">Customer</a>
      </li>
      <li onclick="pindahPage('BuatLaporan.php')">
        <span class="material-symbols-outlined"> summarize </span>
        <a href="#" class="menu-text">Laporan</a>
      </li>
    </div>
  </section>

  <section id="interface">
    <div class="navigation">
      <div class="n1">
        <i id="slide-bar" class="fa-solid fa-bars"></i>
      </div>
      <div class="profile">
        <i class="fa fa-bell"> </i>
        <img src="org1.jpeg" alt="" />
        <span class="material-symbols-outlined" onclick="toggleMenu()">
          expand_more
        </span>
      </div>
      <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
          <div class="user-info">
            <img src="org1.jpeg" alt="" />
            <h2>Jennie Kim</h2>
          </div>
          <hr />
          <a href="#" class="sub-menu-link">
            <span class="material-symbols-outlined"> manage_accounts </span>
            <p>Edit Profile</p>
          </a>
          <a href="#" class="sub-menu-link">
            <span class="material-symbols-outlined"> settings </span>
            <p>Edit Profile</p>
          </a>
          <a href="#" class="sub-menu-link">
            <span class="material-symbols-outlined"> contact_support </span>
            <p>Help & Support</p>
          </a>
          <a href="#" class="sub-menu-link">
            <span class="material-symbols-outlined"> logout </span>
            <p>Logout</p>
          </a>
        </div>
      </div>
    </div>
    <div class="transaksi-tambah">
      <h3 class="i-name">Karyawan</h3>
      <button type="button" class="btn btn-outline-primary active aksi-btn tambah-btn">
        Tambah Karyawan
      </button>
    </div>
    <!-- <div class="values">
        <div class="val-box">
          <i class="fa fa-users"></i>
          <div>
            <h3>8,267</h3>
            <span>New Users</span>
          </div>
        </div>
        <div class="val-box">
          <i class="fa fa-users"></i>
          <div>
            <h3>8,267</h3>
            <span>New Users</span>
          </div>
        </div>
        <div class="val-box">
          <i class="fa fa-users"></i>
          <div>
            <h3>8,267</h3>
            <span>New Users</span>
          </div>
        </div>
        <div class="val-box">
          <i class="fa fa-users"></i>
          <div>
            <h3>8,267</h3>
            <span>New Users</span>
          </div>
        </div>
      </div> -->
    <div class="board">
      <p id="p-order">List Karyawan</p>
      <div>
        <!-- <button
            type="button"
            class="btn btn-outline-primary active aksi-btn tambah-btn"
          >
            Tambah Karyawan
          </button> -->
      </div>
      <div class="show-search">
        <div class="show-entries">
          <label id="show" for="">Show</label>
          <select name="jumlah-data" id="jumlah-data">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
          </select>
          <label id="show" for="">entries</label>
        </div>
        <div class="search">
          <i class="fa fa-search"></i>
          <input type="text" placeholder="Search" name="" id="" />
        </div>
      </div>
      <table width="100%">
        <thead>
          <tr>
            <td>ID</td>
            <td>Nama</td>
            <td>Nomor Telepon</td>
            <td>Email</td>
            <td>Aksi</td>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($hasil as $row) { ?>
            <tr>
              <td><?php echo $row['id_karyawan'] ?></td>
              <td><?php echo $row['nama'] ?></td>
              <td><?php echo $row['no-telp'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td>
                <button type="button" class="btn btn-outline-primary active aksi-btn">
                  Edit
                </button>
              </td>
            </tr>
          <?php } ?>

        </tbody>
        <tbody>
          <tr>
            <td class="people"></td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
  <script>
    let sideBar = document.getElementById("menu");
    let subMenu = document.getElementById("subMenu");
    let slideBar = document.getElementById("slide-bar");
    let manajemen = document.getElementById("manajemen-li");
    let manajemenDrop = document.getElementById("manajemen");

    // let x = window.matchMedia("(max-width: 769px)");

    function toggleMenu() {
      // subMenu.subMenu.classList.toggle("open-menu");
      if (subMenu.style.maxHeight == "400px") {
        subMenu.style.maxHeight = "0px";
      } else {
        subMenu.style.maxHeight = "400px";
      }
    }

    $("#manajemen-li").click(function() {
      $("#manajemen").toggleClass("active2");
    });

    // function toggleSideBar() {
    //   sideBar.style.width = "40px";
    // }

    // function toggleSideBar() {
    //   if (x.matches) {
    //     if (sideBar.style.left === "-220px") {
    //       alert("True");
    //       sideBar.style.left == "0px";
    //     } else if (sideBar.style.left == "0px") {
    //       sideBar.style.left == "-220px";
    //     }
    //   }
    // console.log(sideBar.style.left);
    // }

    // Pindah Page
    function pindahPage(namaPage) {
      window.location.href = namaPage;
    }


    $("#slide-bar").click(function() {
      $("#menu").toggleClass("active");
    });

    $("#slide-bar").click(function() {
      $("#menu").toggleClass("activeWeb");
    });

    // alert("Apakah bisa ");
  </script>
</body>

</html>