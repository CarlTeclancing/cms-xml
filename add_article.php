<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $xml = simplexml_load_file('xml/articles.xml');
    $article = $xml->addChild('article');
    $article->addAttribute('id', uniqid());
    $article->addChild('title', $_POST['title']);
    $article->addChild('content', $_POST['content']);
    $article->addChild('author', $_POST['author']);
    $xml->asXML('xml/articles.xml');
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Add New Article</h1>
        <form method="POST" action="add_article.php">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Article</button>
        </form>
    </div>
</body>
</html>
