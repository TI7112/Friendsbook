<?php include 'config/db.php'; ?>
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
    <?php include 'components/header.php'; ?>
    <section class="text-white body-font min-h-[93vh] bg-[url('assets/img_primary/connect.jpg')]">
        <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
            <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
                <h1 class="title-font font-medium text-6xl text-white">Welcome in Friendsbook</h1>
                <p class="leading-relaxed mt-4 text-xl">Connecting Together.</p>
            </div>
            <div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
                <h2 class="text-gray-900 text-xl font-medium title-font mb-5">Create New Account</h2>
                <form action="" method="post">
                    <div class="flex gap-2">
                        <div class="relative mb-4">
                            <label for="fname" class="leading-7 text-sm text-gray-600">First Name</label>
                            <input type="text" id="full-name" name="fname"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="lname" class="leading-7 text-sm text-gray-600">Last Name</label>
                            <input type="text" id="last-name" name="lname"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <div class="relative w-full mb-4">
                            <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                            <input type="email" id="" name="email"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <div class="relative mb-4">
                            <label for="password" class="leading-7 text-sm text-gray-600">Password</label>
                            <input type="password" id="" name="pass"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="contact" class="leading-7 text-sm text-gray-600">Contact</label>
                            <input type="text" id="" name="contact"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <div class="relative mb-4">
                            <label for="gender" class="leading-7 text-sm text-gray-600">Gender</label>
                            <select name="gender"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <option value="m" selected disabled>Select gender</option>
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                                <option value="o">others</option>
                            </select>
                        </div>
                        <div class="relative mb-4">
                            <label for="dob" class="leading-7 text-sm text-gray-600">Date of Birth</label>
                            <input type="date" id="" name="dob"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>

                    <input type="submit" value="Sign up" name="submit"
                        class="text-white bg-indigo-500 w-full border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" />
                    <p class="text-sm text-gray-500 mt-3">Already have an Account <a href="login.php"
                            class="text-rose-500 hover:underline">Login</a> here
                    </p>
                </form>
            </div>
        </div>
        <?php
            if(isset($_POST['submit'])){
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $contact = $_POST['contact'];
                $pass = sha1($_POST['pass']);
                $gender = $_POST['gender'];
                $dob = $_POST['dob'];

                $run =  mysqli_query($conn , "INSERT INTO `accounts` ( `fname`, `lname`, `email`, `contact`, `pass`, `gender`, `dob`) VALUES ('$fname', '$lname', '$email', '$contact', '$pass', '$gender', '$dob');");

                if($run){
                    $_SESSION['user'] = $email;
                    redirect('index.php');
                }
            }
        ?>

    </section>
</body>

</html>