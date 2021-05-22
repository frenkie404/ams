<?php
$student = get_session("student"); ?>

<h3 class="text-5xl">Hello <?php echo $student[
  "fullname"
]; ?>, welcome to HDC AMS.</h3>
<h4 class="text-3xl">Let's secure your account with a strong password.</h4>
<form action="/controllers/users/setPassword.php" method="POST" class="m-auto">
    <div class="my-6">
        <label for="password" class="block mb-2">password</label>
        <input type="password" name="password" id="password" class="rounded w-full block px-2 py-1 text-black" />
    </div>
    <input type="submit" name="set_password" value="Set Password" class="mt-6 px-4 py-2 font-bold cursor-pointer rounded uppercase bg-yellow-400 text-black shadow-lg hover:transform scale-110" />
</form> 