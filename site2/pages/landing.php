<?php
include("/wamp64/www/site2/pages/connectionDb.php");
include("/wamp64/www/site2/pages/func.php");
?>
<!-- main -->
<main>
    <section>
        <img src="./assets/img/background.jpg" alt="background" />
        <h1 class="section-header">Welcome</h1>
        <h1 class="section-header2">My Blog...</h1>
    </section>
    <div class="section2">
        <h2 class="section2-header">About Us</h2>
        <p class="section2-paragraph">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum nemo
            dolor unde sequi rerum rem odio dolorum necessitatibus quia,
            architecto vitae delectus reprehenderit blanditiis pariatur assumenda
            consectetur, soluta quam cum tenetur perspiciatis numquam voluptas
            quos minus veniam. Nemo accusamus possimus minus ipsa, a delectus unde
            aliquam quam numquam alias ea in, dolorum enim hic quaerat. Quae ab,
            aliquam beatae inventore ipsum nisi iste natus commodi sapiente
            pariatur alias laboriosam consequatur praesentium nostrum
            voluptatibus. Officiis, ad perspiciatis facilis quae dolores sapiente
            voluptatem? Magnam dignissimos iusto qui aspernatur necessitatibus
            nulla atque ipsum explicabo quos repellat aliquam unde libero facilis
            quia, nemo voluptas?
        </p>
        <a href="./index.php?git=about" class="btn-more">Discover More</a>
        <img src="./assets/img/img1.jpg" alt="img" />
    </div>

    <article>
        <h2 class="article-header">Latest blog posts</h2>
        <div class="article-container">
            <?php
            $query = $pdo->prepare("SELECT * FROM `post` INNER JOIN writers ON writers.id = post.writer_id INNER JOIN category ON category.id = post.cat_id ORDER BY post.id DESC LIMIT 3");
            $query->execute();
            $rows = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                $id       = $row['id'];
                $title    = $row['title'];
                $title    = substr($title, 0, 50) . "...";
                $content  = $row['article'];
                $writer   = $row['writer_id'];
                $date     = $row['date'];
                $content  = substr($content, 0, 170) . "...";
            ?>
                <div class="card">
                    <img class="card-img" src="./assets/img/blog3-img.jpg" alt="blog3-img" />
                    <h3 class="card-author">
                        <i class="fa-solid fa-user" style="color: #ffffff"></i>
                        <span style="margin-left: 0.3rem">
                            <?php echo $writer ?>
                        </span>
                        <i class="fa-solid fa-calendar-days" style="color: #ffffff; margin-left: 0.5rem"></i>
                        <?php echo $date ?>
                    </h3>
                    <h2 class="card-header"><?php echo $title ?></h2>
                    <p class="card-paragraph">
                        <?php echo $content ?>
                    </p>
                    <div class="line"></div>
                    <a href="index.php?git=post&id=<?php echo $id ?>" class="btn-read">Read More</a>
                </div>

            <?php   }; ?>

        </div>
    </article>
</main>
<!-- main end -->