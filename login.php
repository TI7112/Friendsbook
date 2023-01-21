<?php include 'config/db.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Friendsbook</title>
  <script src="//cdn.tailwindcss.com"></script>
</head>

<body>
  <?php include 'components/header.php' ?>
  <section class="text-white body-font min-h-[93vh] bg-[url('assets/img_primary/connect.jpg')]">
    <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
      <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
      <h1 class="title-font font-medium text-6xl text-white">Welcome in Friendsbook</h1>
                <p class="leading-relaxed mt-4 text-xl">Connecting Together.</p>
      </div>
      <div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
        <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Create New Account</h2>
        <form action="" method="post">
          <div class="relative mb-4">
            <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
            <input type="email" id="" name="email"
              class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
          <div class="relative mb-4">
            <label for="password" class="leading-7 text-sm text-gray-600">Password</label>
            <input type="password" id="" name="pass"
              class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
          <input type="submit" value="Login"
           name="submit" class="w-full text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" />
          <p class="text-sm text-gray-500 mt-3">Dont have an account? <a href="register.php"
              class="text-rose-500 hover:underline">sign up</a> here</p>
        </form>
      </div>
    </div>
    <?php
       if(isset($_POST['submit'])){
           $email = $_POST['email'];
           $pass = sha1($_POST['pass']);
           $run =  mysqli_query($conn , "SELECT * FROM accounts where email = '$email' and pass = '$pass'");
           $count = mysqli_num_rows($run);
           if($count > 0){
              $_SESSION['user'] = $email;
               redirect('index.php');
           }
           else{
            alert("your email or password is incorrect");
           }
       }
    ?>
  </section>
</body>

</html>