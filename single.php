<?php include("path.php"); ?>
<?php include(ROOT_PATH . '/app/controllers/posts.php');

if(isset($_GET['id'])){
    $post = selectOne('posts', ['id' => $_GET['id']]);
}
$topics = selectAll('topics');
$posts = selectAll('posts', ['published' => 1]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/css/main.css">
    <title><?php echo $post['title']; ?> | InfoNest</title>
</head>
<body>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v21.0">
</script>

<!--Header link-->

<?php include(ROOT_PATH . "/app/includes/header.php"); ?>


    <!-- Page Wrapper-->
    <div class="page-wrapper">

        <!--Content--> 
        <div class="content clearfix">
            <!--Main Content Wrapper-->
            <div class="main-content-wrapper">
            <div class="main-content single">
               <h1 class="post-title"><?php echo $post['title']; ?></h1>

               <div class="post-content">
                   <?php echo html_entity_decode($post['body']); ?>
               </div>

            </div>
            </div>
            <!--End of Main Content-->

            <!-- Sidebar-->
            <div class="sidebar single">

                <div class="fb-page" data-href="https://www.facebook.com/jakeinfo/" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                </div>

                <div class="section popular">
                    <h2 class="section-title">Popular</h2>

                    <?php foreach ($posts as $p): ?>
                        <div class="post clearfix">
                            <img src="<?php echo BASE_URL . '/assets/images/' . $p['image']; ?>" alt="">
                            <a href="" class="title">
                                <h4><?php echo $p['title'] ?></h4>
                            </a>
                        </div>
                    <?php endforeach; ?>

                    
                </div>

                <div class="section topics">
                    <h2 class="section-title">Topics</h2>
                    <ul>
                        <?php foreach ($topics as $key => $topic): ?>    
                            <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&title=' . $topic['title']?>"><?php echo $topic['title']; ?></a></li>
                        <?php endforeach; ?>    
                    </ul>
                </div>

            </div>
            <!--End of Sidebar-->

        </div>
        <!--End of Content-->

    </div>
    <!--End of Page Wrapper-->

     <!-- Footer link -->

     <?php include(ROOT_PATH ."/app/includes/footer.php"); ?>

    <!-- JQUERY CDN-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- Slick Carousel-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>



    <!-- Custom Script-->
    <script src="assets/js/scripts.js"></script>
</body>

</html>
