<article id="output" class="ml-12 w-full overflow-y-scroll">
    <?php
    $current_action = get_session("admin_action");
    $data = get_session("data");

    if ($data) {
      output_table(["Fullname", "Email", "Faculty", "Semester"], $data);
    } else {
      include "createForm.php";
    }
    ?>
</article>

<nav class="p-4 bg-blue-600 text-white rounded-lg shadow-xl w-1/5">
    <div class="nav__wrap">
        <ul>
            <li><a href="/dashboard" class="btn mb-4 min-w-full w-max">Create Teacher</a></li>
            <li><a href="/dashboard" class="btn btn--white mb-4 min-w-full w-max">Create Student</a></li>
            <li><a href="/controllers/admin/read.php?type=teachers" class="btn btn--white mb-4 min-w-full w-max">Get Teachers</a></li>
            <li><a href="/controllers/admin/read.php?type=students" class="btn btn--white min-w-full w-max">Get Students</a></li>
        </ul>
    </div>
</nav>