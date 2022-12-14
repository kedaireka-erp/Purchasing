<!doctype html>
<html lang="en">

<head>

    
    <title> <?php echo $__env->yieldContent('judul-laman'); ?> </title>
    

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    

    
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo e(asset('layout/layout.css')); ?>">
</head>

<body>
 
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">

            <div id="logo">
                <img class="logo" src="<?php echo e(asset('images/home_logo.png')); ?>">
            </div>
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <div class="p-4 pt-5">
             
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Purchase Request</a>
                    </li>

                    <li>
                        <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Master Request <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                              </svg>
                        </a>
                    </li>
                      <div class="collapse" id="collapseExample">
                        <div class="list-request" style="margin-left: 20px">
                            
                            <li>
                                <a href="#">Master Item</a>
                            </li>
                            <li>
                                <a href="#">Master Lokasi</a>
                            </li>
                            <li>
                                <a href="#">Master Satuan</a>
                            </li>
                            <li>
                                <a href="#">Master Kebutuhan/Pengiriman</a>
                            </li>
                        </div>
                      </div>
                    <li>
                        <a href="#">Approval</a>
                    </li>


                     <li>
                        <a data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Master Order <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                              </svg>
                        </a>
                    </li>
                      <div class="collapse" id="collapseExample2">
                        <div class="list-order" style="margin-left: 20px">
                            
                            <li>
                                <a href="#">Master Waktu Peengiriman</a>
                            </li>
                            <li>
                                <a href="#">Master Pembayaran</a>
                            </li>
                           
                        </div>
                      </div>
                    </li>
                    <li>
                        <a href="#">Request Tracking</a>
                    </li>
                    <li>
                        <a href="#">Purchase Order</a>
                    </li>
                </ul>
        </nav>

         


              
        <!-- Page Content  -->
        <div id="content">
           

            
            
            <nav class="navbar navbar-light">
                <div class="container-fluid">
                  <a class="navbar-brand"></a>
                  <form class="d-flex">
                  </form>
                </div>
              </nav>
            <div class="container">


            <?php echo $__env->yieldContent('Judul-content'); ?>
                
            <hr>
        </div>
    </div>
</div>
    <script type="text/javascript" src="<?php echo e(URL::asset('layout/jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('layout/main.js')); ?>"></script>
</body>
              

</html><?php /**PATH D:\Kuliah\Semester5\Kedaireka\Project\Purchasing\Purchasing_System\resources\views/layout/sidebar.blade.php ENDPATH**/ ?>