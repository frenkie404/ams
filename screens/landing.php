<?php
    if(isset($_POST["landing_form"])){
        $_SESSION["user_role"] = $_POST["user_role"];
        header("Location: ./login");
        die();
    }
?>

<main class="w-full px-12 h-full pt-32">
    <h2 class="text-5xl font-bold font-heading mb-12 leading-normal">Himalaya Darshan College's <br /> Student Management System</h2>
    <form action="" class="landing__form" method="POST">
        <strong>I am a</strong>
        <select name="user_role" id="user_role" class="p-2 rounded text-white bg-blue-600">
            <option value="admin">Admin</option>
            <option value="teacher">Teacher</option>
            <option value="student">Student</option>
        </select>
        <input type="submit" value="Login" name="landing_form" class="btn" />
    </form>
</main>