<?php
    include "../includes/session.php";
    include "../includes/functions.php";

    $user_role = get_session("user_role");
    if(!$user_role){
        redirect("/");
    }

    include "../includes/header.php";
?>
<main class="flex justify-start align-center h-full w-full px-4">
    <h3 class="w-3/5 text-5xl mt-32"><?php echo "Enter your ". get_session("user_role") ." credentials" ?></h3>
    
    <div class="bg-blue-600 text-gray-200 w-full px-8 py-4 pt-32 transform -skew-x-12">
        <form action="/authenticate/index.php" method="POST" class="transform skew-x-12 w-3/5 m-auto">
            <div class="my-6">
                <label for="username" class="block mb-2">username</label>
                <input type="text" name="username" id="username" class="rounded w-full block px-2 py-1 text-black" />
            </div>
            <div class="my-6">
                <label for="password" class="block mb-2">password</label>
                <input type="password" name="password" id="password" class="rounded w-full block px-2 py-1 text-black" />
            </div>
            <input type="submit" name="login" value="Login" class="mt-6 px-4 py-2 font-bold cursor-pointer rounded uppercase bg-yellow-400 text-black shadow-lg hover:transform scale-110" />
        </form> 
    </div>
</main>