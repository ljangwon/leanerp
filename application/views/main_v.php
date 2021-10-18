<!DOCTYPE html>
<html>

<head>
  <title>Main</title>

  <!--Load CSS File-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-select.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/my.css'); ?>">
  <

</head>

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

      <div class="col-3 side-menu">
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

        <table class="table table-striped" id="mydata">
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

      <main class="col-9">
        <!-- Main start -->
        <div class="row">
          <!-- default contents3  -->
          <div class="container">
            <h1>Package Lists</h1>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addNewModal">Add New Package</button><br />
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Package Name</th>
                  <th>Created At</th>
                  <th>Item Product</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $count = 0;
                foreach ($package->result() as $row) :
                  $count++;
                ?>
                  <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $row->package_name; ?></td>
                    <td><?php echo $row->package_created_at; ?></td>
                    <td><?php echo $row->item_product . ' Items'; ?></td>
                    <td>
                      <a href="#" class="btn btn-info btn-sm update-record" data-package_id="<?php echo $row->package_id; ?>" data-package_name="<?php echo $row->package_name; ?>">Edit</a>
                      <a href="#" class="btn btn-danger btn-sm delete-record" data-package_id="<?php echo $row->package_id; ?>">Delete</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <!-- default contents3 end  -->


          <!-- Add New Package Modal -->
          <form action="<?php echo site_url('package/create'); ?>" method="post">
            <div class="modal fade" id="addNewModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Package</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Package</label>
                      <div class="col-sm-10">
                        <input type="text" name="package" class="form-control" placeholder="Package Name" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Product</label>
                      <div class="col-sm-10">
                        <select class="bootstrap-select" name="product[]" data-width="100%" data-live-search="true" multiple required>
                          <?php foreach ($product->result() as $row) : ?>
                            <option value="<?php echo $row->product_id; ?>"><?php echo $row->product_name; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                  </div>
                </div>
              </div>
            </div>
          </form>

          <!-- Update Package Modal-->
          <form action="<?php echo site_url('package/update'); ?>" method="post">
            <div class="modal fade" id="UpdateModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Package</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Package</label>
                      <div class="col-sm-10">
                        <input type="text" name="package_edit" class="form-control" placeholder="Package Name" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Product</label>
                      <div class="col-sm-10">
                        <select class="bootstrap-select strings" name="product_edit[]" data-width="100%" data-live-search="true" multiple required>
                          <?php foreach ($product->result() as $row) : ?>
                            <option value="<?php echo $row->product_id; ?>"><?php echo $row->product_name; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="edit_id" required>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                  </div>
                </div>
              </div>
            </div>
          </form>

          <!-- Delete Package Modal -->
          <form action="<?php echo site_url('package/delete'); ?>" method="post">
            <div class="modal fade" id="DeleteModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Package</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <h4>Are you sure to delete this package?</h4>

                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="delete_id" required>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-success btn-sm">Yes</button>
                  </div>
                </div>
              </div>
            </div>
          </form>

        </div>
        <!-- row 3 end -->
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
    $(document).ready(function() {
      show_product(); //call function show all product

      $('#mydata').dataTable();

      //function show all product
      function show_product() {
        $.ajax({
          type: 'ajax',
          url: '<?php echo site_url('main/student_data') ?>',
          async: true,
          data: { grade1 : "초등" },
          dataType: 'json',
          success: function(data) {
            var html = '';
            var i;
            for (i = 0; i < data.length; i++) {
              html += '<tr>' +
                '<td>' + data[i].name + '</td>' +
                '<td>' + data[i].grade1 + data[i].grade2 + '</td>' +
                '<td>' + data[i].class_name + '</td>' +
                '<td style="text-align:right;">' +
                '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-product_code="' + data[i].product_code + '" data-product_name="' + data[i].product_name + '" data-price="' + data[i].product_price + '">Edit</a>' + ' ' +
                '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-product_code="' + data[i].product_code + '">Delete</a>' +
                '</td>' +
                '</tr>';
            }
            $('#show_data').html(html);
          }
        });
      }

      $('.bootstrap-select').selectpicker();

      //GET UPDATE
      $('.update-record').on('click', function() {
        var package_id = $(this).data('package_id');
        var package_name = $(this).data('package_name');
        $(".strings").val('');
        $('#UpdateModal').modal('show');
        $('[name="edit_id"]').val(package_id);
        $('[name="package_edit"]').val(package_name);
        //AJAX REQUEST TO GET SELECTED PRODUCT
        $.ajax({
          url: "<?php echo site_url('package/get_product_by_package'); ?>",
          method: "POST",
          data: {
            package_id: package_id
          },
          cache: false,
          success: function(data) {
            console.log(data);
            var item = data;
            var val1 = item.replace("[", "");
            var val2 = val1.replace("]", "");
            var values = val2;
            $.each(values.split(","), function(i, e) {
              $(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
              $(".strings").selectpicker('refresh');

            });
          }

        });
        return false;
      });

      //GET CONFIRM DELETE
      $('.delete-record').on('click', function() {
        var package_id = $(this).data('package_id');
        $('#DeleteModal').modal('show');
        $('[name="delete_id"]').val(package_id);
      });

    });
  </script>

</body>

</html>