<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Welcome to Jaseph.Github.io </title>
  <meta content="" name="The Jaseph.Github.io page lists content published by Jaseph.com authors. Daily articles are published on dozens of topics such as health, culture, travel and more. ">
  <meta content="" name="Travel, Health, Culture, Food, History, Technology, Mobility, Women">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  
</head>

<body>



  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.php">Jaseph</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="https://jaseph.com/c/travel/">Travel</a></li>
          <li><a class="nav-link scrollto" href="https://jaseph.com/c/health/">Health</a></li>
          <li><a class="nav-link scrollto " href="https://jaseph.com/c/culture/">Culture</a></li>
          <li><a class="nav-link scrollto" href="https://jaseph.com/c/food/">Food</a></li>
          <li><a class="nav-link scrollto" href="https://jaseph.com/c/history/">History</a></li>
          <li><a class="nav-link scrollto" href="https://jaseph.com/c/technology/">Technology</a></li>
          
          <li><a class="nav-link scrollto" href="https://jaseph.com/c/women/">Women</a></li>

          <li><a class="nav-link scrollto" href="https://jaseph.com/c/mobility/">Mobility</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">



    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

          <?php
$rss_feed_url = 'http://jaseph.com/feed'; // Hedef web sitesinin RSS besleme URL'si
$rss = simplexml_load_file($rss_feed_url);

if ($rss) {
    $items = $rss->channel->item;
    $total_items = count($items); // Toplam makale sayısı
    $items_per_page = 10; // Sayfa başına makale sayısı
    $total_pages = ceil($total_items / $items_per_page); // Toplam sayfa sayısı
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // Geçerli sayfa numarası

    // Makalelerin başlangıç ve bitiş indeksleri
    $start_index = ($current_page - 1) * $items_per_page;
    $end_index = min($start_index + $items_per_page, $total_items);

    for ($i = $start_index; $i < $end_index; $i++) {
        $item = $items[$i];
        ?>



<article class="entry">
    <div class="entry-img">
        <?php
        // Resim bilgisini alma denemesi
        $media_content = $item->children('media', true)->content;
        if ($media_content) {
            $image_url = $media_content->attributes()->url;
            echo '<img src="' . $image_url . '" alt="<?php echo $item->title; ?>" title="<?php echo $item->title; ?>" class="img-fluid">';
        }
        ?>
    </div>

    <h2 class="entry-title">
        <a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
    </h2>

    <div class="entry-meta">
        <ul>
            <?php
            // Yazar bilgisini alma
            $author = $item->children('dc', true)->creator;
            if (empty($author)) {
                $author = $item->author;
            }

            // Yazar adını kullanıcı adına dönüştürme
            if ($author === "Stella Morgan") {
                $user_name = str_replace(' ', '', strtolower($author));
            } else {
                $user_name = str_replace(' ', '-', strtolower($author));
            }
            ?>
            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="http://jaseph.com/author/<?php echo $user_name; ?>"><?php echo $author;?></a></li>
            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <?php echo date('F j, Y', strtotime($item->pubDate)); ?></time></li>
        </ul>
    </div>

    <div class="entry-content">
        <p>
        <?php echo $item->description; ?>
  
        </p>
        <div class="read-more">
            <a href="<?php echo $item->link; ?>">Read More</a>
        </div>
    </div>
</article><!-- End blog entry -->




            <?php
    }

    // Sayfalama bağlantıları
    echo '<div class="pagination">';
    for ($page = 1; $page <= $total_pages; $page++) {
        echo '<a href="?page=' . $page . '">' . $page . '</a> ';
    }
    echo '</div>';
} else {
    echo 'RSS beslemesi yüklenemedi.';
}
?>


            


          
            

      

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

             
            

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                  <li><a href="https://jaseph.com/c/travel/">Travel</a></li>
                  <li><a href="https://jaseph.com/c/health/">Health</a></li>
                  <li><a href="https://jaseph.com/c/culture/">Culture </a></li>
                  <li><a href="https://jaseph.com/c/food/">Food</a></li>
                  <li><a href="https://jaseph.com/c/history/">History</a></li>
                  <li><a href="https://jaseph.com/c/technology/">Technology</a></li>
                  <li><a href="https://jaseph.com/c/mobility/">Mobility</a></li>
                  <li><a href="https://jaseph.com/c/women/">Women</a></li>
                </ul>
              </div><!-- End sidebar categories-->

            
              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="https://jaseph.com/t/historic-old-town/">Historic Old Town</a></li>
                  <li><a href="https://jaseph.com/t/healthcare/">Healthcare</a></li>
                  <li><a href="https://jaseph.com/t/world-war-ii/">World War II</a></li>
                  <li><a href="https://jaseph.com/t/roses/">Roses</a></li>
                  <li><a href="https://jaseph.com/t/flowers/">Flowers</a></li>
                  <li><a href="https://jaseph.com/t/10-must-see-places/">10 Must See Places</a></li>
                  <li><a href="https://jaseph.com/t/things-to-do-in/">Things to do in</a></li>
                  <li><a href="https://jaseph.com/t/ancient-cathedrals/">Ancient Cathedrals</a></li>
                  <li><a href="https://jaseph.com/t/street-food/">Street food</a></li>
                  <li><a href="https://jaseph.com/t/colombian-cuisine/">Colombian cuisine</a></li>
                  <li><a href="https://jaseph.com/t/museum/">Museum</a></li>
                  <li><a href="https://jaseph.com/t/london/">London</a></li>
                </ul>
              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          

          

        </div>
      </div>
    </div>

    <div class="container d-lg-flex py-4">

      <div class="me-lg-auto text-center text-lg-start">
        <div class="copyright">
          &copy; Copyright <strong><span><a href="https://jaseph.github.io">Jaseph</a></span></strong>. All Rights Reserved
        </div>
        <div class="credits">
         
          Thans  <a href="https://divo-flowers.de">Blumenladen Köln</a>
        </div>
      </div>
      
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>


