<article class="w-full p-4 bg-blue-600 text-white rounded-lg shadow-xl overflow-y-scroll">
    <h1 class="text-5xl font-bold font-heading mb-12 leading-normal">Create Teacher</h1>

    <form action="/controllers/admin/create.php" method="post">
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

        <div class="my-6">
            <label for="subject" class="block mb-2">subject</label>
            <input type="text" name="associated_subject" id="subject" class="rounded w-full block px-2 py-1 text-black" />
        </div>

        <div class="my-6">
            <label for="picture" class="block btn">Picture</label>
            <input type="file" name="picture" id="picture" accept="image/png, image/jpeg"  />
        </div>

        <input type="hidden" name="create_type" value="teacher" />
        <input type="submit" name="create" value="Create" class="btn" />
    </form>
</article>

<nav class="p-4 bg-blue-600 text-white rounded-lg shadow-xl w-1/5">
    <div class="nav__wrap">
        <ul>
            <li><button type="button" data-action="create-teacher" class="btn mb-4 w-full">Create Teacher</button></li>
            <li><button type="button" data-action="create-student" class="btn btn--white mb-4 w-full">Create Student</button></li>
            <li><button type="button" data-action="get-teacher" class="btn btn--white mb-4 w-full">Get Teachers</button></li>
            <li><button type="button" data-action="get-student" class="btn btn--white w-full">Get Students</button></li>
        </ul>
    </div>
</nav>