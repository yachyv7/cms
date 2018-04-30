<?php session_start(); ?>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS Front</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php
                        $query = "SELECT * FROM categories";
                        $select_all_categories_query = mysqli_query($connection, $query);
                        
                        while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                            $cat_title = $row['cat_title'];
                            $cat_id = $row['cat_id'];
                            $category_class = '';
                            $pageName = basename($_SERVER['PHP_SELF']);
                            if (isset($_GET['category']) && $_GET['category'] == $cat_id) {
                                $category_class = 'active';
                            }
                            echo "<li class='$category_class'><a href='#'>{$cat_title}</a></li>";
                        }
                    ?>
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                    <?php
                        $registration_class = '';
                        $contact_class = '';
                        if ($pageName == "registration.php") {
                            $registration_class = 'active';
                        }
                        if ($pageName == "contact.php") {
                            $contact_class = 'active';
                        }
                    ?>
                    <li class='<?php echo $registration_class; ?>'>
                        <a href="registration.php">Registration</a>
                    </li>
                    <li class='<?php echo $contact_class; ?>'>
                        <a href="contact.php">Contact</a>
                    </li>
                    <?php
                        if (isset($_SESSION['user_role'])) {
                            if (isset($_GET['p_id'])) {
                                $post_id = $_GET['p_id'];
                                echo "<li><a href='admin/posts.php?source=edit_post&p_id={$post_id}'>Edit Post</a></li>";
                            }
                        }
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>