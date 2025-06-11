<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Circular Progress Bar | CodingNepal</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js"></script>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
/* *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
} */

/* body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  padding: 20px;
  background: -webkit-linear-gradient(left, #a445b2, #fa4299);
} */

.wrapper{
  width: 950px;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  padding-top: 20px;
}

.wrapper .card{
  background: #fff;
  width: calc(25% - 20px);
  height: 300px;
  border-radius: 5px;
  display: flex;
  align-items: center;
  justify-content: space-evenly;
  flex-direction: column;
  box-shadow: 0px 10px 15px rgba(0,0,0,0.1);
}
.wrapper .card .circle{
  position: relative;
  height: 150px;
  width: 150px;
  border-radius: 50%;
  cursor: default;
}
.card .circle .box,
.card .circle .box span{
  position: absolute;
  top: 50%;
  left: 50%;
}
.card .circle .box{
  height: 100%;
  width: 100%;
  background: #fff;
  border-radius: 50%;
  transform: translate(-50%, -50%) scale(0.8);
  transition: all 0.2s;
}
.card .circle:hover .box{
  transform: translate(-50%, -50%) scale(0.91);
}
.card .circle .box span,
.wrapper .card .text{
  background: -webkit-linear-gradient(left, #6f86d6, #48c6ef);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
.circle .box span{
  font-size: 38px;
  font-family: sans-serif;
  font-weight: 600;
  transform: translate(-45%, -45%);
  transition: all 0.1s;
}
.card .circle:hover .box span{
  transform: translate(-45%, -45%) scale(1.09);
}
.card .text{
  font-size: 20px;
  font-weight: 600;
}
@media(max-width: 753px){
  .wrapper{
    max-width: 700px;
  }
  .wrapper .card{
    width: calc(50% - 20px);
    margin-bottom: 20px;
  }
}
@media(max-width: 505px){
  .wrapper{
    max-width: 500px;
  }
  .wrapper .card{
    width: 100%;
  }
}

</style>
</head>

  <body>
    <div class="wrapper">
      <div class="card">
        <div class="circle">
          <div class="bar"></div>
          <div class="box"><span></span></div>
        </div>
        <div class="text">課程難度</div>
      </div>
      
      <div class="card a">
        <div class="circle">
          <div class="bar"></div>
          <div class="box"><span></span></div>
        </div>
        <div class="text">作業/考試難度</div>
      </div>

      <div class="card b">
        <div class="circle">
          <div class="bar"></div>
          <div class="box"><span></span></div>
        </div>
        <div class="text">私心推薦</div>
      </div>

      <div class="card c">
        <div class="circle">
          <div class="bar"></div>
          <div class="box"><span></span></div>
        </div>
        <div class="text">給分甜度</div>
      </div>
    </div>


    <?php
      // $a = ($user_id+3.75)/10;
      // $b = ($user_id+4.65)/10;
      // $c = ($user_id+5.55)/10;
      // $d = ($user_id+6.45)/10;

      // 取得資料庫目前的分數
      $get_course_info = $conn->execute_query("SELECT * FROM course WHERE course_id = ?", [$course_id]);
      $row = $get_course_info->fetch_assoc();

      if($row['number_of_people'] == 0)
      {
        $a = ($row['star_1']);
        $b = ($row['star_2']);
        $c = ($row['star_3']);
        $d = ($row['star_4']);
      }
      else{
        $a = ($row['star_1']/$row['number_of_people'])/10;
        $b = ($row['star_2']/$row['number_of_people'])/10;
        $c = ($row['star_3']/$row['number_of_people'])/10;
        $d = ($row['star_4']/$row['number_of_people'])/10;
      }
    
    ?>

    <script>
      let options = {
        startAngle: -1.55,
        size: 150,       
        value: <?php echo $a;?>, // 依照給的值去決定條碼進度
        fill: {gradient: ['#6f86d6', '#48c6ef']}

      }
      $(".circle .bar").circleProgress(options).on('circle-animation-progress',
      function(event, progress, stepValue){
        // $(this).parent().find("span").text(String(stepValue.toFixed(1)) + "/10");
        $(this).parent().find("span").text(String((stepValue*10).toFixed(1)) + "/10"); //這裡只是要顯示出來而已。

      });

      $(".a .bar").circleProgress({
        value: <?php echo $b;?>
      });
      
      $(".b .bar").circleProgress({
        value: <?php echo $c;?>
      });

      $(".c .bar").circleProgress({
        value: <?php echo $d;?>
      });
    </script>

  </body>
</html>
