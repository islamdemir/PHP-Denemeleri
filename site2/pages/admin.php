<?php
include("/wamp64/www/site2/pages/connectionDb.php");
?>
<!-- admin panel menu -->
<div class="admin-panel">
    <a href="./index.php" class="admin-menu">See site</a>
    <a href="./index.php?git=admin" class="admin-menu"><i class="fa-regular fa-file-lines"></i>Articles</a>
    <a href="./index.php?git=write" class="admin-menu"><i class="fa-solid fa-plus"></i>Write an article</a>
</div>
<div class="panel">
    <h2 class="panel-header">Articles</h2>
</div>

<!-- admin write article data -->
<div class="admin-container">
    <table>
        <tr>
            <th class="header">Article Header</th>
            <th class="date">Release Date</th>
        </tr>

        <?php
        $data = $pdo->prepare("SELECT * FROM `post` ORDER BY id DESC");
        $data->execute();
        $query = $data->fetchALL(PDO::FETCH_ASSOC);
        foreach ($query as $row) {
            echo '<tr>
                    <td class="header">
                    <a style="color:#4848ff; letter-spacing:0.03rem" href="./index.php?git=post&id=' . $row['id'] . '">' . $row['title'] . '</a>
                    </td>
                    <td class="date">
                    ' . $row['date'] . '</td>
                    
                  </tr>';
        }
        ?>
    </table>
</div>