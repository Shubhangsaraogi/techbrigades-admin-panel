<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- <link rel="stylesheet" href="ansronewebsite/profilecss.css"> -->
    <!-- <link rel="stylesheet" href="ansronewebsite/style.css"> -->
    <link href="ansronewebsite/profilecss.css?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="ansronewebsite/style.css?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&family=Lato:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <?php include("newnavbar.php");?>

    <div class="pdiv1">
        <div class="pdiv2">Personal Profile</div>
        
<?php
// session_start();
$email=$_SESSION["Eemail"];

$showquery = "SELECT * FROM employee where email='$email'";

                    $result = mysqli_query($conn, $showquery);

                    if (mysqli_num_rows($result) > 0) {

                        // output data of each row 

                        while ($row = mysqli_fetch_assoc($result)) {

                            ?>

<?php if(empty($row["img"]))

{
    echo "No Image uploaded";
}

else{?>


        <div class="pdiv3"><img src="<?php echo $row["img"];?>" alt=""></div>
        <?php }?>

        <div class="pdiv4"><?php echo $row["designation"];?></div>
        <div class="pdiv5 name">Name:</div>
        <div class="pdiv6 nd"><?php echo $row["fname"];?> <?php echo $row["lname"];?></div>
        
        <div class="pdiv5 lob">Mailing Address:</div>
        <div class="pdiv6 ld"><?php echo $row["mailing_address"];?></div>
        <div class="pdiv5 loc">Office address:</div>
        <div class="pdiv6 lcd"><?php echo $row["office_address"];?></div>
        <div class="pdiv5 dept">Team Name:</div>
        <div class="pdiv6 dd">
        <?php

            if(isset($row["team_name"])&&!empty($row["team_name"]))

            {

                echo $row["team_name"]; 

            }



            if(isset($row["team_name1"])&&!empty($row["team_name1"]))

            {

                echo ", ".$row["team_name1"]; 

            }

            if(isset($row["team_name2"])&&!empty($row["team_name2"]))

            {

                echo ", ".$row["team_name2"];

            }

            ?>
        </div>
        <div class="pdiv5 bid">Reporting manager:</div>
        <div class="pdiv6 bd"><?php echo $row["manager"];?></div>
        <div class="pdiv5 mob">Mobile no.:</div>
        <div class="pdiv6 mod"><?php echo $row["mobile"];?></div>
        <div class="pdiv5 email">Email:</div>
        <div class="pdiv6 emd"><?php echo $row["email"];?></div>

        
        <div class="pdiv7"><button><a href="organizationchart.php" class="astyle">Organization Chart</a></button></div>
        <div class="pdiv8"><button><a href="managerchart.php" class="astyle">Manager Heirarchy</a></button></div>
        <div class="pdiv9">
            <div class="pdiv91">WORK EXPERIENCE</div>
            <div class="pdiv92 swbox">
                <div class="pdiv93"><img src="ansronewebsite/Vectorswiggy.png" alt=""></div>
            </div>
            <div class="pdiv94 swhead">Project Design Lead</div>
            <div class="pdiv95 swdesc">Swiggy <br>Dec 2021-April 2022 | 6 months</div>

            <div class="pdiv92 mybox">
                <div class="pdiv96"><img src="ansronewebsite/download__1_-removebg-preview 1.png" alt=""></div>
            </div>
            <div class="pdiv94 myhead">Project Designer</div>
            <div class="pdiv95 mydesc">Myntra <br>Jan 2021-Dec 2022 | 12 months</div>

            <div class="pdiv92 bfbox">
                <div class="pdiv97"><img src="ansronewebsite/download__2_-removebg-preview 1.png" alt=""></div>
            </div>
            <div class="pdiv94 bfhead">UX Designer</div>
            <div class="pdiv95 bfdesc">Bajaj Finserv<br> March 2020-Nov 2021 | 1 yr 5 months</div>

        </div>
        <div class="pdiv10">
            <div class="pdiv101">CAPABILITIES</div>
            <div class="pdiv94 comm">Communication</div>
            <div class="pdiv94 manage">Management</div>
            <div class="pdiv94 fig">Figma</div>
            <div class="pdiv94 ur">User Research</div>
            <div class="pdiv94 ue">User Experience</div>

        </div>
        <div class="pdiv11">
            <div class="pdiv101">EDUCATION</div>
            <div class="pdiv92 vibox">
                <div class="vimg"><img src="ansronewebsite/image9.png" alt=""></div>
                <div class="pdiv94 vihead">Vellore Institute of Technology</div>
            <div class="pdiv95 videsc">B.Tech.(Computer Science)
                2016-2020</div>
            </div>
            <div class="pdiv92 kvbox">
                <div class="kvimg"><img src="ansronewebsite/image10.png" alt=""></div>
            </div>
            <div class="pdiv94 kvhead">Kendriya Vidyalaya</div>
            <div class="pdiv95 kvdesc">12th CBSE Jan 2021-Dec 2021 | 12 months</div>
        </div>
        <div class="pdiv12">
            <div class="pdiv101 techdiv">TECHBRIGADES DETAILS</div>
            <div class="pdiv5 jdiv">Hiring Date:</div>
            <div class="pdiv6 jd"><?php echo $row["hiring_date"];?></div>
            <div class="pdiv5 rdiv">Recognization:</div>
            <div class="pdiv6 rd"><?php echo $row["designation"];?></div>
        </div>

        <?php }

               }?>
        <div class="pdiv13">OTHER LINKS</div>
        <div class="pdiv14"><button>Benefits</button></div>
        <div class="pdiv15"><button>HR Policies</button></div>
        <div class="pdiv16"><button>Check Out</button></div>
    </div>
    <div class="footerpf">
        <div class="cr">Copyright © 2022<br> TechBrigades</div>
        <div class="connect">connect with us</div>
        <div class="fb"><img src="ansronewebsite/facebook2.png" alt=""></div>
        <div class="li"><img src="ansronewebsite/linkedin1.png" alt=""></div>
        <div class="tw"><img src="ansronewebsite/twitter1.png" alt=""></div>
        <div class="yt"><img src="ansronewebsite/youtube1.png" alt=""></div>
        <div class="policy">Privacy Policy | Terms & conditions</div>

    </div>
</body>
</html>