<?php

     session_start();
     $_SESSION["login"];
     $_SESSION["nama"];
     $_SESSION["username"];
     $_SESSION["level"];
     $_SESSION["sub_level"];
     $_SESSION["keterangan_level"];
     $_SESSION["tandatangan"];
     $_SESSION["kode_divisi"];
     $_SESSION["kode_bagian_"];
     $_SESSION["nama_divisi"];
     $_SESSION["gambar_profil"];
     $_SESSION["flag"];

     unset($_SESSION["login"]);
     unset($_SESSION["nama"]);
     unset($_SESSION["username"]);
     unset($_SESSION["level"]);
     unset($_SESSION["sub_level"]);
     unset($_SESSION["keterangan_level"]);
     unset($_SESSION["tandatangan"]);
     unset($_SESSION["kode_divisi"]);
     unset($_SESSION["kode_bagian_"]);
     unset($_SESSION["gambar_profil"]);
     unset($_SESSION["flag"]);

     session_unset();
     session_destroy();

     header("location:login");
?>
