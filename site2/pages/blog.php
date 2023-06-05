<?php
include("/wamp64/www/site2/pages/connectionDb.php");
include("/wamp64/www/site2/pages/func.php");
?>

<!-- main -->
<main style="background: #cacaca38">
  <section>
    <img class="blogPage-background" src="./assets/img/background2.jpg" alt="background" />
  </section>
  <!-- blog search -->
  <div class="blogSearch">
    <input type="text" class="seacrh-bar" name="" id="" placeholder="search blog" />
    <button class="btn-search">
      <i class="fa-solid fa-magnifying-glass"></i>
    </button>
  </div>
  <!-- blog card -->
  <div class="article-container">

    <?php
    $query = $pdo->prepare("SELECT * FROM `post` INNER JOIN writers ON writers.id = post.writer_id ORDER BY post.id DESC");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
      $id       = $row['id'];
      $title    = $row['title'];
      $title    = substr($title, 0, 50) . "...";
      $content  = $row['article'];
      $writer   = $row['writer_name'];
      $date     = $row['date'];
      $content  = substr($content, 0, 170) . "...";
    ?>

      <!-- card-1 -->
      <div class="card">
        <img class="card-img" src="./assets/img/blog3-img.jpg" alt="blog1-img" />
        <h3 class="card-author">
          <i class="fa-solid fa-user" style="color: #ffffff"></i>
          <span style="margin-left: 0.3rem"><?php echo $writer; ?></span>
          <i class="fa-solid fa-calendar-days" style="color: #ffffff; margin-left: 0.5rem"></i>
          <?php echo $date; ?>
        </h3>
        <h2 class="card-header"><?php echo $title; ?></h2>
        <p class="card-paragraph">
          <?php echo $content; ?>
        </p>
        <div class="line"></div>
        <a href="./index.php?git=post&id=<?php echo $id ?>" class="btn-read">Read More</a>
      </div>

    <?php } ?>

  </div>
  <!-- blog card end -->
</main>