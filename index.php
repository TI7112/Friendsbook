<?php include 'config/db.php';
checkAuth('login.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="//cdn.tailwindcss.com"></script>
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.css" rel="stylesheet" /> -->
</head>

<body>
    <header class="sticky top-0  z-10">
        <div class="flex px-32 text-white items-center py-4 justify-between bg-sky-600">
            <h1 class="text-4xl font-serif font-semibold">Friendsbook</h1>
            <div class="">
                <!-- search start  -->
                <form class="bg-white  rounded-lg">
                    <input size="45" class="px-2 outline-none text-black" type="search" placeholder="Search...">
                    <button class="rounded-lg bg-sky-400 px-4 hover:bg-sky-500 py-2" type="submit">go</button>
                </form>

                <!-- search end -->
            </div>
            <div class="flex items-center gap-6 py-2 px-4 text-lg font-semibold">
                <a href="" class="hover:underline">Profile</a>
                <a href="" class="hover:underline">Setting</a>
                <a href="" class="hover:underline">Privacy</a>
                <div class="flex gap-3 items-center">
                    <div class="flex-1">
                        <img class="w-12 h-12 rounded-full" src="assets/img_upload/dp/<?= $user['dp'];?>" alt="">
                    </div>
                    <div class="flex-2">
                        <p class="font-serif font-normal">Mr.
                            <?= $user['fname']; ?>
                        </p>
                        <p
                            class="font-serif text-sm font-semibold text-rose-100 hover:text-rose-400 cursor-pointer -mt-1">
                            <a href="logout.php">logout</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="flex px-32 min-h-screen bg-slate-200">
        <div class="w-2/6 p-5 sticky top-24 h-screen">
            <div class="bg-white rounded-lg relative">
                <img src="assets/img_upload/cover/cover.webp" class="w-full h-32" alt="">
                <div class="absolute top-24 w-full flex justify-center">
                    <form action="config/db.php" method="post" enctype="multipart/form-data">
                        <label for="dp_upload" class="cursor-pointer">
                            <img src="assets/img_upload/dp/<?= $user['dp']; ?>"
                                class="w-24 h-24 border-4 shadow-lg rounded-lg" alt="">
                            <input onchange="this.form.submit()" type="file" name="dp" id="dp_upload" class="hidden">
                        </label>
                    </form>
                </div>
                <div class="pt-[4.5rem]">
                    <p class="text-2xl font-semibold font-serif text-center">
                        <?= $user['fname'] . " " . $user['lname']; ?>
                    </p>
                    <p class="text-sm font-semibold font-serif text-center text-slate-500">
                        <?= $user['caption'];?>
                    </p>
                    <p class="text-sm font-semibold font-serif text-center text-slate-800 py-4">
                        <?= $user['bio'];?>
                    </p>
                </div>
                <div class="flex border-y-2">
                    <div class="w-1/3 text-center py-2">
                        <p class="font-semibold text-lg">
                            <?php
                        $userid = $user['id'];
                        $query = mysqli_query( $conn , "SELECT * FROM `posts` WHERE `post_by` = '$userid' ;");
                        $post_count = mysqli_num_rows($query);
                        echo "$post_count";?>
                        </p>
                        <p class="font-semibold text-base text-slate-500 -mt-2">Post</p>
                    </div>
                    <div class="w-1/3 text-center py-2 border-x-2">
                        <p class="font-semibold text-lg">2.5K</p>
                        <p class="font-semibold text-base text-slate-500 -mt-2">Followers</p>
                    </div>
                    <div class="w-1/3 text-center py-2">
                        <p class="font-semibold text-lg">365</p>
                        <p class="font-semibold text-base text-slate-500 -mt-2">Following</p>
                    </div>
                </div>
                <div class=" text-lg flex flex-col font-bold font-serif">
                    <a class="hover:text-indigo-600 border-b-2 py-2  px-10" href="">FEED</a>
                    <a class="hover:text-indigo-600 border-b-2 py-2  px-10" href="">Connections</a>
                    <a class="hover:text-indigo-600 border-b-2 py-2  px-10" href="">Latest News</a>
                    <a class="hover:text-indigo-600 border-b-2 py-2  px-10" href="">Events</a>
                    <a class="hover:text-indigo-600 border-b-2 py-2  px-10" href="">Groups</a>
                    <a class="hover:text-indigo-600 border-b-2 py-2  px-10" href="">Notifications</a>
                    <a class="hover:text-indigo-600 border-b-2 py-2  px-10" href="">Settings</a>
                </div>
                <p class="text-center w-full py-2"><a href="" class="text-indigo-500 hover:underline ">view profile</a>
                </p>
            </div>
        </div>
        <div class="w-6/12 p-5 ">
            <div class="flex items-center gap-3 ">
                <div
                    class="group border-2 bg-white w-36 h-44 hover:border-slate-900 cursor-pointer border-dashed border-slate-400 flex flex-col justify-center items-center py-10 px-5">
                    <p
                        class="text-4xl group-hover:bg-slate-800 text-white bg-slate-400 w-10 h-10 flex justify-center items-center rounded-full">
                        +</p>
                    <p class="font-semibold text-slate-600 group-hover:text-slate-900">post a story</p>
                </div>
                <div class="relative group w-36 hover:brightness-90 cursor-pointer h-44">
                    <img src="assets/img_upload/dp/dp_images_subham.jpg" class="w-full h-full brightness-75" alt="">
                    <p class="absolute bottom-3 text-white font-semibold pl-2">Ankit Roy</p>
                </div>
                <div class="relative group w-36 hover:brightness-90 cursor-pointer h-44">
                    <img src="assets/img_upload/dp/dp_images_ayush.jpg" class="w-full h-full brightness-75" alt="">
                    <p class="absolute bottom-3 text-white font-semibold pl-2">Ayush Jha</p>
                </div>
                <div class="relative group w-36 hover:brightness-90 cursor-pointer h-44">
                    <img src="assets/img_upload/dp/dp_images_saket.jpg" class="w-full h-full brightness-75" alt="">
                    <p class="absolute bottom-3 text-white font-semibold pl-2">Harsh Sinha</p>
                </div>
                <div class="relative group w-36 hover:brightness-90 cursor-pointer h-44">
                    <img src="assets/img_upload/dp/dp_images_subham.jpg" class="w-full h-full brightness-75" alt="">
                    <p class="absolute bottom-3 text-white font-semibold pl-2">Ankit Roy</p>
                </div>
            </div>

            <form action="config/db.php" method="post" enctype="multipart/form-data" class="bg-white rounded my-5">
                <div class="flex items-center gap-5 px-10 py-4 ">
                    <img src="assets/img_upload/dp/<?= $user['dp']; ?>" class="w-12 h-12 rounded-full" alt="">
                    <textarea type="text" name="post_caption" placeholder="Share your thoughts"
                        class="w-full p-2 outline-none text-lg resize-none" id=""></textarea>
                </div>
                <div class="flex justify-between px-10 pt-5 pb-4">
                    <div class="flex items-center font-semibold text-slate-600 gap-5">
                        <label for="Photos_upload"
                            class="bg-green-300 cursor-pointer hover:bg-green-400 px-4 py-1">Photos
                            <input type="file" name="Photos" id="Photos_upload" class="hidden">
                        </label>
                        <label for="Videos" class="bg-rose-300 hover:bg-rose-400 px-4 py-1" href="">Videos</label>
                        <label for="Events" class="bg-sky-300 hover:bg-sky-400 px-4 py-1" href="">Events</label>
                        <label for="Activities" class="bg-yellow-300 hover:bg-yellow-400 px-4 py-1"
                            href="">Activities</label>
                    </div>
                    <div class="">
                        <input type="submit" value="post" name="post_upload"
                            class="bg-sky-500 px-4 py-1 text-white font-semibold rounded hover:bg-sky-600 cursor-pointer">
                    </div>
                </div>
            </form>

            <?php 
            $query = mysqli_query($conn , "SELECT * FROM `posts` JOIN accounts ON posts.post_by = accounts.id ORDER BY posts.post_id DESC");
            while($curElem = mysqli_fetch_array($query)): ?>
            <div class="bg-white my-5 rounded">
                <div class="flex justify-between items-center px-6 py-4">
                    <div class="flex gap-3">
                        <img class="w-12 h-12 rounded-full" src="assets/img_upload/dp/<?= $curElem['dp'];?>" alt="">
                        <div class="">
                            <p class="text-lg font-semibold cursor-pointer hover:text-sky-600">
                                <?= $curElem['fname'] . " " . $curElem['lname'] ?>
                            </p>
                            <p class="text-xs font-semibold text-slate-600">
                                <?=  date("H:i | D d M Y",strtotime($curElem['created_at']));?>
                            </p>
                        </div>
                    </div>
                    <button class="text-2xl cursor-pointer hover:text-sky-600">...</button>
                </div>
                <div class="px-8 pb-2">
                    <p class="font-semibold text-lg">
                        <?= $curElem['post_caption'] ?>
                    </p>
                </div>
                <?php if($curElem['image'] != null):?>
                <div class="pt-2">
                    <img src="assets/img_upload/post/<?= $curElem['image'] ?>" class="w-[48rem] h-[48rem]" alt="">
                </div>
                <?php endif ?>
                <div class="grid grid-cols-3 border-y-2 text-center bg-white">
                    <form method="post" action="config/db.php">
                        <input type="text" value="<?= $curElem['post_id'] ?>" name="post_id" class="hidden">
                        <input type="submit" class="py-2 font-semibold hover:bg-sky-200 w-full" name="handleLikes"
                            value="<?php $Likes_count = getLikes($curElem['post_id']); echo $Likes_count;?> Likes" />
                    </form>
                    <p class="py-2 font-semibold border-x-2 hover:bg-sky-200"><?php $Likes_count = getComments($curElem['post_id']); echo $Likes_count;?> Comments</p>
                    <button class="py-2 font-semibold hover:bg-sky-200">12 share</button>
                </div>
                <form action="config/db.php" method="post" class="py-2 border-b-2 justify-between flex items-center px-6">
                    <textarea placeholder="leave a comment..." class="resize-none w-full outline-none" name="post_comments" id="" cols="30" rows="1"></textarea>
                    <input type="text" name="post_id" value="<?= $curElem['post_id']; ?>" class="hidden">
                    <input class="bg-sky-500 cursor-pointer text-white font-semibold px-5 py-1" type="submit" value="Post comment" name="handleComments" id="">
                </form>
                <div class=" <?php $viewmore =false ? 'overflow-auto' : 'overflow-hidden h-28' ?>">
                <?php 
                $postId = $curElem['post_id'];
                $comments_query = mysqli_query($conn , "SELECT * FROM `post_comments` JOIN `posts` ON post_comments.post_id = posts.post_id JOIN `accounts` on post_comments.comment_by = accounts.id where post_comments.post_id = $postId ;");
                while($row=mysqli_fetch_array($comments_query)): ?>
                <div class="px-4 pt-2 border-b-2">
                    <div class="flex items-center gap-2">
                        <img src="assets/img_upload/dp/<?= $row['dp']; ?>" class="w-10 h-10 rounded-full" alt="">
                        <div class="">
                            <p class="font-semibold text-slate-800 cursor-pointer hover:text-black text-lg"><?= $row['fname'] . " " . $row['lname']; ?></p>
                            <p class="font-semibold text-slate-500 -mt-1 cursor-pointer text-xs"><?= $row['caption']; ?></p>
                        </div>
                    </div>
                    <p class="py-5 truncate px-4 text-slate-600 font-semibold "><?= $row['comments']?></p>
                </div>
                <?php endwhile ?>
                </div>
                <form action="config/db.php" method="post">
                    <input type="text" value="<?= $curElem['post_id']; ?>" class="hidden" name="post_id" id="">
                    <input type="submit" class="bg-sky-500 text-white px-5 py-1 w-full hover:bg-sky-600 cursor-pointer font-semibold" value="Read more comments" name="handle_read_more_comments">
                </form>
            </div>
            <?php endwhile ?>
        </div>
        <div class="w-2/6 p-5 sticky top-24 h-screen">
            <div class="bg-white flex flex-col rounded-lg ">
                <h1 class="text-2xl px-4 py-2 font-semibold">Who to follow</h1>
                <div class="flex flex-col gap-2">
                    <?php 
                    $query = mysqli_query( $conn , "SELECT * FROM accounts" );
                    while($row = mysqli_fetch_array($query)):
                    ?>
                    <div class="flex items-center justify-between px-5 border-b-2">
                        <div class="flex items-center gap-6  py-2">
                            <img src="assets/img_upload/dp/<?= $row['dp']; ?>" class="w-16 h-16 rounded-full" alt="">
                            <div class="">
                                <p class="text-xl font-semibold ">
                                    <?= $row['fname'] . " " . $row['lname']; ?>
                                </p>
                                <p class="text-sm font-semibold text-green-600 -mt-1">online</p>
                            </div>
                        </div>
                        <div
                            class="bg-slate-200 w-8 rounded-full text-xl p-0 hover:bg-indigo-500 font-semibold hover:text-white h-8 flex justify-center items-center">
                            <a class="" href="">+</a>
                        </div>
                    </div>
                    <?php endwhile ?>
                </div>


            </div>
        </div>
    </div>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.js"></script> -->
</body>

</html>