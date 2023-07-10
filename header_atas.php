<?php
require_once "config/config.php";
require "libs/vendor/autoload.php";
// periksa apakah user sudah login, cek kehadiran session nama
// jika tidak ada, redirect ke login.php

session_start();

if (!isset($_SESSION["nama"])) {
  header("Location: auth/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Klinik Pratama Rahmat Sehat</title>

  <!-- CUSTOM FONT-->
  <link href="<?= base_url('vendor/fontawesome-free/css/all.css'); ?>" rel="stylesheet" type="text/css" />

  <!-- CSS -->
  <link href="<?= base_url('css/sb-admin-2.css'); ?>" rel="stylesheet" />
  <link href="<?= base_url('css/style.css'); ?>" rel="stylesheet" />
  <link href="<?= base_url('libs/DataTables/datatables.min.css'); ?>" rel="stylesheet" />
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Divider -->
      <hr class="sidebar-divider my-0" />