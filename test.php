<?php
  ob_start();
  include("connection.php");

  // if(isset($_POST['register'])){
  //   $name = $_POST['name'];
  //   $email = $_POST['email'];
  //   $password = $_POST['password'];
  //   exit('success');
  // }
?>
<?php

//index.php

//Include Configuration File
// include('login.php');

// $login_button = '';


// if(isset($_GET["code"]))
// {

//  $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


//  if(!isset($token['error']))
//  {
 
//   $google_client->setAccessToken($token['access_token']);

 
//   $_SESSION['access_token'] = $token['access_token'];

 



//   $google_service = new Google_Service_Oauth2($google_client);

 
//   $data = $google_service->userinfo->get();

 
//   if(!empty($data['given_name']))
//   {
//    $_SESSION['user_first_name'] = $data['given_name'];
//   }

//   if(!empty($data['family_name']))
//   {
//    $_SESSION['user_last_name'] = $data['family_name'];
//   }

//   if(!empty($data['email']))
//   {
//    $_SESSION['user_email_address'] = $data['email'];
//   }

//   if(!empty($data['gender']))
//   {
//    $_SESSION['user_gender'] = $data['gender'];
//   }

//   if(!empty($data['picture']))
//   {
//    $_SESSION['user_image'] = $data['picture'];
//   }
//  }
// }


// if(!isset($_SESSION['access_token']))
// {

//  $login_button = '<a href="'.$google_client->createAuthUrl().'">Login With Google</a>';
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
  <title>Bootstrap Navbar Sidebar - Fixed to Left or Right</title>
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/paper/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdn.rawgit.com/mladenplavsic/bootstrap-navbar-sidebar/3bd282bd/docs/navbar-fixed-right.min.css">
  <link rel="stylesheet" href="https://cdn.rawgit.com/mladenplavsic/bootstrap-navbar-sidebar/3bd282bd/docs/navbar-fixed-left.min.css">
  <link rel="stylesheet" href="https://cdn.rawgit.com/mladenplavsic/bootstrap-navbar-sidebar/3bd282bd/docs/docs.css">
  <link rel="stylesheet" href="css/test.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.rawgit.com/mladenplavsic/bootstrap-navbar-sidebar/3bd282bd/docs/docs.js"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
 
    <script src="https://apis.google.com/js/platform.js" async defer></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<!-- <style>
  .parent {
    width: 300px;
}

.ellipsis {
  white-space: nowrap;
  text-overflow: ellipsis;
  overflow: hidden;
}

.block-ellipsis {
  display: block;
  display: -webkit-box;
  max-width: 100%;
  height: 43px;
  margin: 0 auto;
  font-size: 14px;
  line-height: 1;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
}
</style>  -->
<!-- <style>
  #input_container {
    position:relative;
    padding:0 0 0 20px;
    margin:0 20px;
    background:#ddd;
    direction: rtl;
    width: 200px;
}
#input {
    height:20px;
    margin:0;
    padding-right: 30px;
    width: 100%;
}
#input_img {
    position:absolute;
    bottom:2px;
    right:5px;
    width:24px;
    height:24px;
}
::placeholder { 
  color: red;
  opacity: 1; 
}
</style> 
-->
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- <div class="parent">
    <h2>Single Line Ellipsis</h2>
    <div class="ellipsis">
        This is an example of an ellipsis. once we reach 300px of length then the text will be cut off.
    </div>
    <h2>Multiple Line Ellipsis</h2>
    <div class="block-ellipsis">
        This is an example of a multi-line ellipsis. We just set the number of lines we want to display before the ellipsis takes into effect and make some changes to the CSS and the ellipsis should take into effect once we reach the number of lines we want.
    </div>
</div> -->
<!-- <div class="container">
   <br />
   <h2 align="center">PHP Login using Google Account</h2>
   <br />
   <div class="panel panel-default">
   <?php
   if($login_button == '')
   {
    echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
    echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
    echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
    echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
    echo '<h3><a href="logout.php">Logout</h3></div>';
   }
   else
   {
    echo '<div align="center">'.$login_button . '</div>';
   }
   ?>
   </div>
  </div> -->



<!--   <div class="bg-container">
   <div class="content">
     <h1>Background Opacity 0.4</h1>
   </div>
</div> -->

<!-- <div id="input_container">
    <input type="text" id="input" placeholder="aaaaa" value>
    <img src="https://cdn4.iconfinder.com/data/icons/36-slim-icons/87/calender.png" id="input_img">
