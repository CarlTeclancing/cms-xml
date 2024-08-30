<?php
$id = $_GET['id'];
$xml = simplexml_load_file('xml/pages.xml');
$page = $xml->xpath("//page[@id='$id']")[0];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $page->title = $_POST['title'];
    $page->content = $_POST['content'];
    $xml->asXML('xml/pages.xml');
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Page</h1>
        <form method="POST" action="edit_page.php?id=<?php echo $id; ?>">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $page->title; ?>" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required><?php echo $page->content; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Page</button>
        </form>
    </div>
</body>
</html>
