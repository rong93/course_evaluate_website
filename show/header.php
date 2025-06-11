 <!-- header section starts -->
<header class="header">

    <section class="flex">
        <a href="home.php" class="logo">Course Evaluation System.</a>
        <!-- <form action="search.php" method="post" class="search-form">
            <input type="text" name="search_box" required placeholder="search courses..." maxlength="100">
            <button type="submit" class="fas fa-search"></button>
        </form> -->

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <div id="user-btn" class="fas fa-user"></div>
            <div id="toggle-btn" class="fas fa-sun"></div>
        </div>

        <div class="profile">
            <?php
                $find_user_infomation = $conn->execute_query("SELECT * FROM `user_information` WHERE user_id = ?",[$user_id]);
                $row = $find_user_infomation->fetch_assoc();
                
                if(mysqli_num_rows($find_user_infomation) > 0){ #------------------------------------------if(有登入的情況下)
            ?>
                    <img src="images/pic-<?php echo $user_id%9+1;?>.jpg" class="image" alt="">
                    <h3 class="name">User ID: <?php echo $user_id;?></h3>
                    <p class="role" style="padding: 10px;"><?php echo $row['name'];?></p>

                    <div class="flex-btn">
                        <a href="login.php" class="option-btn">login</a>
                        <a href="register.php" class="option-btn">register</a>
                    </div>
                    <a href="logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>

            <?php
                }
                else{#------------------------------------------else(沒有登入的情況下)         
            ?>
                    <h3>please login or register</h3>
                    <div class="flex-btn">
                        <a href="login.php" class="option-btn">login</a>
                        <a href="register.php" class="option-btn">register</a>
                    </div>
            <?php        
                }#--------------------------------------------------------- end
            ?>

        </div>

    </section>
</header>
<!-- header section end -->


<!-- 左邊選單 -->
<!-- side bar section starts -->
<div class="side-bar">
    <div id="close-btn">
        <i class="fas fa-times"></i>
    </div>

    <div class="profile">
        <?php
            $find_user_infomation = $conn->execute_query("SELECT * FROM `user_information` WHERE user_id = ?",[$user_id]);
            $row = $find_user_infomation->fetch_assoc();
            
            if(mysqli_num_rows($find_user_infomation) > 0){ #------------------------------------------if(有登入的情況下)
        ?>
                <img src="images/pic-<?php echo $user_id%9+1;?>.jpg" class="image" alt="">
                <h3 class="name"><?php echo $row['name'];?></h3>
                <p class="role">User ID: <?php echo $user_id;?></p>
        <?php
            }else{#------------------------------------------else(沒有登入的情況下)   
        ?>
                <h3>please login or register</h3>
                <div class="flex-btn" style="padding-top: .5rem;">
                    <a href="login.php" class="option-btn">login</a>
                    <a href="register.php" class="option-btn">register</a>
                </div>
        <?php
                 
            }#------------------------------------------------------- end
        ?>

    </div>




    <nav class="navbar">
        <a href="home.php"><i class="fas fa-home"></i><span>home</span></a>
        <a href="cse.php"><i class="fas fa-graduation-cap"></i><span>資工CSE</span></a>
        <a href="in.php"><i class="fas fa-graduation-cap"></i><span>資英IN</span></a>
        <a href="im.php"><i class="fas fa-graduation-cap"></i><span>資管IM</span></a>
        <a href="ic.php"><i class="fas fa-graduation-cap"></i><span>資傳IC</span></a>
        <!-- <a href="majors.php"><i class="fas fa-graduation-cap"></i><span>majors</span></a> -->
        <!-- <a href="teachers.php"><i class="fas fa-chalkboard-user"></i><span>teachers</span></a> -->
        <a href="contact.php"><i class="fas fa-headset"></i><span>contact us</span></a>
    </nav>

</div>
<!-- side bar section ends -->


