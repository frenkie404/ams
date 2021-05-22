<?php
$current_action = get_session("admin_action"); ?>

<h1 class="text-5xl font-bold font-heading mb-12 leading-normal">
    Create <?php echo $current_action === "create_student"
      ? "Student"
      : "Teacher"; ?>
</h1>
<form action="/controllers/admin/create.php" method="post" class="async">
        <div class="my-6">
            <label for="name" class="block mb-2">name</label>
            <input type="text" name="name" id="name" class="rounded w-full block px-2 py-1 text-black" />
        </div>

        <div class="my-6">
            <label for="email" class="block mb-2">email</label>
            <input type="email" name="email" id="email" class="rounded w-full block px-2 py-1 text-black" />
        </div>

        <div class="my-6">
            <label for="faculty" class="block mb-2">faculty</label>
            <select name="faculty" id="faculty" class="p-2 w-full rounded text-black">
                <option value="bim">BIM</option>
                <option value="bca">BCA</option>
                <option value="csit">CSIT</option>
                <option value="bhm">BHM</option>
            </select>
        </div>

        <div class="my-6">
            <label for="semester" class="block mb-2">semester</label>
            <select name="semester" id="semester" class="p-2 w-full rounded text-black">
                <option value="first">First</option>
                <option value="second">Second</option>
                <option value="third">Third</option>
                <option value="fourth">Fourth</option>
                <option value="fifth">Fifth</option>
                <option value="sixth">Sixth</option>
                <option value="seventh">Seventh</option>
                <option value="eighth">Eighth</option>
            </select>
        </div>

    <?php if ($current_action !== "create_student") {
      echo '        
            <div class="my-6">
                <label for="subject" class="block mb-2">subject</label>
                <input type="text" name="associated_subject" id="subject" class="rounded w-full block px-2 py-1 text-black" />
            </div>';
    } ?>

        <div class="my-6">
            <label for="picture" class="block btn">Picture</label>
            <input type="file" name="picture" id="picture" accept="image/png, image/jpeg"  />
        </div>

        <input type="submit" name="create" value="Create" class="btn" />
    </form>
