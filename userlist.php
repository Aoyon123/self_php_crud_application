<?php
include 'header.php';
include 'connection.php';
?>


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>

        <?php
        $records = mysqli_query($conn, "SELECT count(*) FROM tbluser ORDER BY id ASC");
        $row_db = mysqli_fetch_row($records);
        $total_records = $row_db[0];
        ?>

        <div>
            <form action="search_query.php" id="" method="POST"> 
                <input type="search" id="query" name="user_name" placeholder="Search...">
                <input type="submit" name="search" value="Search">
            </form>
        </div>


        <div>
            <div class="container">

                <table class="table table-bordered table-striped">
                    <tr>
                        <td><h1>Total Number of records </h1></td>
                        <td><h1><?php echo $total_records; ?></h1></td>
                    </tr>
                </table>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SL No</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Operation</th>
                        </tr>
                    </thead>
                    <tbody>

            
                        <?php
                    // for get the current page number
                        if (isset($_GET["page"])) {
                            $page = $_GET["page"];
                        } else {
                            $page = 1;
                        }
                    
                     $get_page_decrement=$page-1;
                      $get_page_increment=$page+1;



                        $numberOfRecordsPerPage = !empty($_GET['page_limit']) ? $_GET['page_limit'] : 5;

                        if (isset($_POST['limit_submit'])) {
                            $numberOfRecordsPerPage = $_POST['choice'];
                        }

                        $start_page = ($page - 1) * $numberOfRecordsPerPage;
                        $offsetStr = !empty($start_page) ? ' offset '.$start_page : '';
                        
                        $query = "SELECT * FROM tbluser ORDER BY id ASC LIMIT ".$numberOfRecordsPerPage. $offsetStr;
                        
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                            $serial = $start_page;
                            while ($row = mysqli_fetch_assoc($result)) {

                                $firstName = $row['firstName'];
                                $lastName = $row['lastName'];
                                $gender = $row['gender'];
                                $email = $row['email'];
                                $password = $row['password'];

                                echo ' <tr>
        <th scope="row">' . ++$serial . '</th>
        <td>' . $firstName . '</td>
        <td>' . $lastName . '</td>
        <td>' . $gender . '</td>
        <td>' . $email . '</td>
        <td>' . $password . '</td>
        
        <td>
        <button class="btn btn-primary"><a href="update.php?updateid=' . $row['id'] . '" class="text-light">Update</a></button>
        <button class="btn btn-danger"><a href="delete.php?deleteid=' . $row['id'] . '" class="text-light">Delete</a></button>
       </td>
      </tr>';
                            }
                        }
                        ?>

                    </tbody>
                </table>

                <div class="pagination-drop">

                    <div class="pageLink"> 
                        <?php

                  //echo "<a href='userlist.php?page=$get_page_decrement'>
                 // <span class='bg-dark'><</span></a>";

                  if($get_page_decrement<1){
                      echo "<";
                  }
                else {
                    echo "<a href='userlist.php?page=$get_page_decrement'>
                    <span class='bg-dark'><</span></a>";
                }
                       

              $total_pages = ceil($total_records / $numberOfRecordsPerPage);
                        $pageLink = "<ul class='pagination'>";
                        for ($i = 1; $i <= $total_pages; $i++) {
                            ?>
                            <li class='page-item'><a class='page-link' href='userlist.php?page=<?php echo $i ?>&page_limit=<?php echo $numberOfRecordsPerPage; ?>'> <?php echo $i ?></a></li>

                            <?php
                            
                        }
                        "</ul>";
                       // echo "<a href='userlist.php?page=$get_page_increment'>
                       // <span class='bg-dark'>></span></a>";
                       

                        if($get_page_increment>$total_pages){
                            echo "<";
                        }
                      else {
                          echo "<a href='userlist.php?page=$get_page_increment'>
                          <span class='bg-dark'>></span></a>";
                      }



                        ?>
                    </div>
                    
              <?php
              
             // $x=((empty($total_pages)) || ($total_pages>0 && $total_pages<=5)) ? 1:((floor(j)))
              
              
              
              
              
              
              ?>
                    
                    
                    
                    <div class="option-select">
                        <form method="post" action="">
                            <select class=""  name="choice">
                                <option selected>Select Option...</option>   
                                <option <?php if($numberOfRecordsPerPage==3){echo 'selected';} ?> value="3">3</option>
                                <option <?php if($numberOfRecordsPerPage==6){echo 'selected';} ?> value="6">6</option>
                                <option <?php if($numberOfRecordsPerPage==9 ){echo 'selected';} ?> value="9">9</option>
                            </select>

                            <button class="limit_submit_design" name="limit_submit" type="submit" >select option</button>
                        </form> 
                    </div>  
                </div>
            </div>
        </div>
        <style>
            
            .pageLink{
                display: flex;
            }
            .pagination-drop{
                display: flex;
            }
            .option-select{
                margin-left: 90px;
            }
            .limit_submit_design{
                background-color: brown;
                font-weight: 20px;
                border-radius: 5px;
                
            }
        </style> 





    </body>
</html>




<?php
include 'footer.php';
?>