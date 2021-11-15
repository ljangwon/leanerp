<!DOCTYPE html>
<html>

<head>
  <title>Main</title>

  <!--Load CSS File-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-select.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery.dataTables.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/my.css'); ?>">
  < </head>

<body>

  <!-- container-fluid start -->
  <div class="container-fluid">

    <!-- row1 start header -->
    <div class="row">
      <header class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="http://localhost/leanerp">LEAN ERP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
            <li class="nav-item active">
              <a class="nav-link" href="http://localhost/leanerp/home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                관리자기능
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                <li><a class="dropdown-item" href="#">학생들록</a></li>
                <li><a class="dropdown-item" href="#">퇴원처리</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">대기자관리</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                교습소현황
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                <li><a class="dropdown-item" href="#">학생등록현황</a></li>
                <li><a class="dropdown-item" href="#">교재정보등록</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">학습기록공유</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                다른 사이트
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                <li><a class="dropdown-item" href="http://jakeleanco.ipdisk.co.kr:8000/lmath">운영서버홈</a></li>
                <li><a class="dropdown-item" href="http://localhost/lmath">린매쓰개발서버</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="https://getbootstrap.com/docs/4.6/getting-started/introduction/">부트스트랩</a></li>
              </ul>
            </li>
          </ul>

          <form class="d-flex align-right">
            <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>

        </div>
      </header>
    </div>
    <!-- row1 end  -->

    <!-- row 2  start nav + main -->
    <div class="row">

      <div class="col-4 side-menu">
        <?php $weekString = array("일", "월", "화", "수", "목", "금", "토"); ?>
        <div class="fw-bold text-center"> ( Today: <?= date("Y-m-d", time()) ?> <?= $weekString[date('w')] ?> )
        </div>

        <div class="fs-5 fw-bolder text-decoration-underline text-center mt-2">
          학생명단 </div>

        <!-- Sidebar start  -->
        <!-- list Title -->
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <a class="link-secondary" data-bs-toggle="collapse" data-bs-target="#nav2-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span> button </span=>
          </a>
          <span>전체 학생 리스트 </span>
        </h6>

        <table class="display" style="width:100%" id="mydata">
          <thead>
            <tr>
              <th>Student Name</th>
              <th>Grade</th>
              <th>Class</th>
              <th style="text-align: right;">Actions</th>
            </tr>
          </thead>
          <tbody id="show_data">

          </tbody>
        </table>

      </div>

      <main class="col-8">
        <!-- Main start -->
        <div class="row">


      </Main>

    </div>
    <!-- row 2 end  -->

  </div>
  <!-- container-fluid end -->

  <!--Load JavaScript File-->
  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.bundle.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-select.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/datatables.js'); ?>"></script>

  <script type="text/javascript">
    $(document).ready(function() {}
  </script>

</body>

</html>