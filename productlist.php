<?php
// Include the configuration and data fetch files
include 'fetch-data.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=0"
    />
    <meta
      name="keywords"
      
    />
    <meta name="robots" content="noindex, nofollow" />
    <title>Add Menu</title>

    <link
      rel="shortcut icon"
      type="image/x-icon"
      href="assets/img/favicon.jpg"
    />

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="assets/css/animate.css" />

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css" />

    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css" />

    <link
      rel="stylesheet"
      href="assets/plugins/fontawesome/css/fontawesome.min.css"
    />
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />

    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body onload="table();">
    <div class="main-wrapper">


    
      <div class="header">
      
              
      <?php include 'header.php'; ?>

      </div>



      <?php include 'sidebar.php'; ?>



      <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Menu List</h4>
                        <h6>Manage your menu</h6>
                    </div>
                    <div class="page-btn">
                        <a href="addproduct.html" class="btn btn-added">
                            <img src="assets/img/icons/plus.svg" alt="img" class="me-1" />Add New Menu
                        </a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-path">
                                    <a class="btn btn-filter" id="filter_search">
                                        <img src="assets/img/icons/filter.svg" alt="img" />
                                        <span><img src="assets/img/icons/closes.svg" alt="img" /></span>
                                    </a>
                                </div>
                                <div class="search-input">
                                    <a class="btn btn-searchset">
                                        <img src="assets/img/icons/search-white.svg" alt="img" />
                                    </a>
                                </div>
                            </div>
                            <div class="wordset">
                                <ul>
                                    <li><a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="assets/img/icons/pdf.svg" alt="img" /></a></li>
                                    <li><a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="assets/img/icons/excel.svg" alt="img" /></a></li>
                                    <li><a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="assets/img/icons/printer.svg" alt="img" /></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="card mb-0" id="filter_inputs">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <form method="GET" action="">
                                            <div class="row">
                                                <div class="col-lg col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <select name="menu_name" class="select">
                                                            <option value="">Choose Menu</option>
                                                            <?php while ($row = $menuResult->fetch_assoc()) : ?>
                                                                <option value="<?php echo htmlspecialchars($row['menu_name']); ?>"
                                                                    <?php if (isset($_GET['menu_name']) && $_GET['menu_name'] == $row['menu_name']) echo 'selected'; ?>>
                                                                    <?php echo htmlspecialchars($row['menu_name']); ?>
                                                                </option>
                                                            <?php endwhile; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <select name="category" class="select">
                                                            <option value="">Choose Category</option>
                                                            <?php while ($row = $categoryResult->fetch_assoc()) : ?>
                                                                <option value="<?php echo htmlspecialchars($row['category']); ?>"
                                                                    <?php if (isset($_GET['category']) && $_GET['category'] == $row['category']) echo 'selected'; ?>>
                                                                    <?php echo htmlspecialchars($row['category']); ?>
                                                                </option>
                                                            <?php endwhile; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <select name="subcategory" class="select">
                                                            <option value="">Choose Sub Category</option>
                                                            <?php while ($row = $subcategoryResult->fetch_assoc()) : ?>
                                                                <option value="<?php echo htmlspecialchars($row['subcategory']); ?>"
                                                                    <?php if (isset($_GET['subcategory']) && $_GET['subcategory'] == $row['subcategory']) echo 'selected'; ?>>
                                                                    <?php echo htmlspecialchars($row['subcategory']); ?>
                                                                </option>
                                                            <?php endwhile; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <select name="price" class="select">
                                                            <option value="">Price</option>
                                                            <?php while ($row = $priceResult->fetch_assoc()) : ?>
                                                                <option value="<?php echo htmlspecialchars($row['price']); ?>"
                                                                    <?php if (isset($_GET['price']) && $_GET['price'] == $row['price']) echo 'selected'; ?>>
                                                                    <?php echo htmlspecialchars($row['price']); ?>
                                                                </option>
                                                            <?php endwhile; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-filters ms-auto">
                                                            <img src="assets/img/icons/search-whites.svg" alt="img" />
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="table">
                            <div class="table-responsive">
                                <table class="table datanew">
                                    <thead>
                                        <tr>
                                            <th>
                                                <label class="checkboxs">
                                                    <input type="checkbox" id="select-all" />
                                                    <span class="checkmarks"></span>
                                                </label>
                                            </th>
                                            <th>Menu Name</th>
                                            <th>Code</th>
                                            <th>Category</th>
                                            <th>SubCategory</th>
                                            <th>Price</th>
                                            <th>Created By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($rows as $row) : ?>
                                        <tr>
                                            <td>
                                                <label class="checkboxs">
                                                    <input type="checkbox" />
                                                    <span class="checkmarks"></span>
                                                </label>
                                            </td>
                                            <td class="productimgname">
                                                <a href="javascript:void(0);" class="product-img">
                                                    <img src="assets/img/product/noimage.png" alt="product" /> <!-- Replace with actual image path -->
                                                </a>
                                                <a href="javascript:void(0);"><?php echo $row['menu_name']; ?></a>
                                            </td>
                                            <td><?php echo $row['code']; ?></td>
                                            <td><?php echo $row['category']; ?></td>
                                            <td><?php echo $row['subcategory']; ?></td>
                                            <td><?php echo $row['price']; ?></td>
                                            <td><?php echo $row['created_by']; ?></td>
                                            <td>
                                                <a href="editproduct.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
                                                    <img src="assets/img/icons/edit.svg" alt="edit" />
                                                </a>
                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                    <img src="assets/img/icons/delete.svg" alt="delete" />
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="table-bottom">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="show-entries">
                                        <p>Showing 1 to 10 of 50 entries</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="pagination-box">
                                        <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="javascript:void(0);"><img src="assets/img/icons/chevrons-left.svg" alt="img" /></a></li>
                                            <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0);"><img src="assets/img/icons/chevrons-right.svg" alt="img" /></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  
    </script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="assets/js/script.js"></script>
    <script>
    $(document).ready(function() {
        if (!$.fn.DataTable.isDataTable('.datanew')) {
            $('.datanew').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true
            });
        }
    });
    </script>
  </body>
</html>
