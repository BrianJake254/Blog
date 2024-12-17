<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/topics.php"); 
adminOnly();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="../../assets/css/main.css">

    <!-- Admin Styling -->
    <link rel="stylesheet" href="../../assets/css/admin.css">

    <title>Admin | Create Topic</title>
</head>
<body>
    <!-- Admin Header-->
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

    <!-- Admin Page Wrapper-->
    <div class="admin-wrapper">

      <!--Left Sidebar-->
      <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
     

      <!--Admin Content-->
      <div class="admin-content">
        <div class="button-group">
            <a href="index.php" class="btn btn-big">Manage Topics</a>
        </div>

        <div class="content">
            <h2 class="page-title">Create Topic</h2>

            <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

            <form action="create.php" method="post">
                <div>
                    <label>Title</label>
                    <input type="text" name="title"  value=" <?php echo $title; ?>" class="text-input">
                </div>

                <div>
                    <label>Description</label>
                    <textarea name="description" id="body"> <?php echo $description; ?> </textarea>
                </div>

                <div>
                    <button type="submit" name="save-topic" class="btn btn-big">Save Topic</button>
                </div>
            </form>

        </div>

      </div>
      <!--End of Admin Content-->

    </div>
    <!--End of AdminPage Wrapper-->

   

    <!-- JQUERY CDN-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- CKEditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>

    <!-- Custom Script-->
    <script src="../../assets/js/scripts.js"></script>

</body>

</html>