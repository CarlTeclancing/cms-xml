<?php
$xml = simplexml_load_file('xml/users.xml');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_user'])) {
        $user = $xml->addChild('user');
        $user->addAttribute('id', uniqid());
        $user->addChild('username', $_POST['username']);
        $user->addChild('password', password_hash($_POST['password'], PASSWORD_DEFAULT));
        $user->addChild('role', $_POST['role']);
        $xml->asXML('xml/users.xml');
    } elseif (isset($_POST['delete_user'])) {
        $id = $_POST['user_id'];
        $userIndex = 0;
        foreach ($xml->user as $index => $user) {
            if ($user['id'] == $id) {
                $userIndex = $index;
                break;
            }
        }
        unset($xml->user[$userIndex]);
        $xml->asXML('xml/users.xml');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Manage Users</h1>
        <form method="POST" action="manage_users.php">
            <h2>Add User</h2>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="admin">Admin</option>
                    <option value="editor">Editor</option>
                </select>
            </div>
            <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
        </form>

        <hr>

        <h2>Existing Users</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($xml->user as $user) { ?>
                <tr>
                    <td><?php echo $user->username; ?></td>
                    <td><?php echo $user->role; ?></td>
                    <td>
                        <form method="POST" action="manage_users.php" style="display:inline;">
                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                            <button type="submit" name="delete_user" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
