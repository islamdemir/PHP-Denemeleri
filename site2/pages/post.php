<main style="background: #cacaca38">
    <section>
        <img class="blogPage-background" src="./assets/img/background2.jpg" alt="background" />
    </section>
    <div class="blogPage-container">
        <?php
        $query = $pdo->prepare("SELECT * FROM `post`
         INNER JOIN writers ON writers.id = post.writer_id 
         INNER JOIN category ON category.id =  post.cat_id
        WHERE post.id = :post_id");
        $query->bindParam(':post_id', $_GET['id']);
        $query->execute();
        $rows  = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            $id       = $row['id'];
            $writer   = $row['writer_name'];
            $title    = $row['title'];
            $content  = $row['article'];
            $date     = $row['date'];

        ?>
            <img src="./assets/img/blog3-img.jpg" alt="blog3-img">
            <div class="blogPage-content">
                <h3 class="card-author" style="font-size: 16px;">
                    <i class="fa-solid fa-user"></i>
                    <span style="margin-left: 0.3rem">
                        <?php echo $writer ?>
                    </span>
                    <i class="fa-solid fa-calendar-days" style="margin-left: 0.5rem"></i>
                    <?php echo $date ?>
                </h3>
                <h1 class="blogPage-header"><?php echo $title ?></h1>
                <p class="blogPage-paragraph">
                    <?php echo $content ?>
                </p>
            </div>
        <?php }; ?>
    </div>




    <!-- page form -->
    <div class="PageForm">
        <form action="" style="width: 236px;">
            <input class="contactName" type="text" name="" id="" placeholder="Your Name"><br>
            <textarea class="contactSubject" name="" id="" cols="30" rows="10" placeholder="Your Message"></textarea><br>
            <input type="submit" value="Send" class="send">
        </form>
        <div class="showComment">
            <h1 class="name">Your Name</h1>
            <div class="formLine"></div>
            <p class="comment">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Vitae deleniti sit id, doloribus eum maxime animi voluptate minima ipsam blanditiis suscipit provident quidem in,
                repellat eius nam mollitia modi illo!
            </p>
        </div>
        <div class="showComment">
            <h1 class="name">Your Name</h1>
            <div class="formLine"></div>
            <p class="comment">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Vitae deleniti sit id, doloribus eum maxime animi voluptate minima ipsam blanditiis suscipit provident quidem in,
                repellat eius nam mollitia modi illo!
            </p>
        </div>
        <div class="showComment">
            <h1 class="name">Your Name</h1>
            <div class="formLine"></div>
            <p class="comment">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Vitae deleniti sit id, doloribus eum maxime animi voluptate minima ipsam blanditiis suscipit provident quidem in,
                repellat eius nam mollitia modi illo!
            </p>
        </div>
        <div class="showComment">
            <h1 class="name">Your Name</h1>
            <div class="formLine"></div>
            <p class="comment">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Vitae deleniti sit id, doloribus eum maxime animi voluptate minima ipsam blanditiis suscipit provident quidem in,
                repellat eius nam mollitia modi illo!
            </p>
        </div>
    </div>
</main>