<?php
echo '<nav class="container gray--background">
    <div class="header-left">
        <a href="index.php">
            <i class="fa-solid fa-house"> Home </i>
        </a>
    </div>   
    <ul class="header-desktop">
        <li class="header-item-desktop container"><a href="'.$our_services.'">Our services</a></li>
        <li class="header-item-desktop container"><a href="our-products.php">Our products</a></li>
        <li class="header-item-desktop container"><a href="'.$contact_us.'">Contact us</a></li>
        <li class="header-item-desktop container"><a href="login.php">Admin section</a></li>
        <li class="header-item-desktop container bars"><a href="#" onclick="toggleBarsMenu()">
            <i class="fa-solid fa-bars"></i>
        </a></li>
    </ul>
</nav>
<div class="gray--background">
    <ul id="mobileMenu" class="header-mobile inactive">
        <li class="header-item-mobile container"><a href="'.$our_services_mobile.'">Our services</a></li>
        <li class="header-item-mobile container"><a href="our-products.php">Our products</a></li>
        <li class="header-item-mobile container"><a href="'.$contact_us_mobile.'">Contact us</a></li>
        <li class="header-item-mobile container"><a href="login.php">Admin section</a></li>
    </ul>
</div>'
;?>