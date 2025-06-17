<nav id="f_navbar">
  <ul id="f_nav_ul">
    <li id="about_us"><a class="f_nav_li f_links" href="about_us.php" style="color:var(--color);"><strong>About Us</strong></a><br>This Portal is dedicated to display<br> Information on Blood Donation Services.<br>It provides many features for Donors as well as Patients.<br>
      <p>
        <strong> Blood Bank Address </strong>: 301 Sadashiv Peth,<br>Opposite to Gururaj Apartment,Pune:411040.<br>
        <strong> Phone </strong>: +91 7667697600<br>
        <strong> Email </strong>: info@sarthi.co.in
      </p>
    </li>
    <li class="f_nav_li"> <strong>Request Blood</strong>
      <ul class="f_nav_sub_ul">
        <li><a class="f_links f_nav_sub_li" href="blood_availability.php">Blood Availability</a></li>
        <li><a class="f_links f_nav_sub_li" href="donor_list.php">Donor List</a></li>
        <li><a class="f_links f_nav_sub_li" href="index.php#comp_info">Blood Compatibility</a></li>
      </ul>
    </li>
    <li class="f_nav_li"><strong>Donate Blood</strong>
      <ul class="f_nav_sub_ul">
        <li><a class="f_links f_nav_sub_li" href="donor_registration.php">New Donor</a></li>
        <li><a class="f_links f_nav_sub_li" href="donor_login.php">Donor Login</a></li>
        <li><a class="f_links f_nav_sub_li" href="blood_donation_camps.php">Blood Donation Camps</a></li>
        <li><a class="f_links f_nav_sub_li" href="blood_donation_camp_registration.php">Register Camps</a></li>
      </ul>
    </li>
    <li><a class="f_nav_li f_links" href="admin_login.php" style="color:var(--color);"><strong>Admin Login</strong><a></li>
  </ul>
</nav>
<br>
<section id="social_links">
  <a href="https://twitter.com" target="_blank"><img src="assets/images/twitter_logo_org.png" alt="Twitter" class="logos"></a>&nbsp;
  <a href="https://facebook.com" target="_blank"><img src="assets/images/facebook_logo_org.jpeg" alt="Facebook" class="logos"></a>&nbsp;
  <a href="https://www.instagram.com" target="_blank"><img src="assets/images/insta_logo_org.png" alt="Instagram" class="logos"></a>
  <a href="https://www.linkedin.com" target="_blank"><img src="assets/images/linkedin_logo_org.png" alt="Linkedin" class="logos"></a>
</section>
    <div id="scroll_up"><img src="assets/images/up_arrow.png" alt="Scroll Up" class="logout" onclick="scrollup()"></div>
<div id="copy_right">Copyright &copy; 2024. All rights reserved.</div>
<div id="d_and_d"> &reg;Designed And Developed By <strong>Prasanna Sonawane</strong>.
</div>
<script>
  function scrollup(){
    window.scrollTo(0,0);
  }
  document.querySelectorAll('.f_nav_li').forEach(flink => {
    if (flink.href == window.location.href) {
      flink.classList.add('f_active');
    }
  });
</script>