<article id="output" class="w-full p-4 bg-blue-600 text-white rounded-lg shadow-xl overflow-y-scroll">
    <?php
    $current_action = get_session("admin_action");

    switch ($current_action) {
      case "create_student":
      case "create_teacher":
        include "createForm.php";

      default:
        include "createForm.php";
    }
    ?>
</article>

<nav class="p-4 bg-blue-600 text-white rounded-lg shadow-xl w-1/5">
    <div class="nav__wrap">
        <ul>
            <li><button type="button" data-action="create-teacher" class="btn mb-4 w-full">Create Teacher</button></li>
            <li><button type="button" data-action="create-student" class="btn btn--white mb-4 w-full">Create Student</button></li>
            <li><button type="button" data-action="get-teachers" class="btn btn--white mb-4 w-full">Get Teachers</button></li>
            <li><button type="button" data-action="get-students" class="btn btn--white w-full">Get Students</button></li>
        </ul>
    </div>
</nav>