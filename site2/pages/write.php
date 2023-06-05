<?php
include("/wamp64/www/site2/pages/connectionDb.php");
include("/wamp64/www/site2/pages/func.php");
?>
<!-- admin panel menu -->
<div class="admin-panel">
    <a href="./index.php" class="admin-menu">See site</a>
    <a href="./index.php?git=admin" class="admin-menu"><i class="fa-regular fa-file-lines"></i>Articles</a>
    <a href="./index.php?git=write" class="admin-menu"><i class="fa-solid fa-plus"></i>Write an article</a>
</div>
<div class="panel">
    <h2 class="panel-header">Write an article</h2>
</div>
<!-- admin panel article write -->
<div class="write-container">
    <?php
    if ($_POST) {
        $title             = ucfirst(htmlspecialchars($_POST['header']));
        $article           = strip_tags($_POST['article']);
        $article           = nl2br($article);
        $article           = htmlspecialchars_decode($_POST['article']);
        $writer            = ucfirst(htmlspecialchars($_POST['writer']));
        $category          = ucfirst(htmlspecialchars($_POST['category']));
        $categorySubtitle  = ucfirst(htmlspecialchars($_POST['categorySubtitle']));
        $date              = date('Y-m-d H:i:s');

        // Kategori veritabanında kontrol etme
        $categoryCheck = $pdo->prepare("SELECT id FROM category WHERE cat_name = ?");
        $categoryCheck->execute([$category]);
        $categoryID = $categoryCheck->fetchColumn();

        // Kategori veritabanında yoksa ekleme
        if (!$categoryID) {
            $dataAddCategory = $pdo->prepare("INSERT INTO category (cat_name) VALUES (?)");
            $dataAddCategory->execute([$category]);
            $categoryID = $pdo->lastInsertId();
        }

        // Yazar veritabanında kontrol etme
        $writerCheck = $pdo->prepare("SELECT id FROM writers WHERE writer_name = ?");
        $writerCheck->execute([$writer]);
        $writerID = $writerCheck->fetchColumn();

        // Yazar veritabanında yoksa ekleme
        if (!$writerID) {
            $dataAddWriter = $pdo->prepare("INSERT INTO writers (writer_name) VALUES (?)");
            $dataAddWriter->execute([$writer]);
            $writerID = $pdo->lastInsertId();
        }

        if (empty($title) || empty($writer) || empty($article) || empty($category) || empty($categorySubtitle)) {
            echo "<script>alert('Birşeyleri atladınız!');</script>";
        } else {
            $dataAdd = $pdo->prepare("INSERT INTO post (title, article, writer_id, cat_id, date) VALUES (?, ?, ?, ?, ?)");
            $dataAdd->execute([$title, $article, $writer, $category, $date]);

            if ($dataAdd) {
                // Başarı durumu
                echo "<script>alert('Başarıyla postu yüklediniz.');</script>";

                // Yazar ve kategori ID'lerini güncelleme
                $postID = $pdo->lastInsertId();

                $dataUpdate = $pdo->prepare("UPDATE post SET writer_id = ?, cat_id = ? WHERE id = ?");
                $dataUpdate->execute([$writerID, $categoryID, $postID]);

                header("REFRESH:1;URL=./index.php?git=admin");
            } else {
                // Başarısız durum
                echo "<script>alert('Birşeyler yanlış gitti!');</script>";
                header("REFRESH:1;URL=./index.php?git=write");
            }
        }
    }
    ?>

    <form action="" method="post">
        <strong>Header :</strong><br>
        <input type="text" name="header" class="headerText"><br>
        <strong>Category :</strong><br>
        <input type="text" name="category" class="headerText"><br>
        <strong>Category Subtitle :</strong><br>
        <input type="text" name="categorySubtitle" class="headerText"><br>
        <strong>Author :</strong><br>
        <input type="text" name="writer" class="headerText"><br>
        <strong>Select image :</strong><br>
        <input type="file" name="image" accept="image/*"><br><br>
        <strong>Article :</strong><br>
        <textarea name="article" cols="30" rows="10" class="articleText"></textarea><br>
        <button type="submit" class="send">Send</button>
    </form>
</div>