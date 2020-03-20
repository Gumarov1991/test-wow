<html>
<head>
    <meta charset="utf-8">
    <title>Test wow</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/test-wow/public_html/css/jquery-ui.min.css">
    <link rel="stylesheet" href="/test-wow/public_html/css/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="/test-wow/public_html/js/jquery-ui.min.js"></script>
    <script src="/test-wow/public_html/js/main.js"></script>
</head>
<body>
<div id="content">
    <div class="forms">
        <div class="form">
            <h2>Создание роли</h2>
            <form id="add_role">
                <label>Название роли: <input type="text" name="role_name"></label>
                <div class="ajax-resp">
                    <p></p>
                </div>
                <input type="submit" value="Создать">
            </form>
        </div>
        <div class="form">
            <h2>Создание юзера</h2>
            <form id="add_user">
                <label>Имя юзера: <input type="text" name="user_name"></label>
                <div>
                    <select id="select-user-role" name="user_role">
                        <option disabled selected>Роль юзера</option>
                        <?php foreach ($allRoles as $id => $roleName) {
                            echo "<option value='$id'>$roleName</option>";
                        } ?>
                    </select>
                    <input type="submit" value="Создать">
                </div>
                <div class="ajax-resp">
                    <p></p>
                </div>
            </form>
        </div>
    </div>
    <div class="users">
        <h2>Все юзеры</h2>
        <div id="all_users">
            <?php foreach ($allUsers as $user) {
                echo "<div class='row'>
                  <div class='col-2'>${user['id']}</div>
                  <div class='col-5'>${user['username']}</div>
                  <div class='col-5'>${user['rolename']}</div>
              </div>";
            } ?>
        </div>
    </div>
</div>
</body>
</html>