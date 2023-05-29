<div class="contact-container">
    <div class="left">
        <h3><i class="fa-solid fa-location-dot"></i>Adres:</h3>
        <p><a href="#" target="_blank">
            Your location
            </a></p>
        <h3> <i class="fa-solid fa-phone"></i>Telefon:</h3>
        <p>Ad Soyad</p>
        <p>0000 000 00 00</p>
        <p>0000 000 00 00</p>
        <h3><i class="fa-regular fa-paper-plane"></i>E-Mail:</h3>
        <p>example@example.com</p>
    </div>
    <div class="right">
        <form action="./pages/form.php" method="post">
            <label for="fname">Adınız:</label>
            <input type="text" id="fname" name="fname" placeholder="Adınız" class="border" required><br>
            <label for="mail">E-Mail Adresiniz:</label>
            <input type="email" name="email" id="email" placeholder="E-Mail" class="border" required><br>
            <label for="subject">Konu:</label>
            <input type="text" id="subject" name="subject" placeholder="Konu Giriniz" class="border" required><br>
            <label for="message">Mesajınız:</label>
            <textarea name="message" class="form-control border" id="message" cols="30" rows="4" placeholder="Mesajınızı Giriniz" required></textarea><br>
            <input type="submit" value="Gönder" class="button" style="background: #66BE45; color:#fff; width:200px; height:60px;">
        </form>
    </div>
</div>