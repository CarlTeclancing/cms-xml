<?php
$id = $_GET['id'];
$xml = simplexml_load_file('xml/articles.xml');
$article = $xml->xpath("//article[@id='$id']")[0];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->author = $_POST['author'];
    $xml->asXML('xml/articles.xml');
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Article</h1>
        <form method="POST" action="edit_article.php?id=<?php echo $id; ?>">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $article->title; ?>" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required><?php echo $article->content; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="<?php echo $article->author; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Article</button>
        </form>
    </div>
</body>
</html>