</div> -->



   <!-- <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
    <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
      }
    </script>  -->

  <!-- <?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = -+($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
 -->

<!--  <?php
        // Code PHP xử lý validate
        $error = array();
        $data = array();
        if (!empty($_POST['contact_action']))
        {
            // Lấy dữ liệu
            $data['fullname'] = isset($_POST['fullname']) ? $_POST['fullname'] : '';
            $data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
            $data['content'] = isset($_POST['content']) ? $_POST['content'] : '';
 
            // Kiểm tra định dạng dữ liệu
            require('validate.php');
            if (empty($data['fullname'])){
                $error['fullname'] = 'Bạn chưa nhập tên';
            }
 
            if (empty($data['email'])){
                $error['email'] = 'Bạn chưa email';
            }
            else if (!is_email($data['email'])){
                $error['email'] = 'Email không đúng định dạng';
            }
 
            if (empty($data['content'])){
                $error['content'] = 'Bạn chưa nhập nội dung';
            }
            else if (!is_phonenumber($data['content'])){
                $error['content'] = 'content không đúng định dạng';
            }
 
            // Lưu dữ liệu
            if (!$error){
                echo 'Dữ liệu có thể lưu trữ';
                // Code lưu dữ liệu tại đây
                // ...
            }
            else{
                echo 'Dữ liệu bị lỗi, không thể lưu trữ';
            }
        }
        ?>
        <h1>freetuts.net - contact form</h1>
        <form method="post" action="test.php">
            <table cellspacing="0" cellpadding="5">
                <tr>
                    <td>Tên của bạn</td>
                    <td>
                        <input type="text" name="fullname" id="fullname" value="<?php echo isset($data['fullname']) ? $data['fullname'] : ''; ?>"/>
                        <?php echo isset($error['fullname']) ? $error['fullname'] : ''; ?>
                    </td>
                </tr>
                <tr>
                    <td>Email của bạn</td>
                    <td>
                        <input type="text" name="email" id="email" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>"/>
                        <?php echo isset($error['email']) ? $error['email'] : ''; ?>
                    </td>
                </tr>
                <tr>
                    <td>Nội dung liên hệ</td>
                    <td>
                        <input type="text" name="content" id="content" value="<?php echo isset($data['content']) ? $data['content'] : ''; ?>"/>
                        <?php echo isset($error['content']) ? $error['content'] : ''; ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="contact_action" value="Gửi liên hệ"/></td>
                </tr>
            </table>
        </form>  -->

<!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card table-responsive m-b-30">
        <h3 class="card-header">List book product</h3>
        <a href="admin.php?module=book-add-product"><button class="btn btn-md btn-success btn-space">Add book</button></a>
        <div class="card-body" style="margin-top: 25px">
            <table id="book_data" class="table table-bordered table-hover">
                <thead>
                    <tr class="table-header">
                        <th scope="col">#</th>
                        <th scope="col">Book</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sale off</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Image</th>
                        <th scope="col">Favorite</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                    </tr>                
                </thead>
                <tbody>
                    <?php 
                      $sqlselectBook = "SELECT * FROM tbl_book AS p";
                      $sqlselectBook .=" INNER JOIN tbl_book_category AS C ON p.book_cat_id=c.book_cat_id";
                      $result = mysqli_query($conn,$sqlselectBook) or die("Lỗi truy vấn sản phẩm");
                      $i = 0;
                      while ($row = mysqli_fetch_assoc($result)) {
                          $i++;
                     ?>
                        <tr class="table-body">
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row["book_name"] ?></td>
                            <td><?php echo $row["book_cat_name"] ?></td>
                            <td><?php echo $row["book_price"] ?></td>
                            <td><?php echo $row["book_sale"] ?></td>
                            <td><?php echo $row["book_qty"] ?></td>
                            <td><img src="<?php echo $row["book_img"] ?>" style="width: 50px; height: 50px;" alt=""></td>
                            <td><?php echo $row["book_favorite"] ?></td>
                            <td><?php echo ($row["status"])?"Show":"Hide" ?></td>
                            <td>
                                <a href="admin.php?module=book-edit-product&book_id=<?php echo $row["book_id"] ?>"><i class="fas fa-edit"></i></a>
                                <a href="admin.php?module=book-product-remove&book_id=<?php echo $row["book_id"] ?>" onclick="return confirm('Do you sure to remove this product?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div> -->

<!--  <?php 

              $post_content = "Lorem ipsum dolor sit, amet consectetur, adipisicing elit. Nobis, dolorem? Blanditiis repellat optio qui, unde alias velit saepe ipsum consequuntur, illum voluptas temporibus officia perferendis omnis commodi accusantium praesentium a, quas cumque ratione assumenda sit. Vel debitis inventore modi numquam explicabo voluptatum iure natus architecto commodi omnis in nam quos suscipit neque quas aliquid eos eligendi, ducimus, sunt. Molestias adipisci vitae fugiat sunt cupiditate fuga alias, reprehenderit rerum ratione nesciunt architecto repudiandae atque fugit ab dolorum? Blanditiis ea tempore impedit aliquid itaque qui temporibus praesentium reiciendis nulla dolorum, delectus, unde sit doloribus dignissimos, sed sapiente nisi quia corrupti quasi repellat?";
              $strCut = substr($post_content, 0,100);
              $post_content = substr($strCut, 0, strrpos($strCut, ' ')).'...';
              echo $post_content;
 ?>  -->
<!-- <div class="modal" id="registerModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><h4>register form</h4></div>
      <div class="modal-body">
        <input type="text" id="userName" placeholder="your name" class="form-control">
        <input type="text" id="userEmail" placeholder="your email" class="form-control">
        <input type="text" id="userPassword" placeholder="your pass" class="form-control">
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" id="registerBtn">Register</button>
        <button class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12" align="right">
      <button class="btn btn-primary" data-toggle="modal" data-target="#registerModal">Register</button>
      <button class="btn btn-success">Log in</button>
    </div>
  </div>
</div>
          <form action="" method="post" class="form-cmt">
            <input type="text" id="cmter_name" name="cmter_name" placeholder="Type your name">
            <div class="comment-form">
              <i class="fa fa-comment-o"></i>
                        <textarea class="form-control" id="cmt_content" name="cmt_content" rows="3" col="50" placeholder="Let's share your opinions" style="width: 300px"></textarea>
                        <br>
              <span class="emoji-box-toggle"></span><button class="btn btn-outline-success" name="addCmt" type="submit"><i class="fa fa-chevron-right"></i></button>
            </div>  
          </form>
          <hr>
          <div class="comments col-12">
              <div class="commenter-in4 col-12 col-sm-12 col-md-5 col-lg-5 col-xl-4">
                <img src="./images/default-user.png" alt="" width="10%">
                <p>
                  long<br><i class="material-icons">date_range</i> 2/9/2000 
                </p>
              </div>
              <div class="commenter-content col-12 col-sm-12 col-md-7 col-lg-7 col-xl-8">
                <p>adu vip</p>
              </div>
            </div>  
            <hr class="light">

<script type="text/javascript">
  $("#addComment"),on('click',function(){
    var comment = $("#mainComment").val();
    if(comment.length>5){
      $.ajax({
        url:'test.php',
        method:'post',
        dataType:'text',
        data:{
          addComment:1,
          comment: comment
        }, success: function(response){
          console.log(response);
        }
      });
    } else{
      alert('please check your input');
    }
  });
  $("#registerBtn").on('click',function(){
    var name = $("#userName").val();
    var email = $("#userEmail").val();
    var password = $("#userPassword").val();
    if(name!="" && email!="" && password!=""){
      $.ajax({
        url: 'test.php',
        method:'POST',
        dataType:'text',
        data:{
          register:1,
          name:name,
          email:email,
          password:password
        }, success: function(response){
          if(response==='failedEmail')
            alert('please insert valid email address');
          else if(reponse==='failedUserExists')
            alert('user with this email already exists');
          else 
            window.location = window.location;
        }
      });
    } else{
      alert('please check your input');
    }
  });
  $("#loginBtn").on('click',function(){
    var email = $("#userName").val():
    var password =  $("#userPassword").val();
    if(email!=""&&password!=""){
      $.ajax({
        url: 'index',
        method: 'POST',
        dataType: 'text',
        data: {
          logIn:1,
          email:email,
          password:password
        }. success: function (response){
          if(response==='failed')
            alert('please check your login details');
          else
            window.location = window.location;
        }
      });
    } else{
      alert('please check your input');
    }
  })
    function getAllComments(start, max){
      if(start>max){
        return;
      }
      $.ajax({
        url: 'book.php',
        method: 'post',
        dataType: 'text',
        data: {
          getAllComments: 1,
          start: start
        }, success: function(response){
          $(".userComments").append(response);
          getAllComments((start+20), max);
        } 
      });
    }
</script> -->
 <script>
    $(document).ready(function(){
        $('#book_data').DataTable();
    });
  </script> 
</body>
</html>