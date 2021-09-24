<?php
    ob_start();
    session_start();
    require "./connect_db.php";
    require "./includes/functions/function.php";
    $page_name = "Dashboard";
    $style = "profile.css";
    $script="profile.js";
    $boot = "true";
    require_once "./includes/template/header.php";
    if(isset($_SESSION['user_id'])){

    $data = all_where("users","id",$_SESSION["user_id"]);

    $all_orders = order_where($_SESSION["user_id"]);


?>
<div class="container">
    <div class="main-body">
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="img/client.png" alt="Admin" class="rounded-circle" width="120">
                    <div class="mt-3">
                      <h4><?php echo $data[0]["username"];?></h4>
                      <p class="text-secondary mb-3"><?php echo $data[0]["email"];?></p>
                      <a href="dash.php" style="color: #fff;text-decoration: none;" class="btn btn-primary">Go to Dashboard</a>

                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                    <span class="text-secondary">WWW.amr.com</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg style="color:#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"class="feather feather-globe mr-2 icon-inline"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>Linked In</h6>
                    <span class="text-secondary"><a href="<?php echo $data["linked_in"];?>">@amr_mohemd4</a></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                    <span class="text-secondary"><a href="<?php echo $data["twitter"];?>">@amr_mohemd4</a></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                    <span class="text-secondary"><a href="<?php echo $data["instgram"];?>">@amr_mohemd4</a></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                    <span class="text-secondary"><a href="<?php echo $data["facebook"];?>">@amr_mohemd4</a></span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
            <div class="content">
                <div class="container">
                    <h3 class="content_heaader"><i class="fal fa-address-card"></i> More Information</h3>
                    <img style="display: block;margin:auto;margin-bottom:50px" src="img/line.png" alt="line">


                    <main>
                <div class="container-fluid">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Your Previous Shopped Medicines
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>medicine</th>
                                            <th>quantity</th>
                                            <th>price</th>
                                            <th>payment Method</th>
                                            <th>time</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>medicine</th>
                                            <th>quantity</th>
                                            <th>price</th>
                                            <th>payment Method</th>
                                            <th>time</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i=1; foreach ($all_orders as $data){ ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $data["medicine"] ?></td>
                                            <td><?php echo $data["quantity"] ?></td>
                                            <td><?php echo $data["price"] ?></td>
                                            <td><?php echo $data["payment_method"] ?></td>
                                            <td><?php echo $data["time"] ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>


                    </div>
                </div>
            </div>

            </div>
          </div>

        </div>
    </div>
    

<?php
 }else{
            header("location:index.php");}
            require_once "./includes/template/footer.php";
            ob_end_flush();