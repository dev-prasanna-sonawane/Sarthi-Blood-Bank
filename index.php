<?php include_once 'db_connection.php'; ?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sarthi Blood Bank</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/tables.css">
    <link rel="stylesheet" type="text/css" href="css/forms.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
  </head>

  <body>
    <header style="top:0;
    position: sticky;">
      <?php include_once 'header.php'; ?>
    </header>
    <main>
      <section id="image_quotes" >
        <div id="index_background_img"></div>
        <h2 id="h2_image_quotes">It take Only 20 Minutes <br>Donate Blood Save Lives!</h2>
        <a id="link_image_quotes"href="donor_registration.php" class="buttons links" style="border:var(--border);">Donate Now </a>
      </section>
      <h2 class="sub_headings">LEARN ABOUT BLOOD DONATION</h2>
      <section id="blood_donation_info" class="info">
  
    <strong>A blood donation occurs when a person voluntarily has blood drawn and used for transfusions and/or made into biopharmaceutical medications by a process called fractionation (separation of whole blood into its components (Plasma, Red blood cells, White blood cells, Platelets))</strong>.<br>1. Blood donation is a safe and simple four-step process: <strong>Registration, Medical history checking, Donation and Refreshments.</strong>&nbsp;&nbsp;<a href="about_blood_donation_process.php">Learn More about Donation Process</a><br>2. The actual blood donation takes less than <strong>10-12 minutes</strong><br>3. Blood donation has benefits for the donor's health, such as <strong>reducing the risk of heart attack, balancing the iron levels in the blood, and improving the blood flow.</strong>&nbsp;&nbsp;<a href="about_blood_donantion.php">Learn More about Blood Donation</a>
      </section>
      <div class="line_break" ></div>
      <section id="key_features_container">
        <div id="key_features_sub_container">
          <a href="donor_login.php" class="links features" id="feature1">
            <h5 class="key_features ">Donor Login</h5>
          </a>
          <a href="blood_donation_camps.php" class="links features" id="feature2">
            <h5 class="key_features">Upcoming Blood Donation Camps</h5>
          </a>
          <a href="donor_list.php" class="links features" id="feature3">
            <h5 class="key_features">Donor List</h5>
          </a>
          <a href="blood_availability.php" class="links features" id="feature4">
            <h5 class="key_features">Blood Availability</h5>
          </a>
        </div>
      </section>
      <h2 class="sub_headings">LEARN ABOUT BLOOD</h2>
      <section id="comp_info">
        <div id="blood_info" class="info">
          A blood compatibility table provides information about which blood types are compatible with each other for safe
          blood transfusions and organ transplants.<br>
          There are four main blood types:<strong> A, B, AB, O</strong><br>
          "<strong>Antigens</strong> on the surface of red blood cells determine compatibility." <br>Here’s how it works:<br>
          If you have type A blood, you can receive either type A or type O blood.<br>
          If you have type B blood, you can receive either type B or type O blood.<br>
          If you have type AB blood, you can receive all blood types.<br>
          If you have type O blood, you can only receive type O blood.<br>
          "Universal donors are individuals with <strong>O-negative blood</strong>." They can donate to anyone in an emergency when there
          isn’t time to check the patient’s blood type.<br> "O-negative blood is crucial for saving lives during critical
          situations."<br>
          "<strong>Remember, knowing your blood type can make a difference in emergencies. Consider checking your blood type and
          potentially becoming a lifesaving donor!</strong> "
        </div>
        <video src="assets/images/blood_compatibility .mp4" id="com_info"autoplay muted loop></video>
      </section><br>
      <a href="donor_registration.php" class="buttons links" style="border:var(--border);">Donate Now </a><br>
      <br>
    
      <div class="line_break" ></div>
      <section id="quotes_scroll" class="info main_scroll_div ">
        <div>
          <button class="scroll" onclick="scrolll()"><</button>
        </div>
        <div class="cover">
          <div class="scroll_quotes">
            <div class="scroll_items" id="first">Donation of Blood is Harmless and Safe</div>
            <div class="scroll_items">Every Drop Count,Donate Blood Today</div>
            <div class="scroll_items">Blood Replenish in 3 days and Save Lifes Too</div>
            <div class="scroll_items">Give Blood Stay Healthy</div>
            <div class="scroll_items">Every Donor is a Hero</div>
            <div class="scroll_items">It take Only 20 Minutes Donate Blood Save Lives!</div>
            <div class="scroll_items" id="last">It costs Nothing Donate Blood And Stay Healthy</div>
          </div>
        </div>
        <div>
          <button class="scroll" onclick="scrollr()">></button>
        </div>
      </section>
    </main>
    <footer id="footer">
      <?php include_once 'footer.php'; ?>
    </footer>
    <script>

      if(document.getElementById('first')){
        setInterval(scrolll,4000);
      }
      function scrolll() {
        var left = document.querySelector(".scroll_quotes");
        left.scrollBy(1100,0);
      }
      function scrollr() {
        var right = document.querySelector(".scroll_quotes");
        right.scrollBy(-8190, 0);
      }
    </script>
  </body>
</html>