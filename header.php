<h1>
  <img src="assets/images\back.jpeg" alt="Back Button" id="backbtn" class="logos" onclick="history.back()">
  <a class="links" id="main_heading_link" href="index.php">Sarthi Blood Bank </a>
</h1>
<nav id="navbar">
  <ul id="nav_ul">
    <li class="nav_li li">
      <a class="links nav_li_links" href="about_us.php">About Us</a>
    </li>
    <li class="nav_li li"> Request Blood
      <ul class="nav_sub_ul">
        <li class="nav_sub_li li">
          <a class="links  nav_sub_li_links" href="blood_inventory.php">Blood Inventory</a>
        </li>
        <li class="nav_sub_li li">
          <a class="links nav_sub_li_links" href="donor_list.php">Donor List</a>
        </li>
        <li class="nav_sub_li li">
          <a class="links nav_sub_li_links" href="index.php#comp_info">Blood Compatibility</a>
        </li>
      </ul>
    </li>
    <li class="nav_li li">Donate Blood
      <ul class="nav_sub_ul">
        <li class="nav_sub_li li">
          <a class="links nav_sub_li_links" href="donor_registration.php">New Donor</a>
      </li>
        <li class="nav_sub_li li">
          <a class="links nav_sub_li_links" href="donor_login.php">Donor Login </a>
        </li>
        <li class="nav_sub_li li">
          <a class="links nav_sub_li_links" href="blood_donation_camps.php">Blood Donation Camps</a>
        </li>
        <li class="nav_sub_li li">
          <a class="links nav_sub_li_links" href="blood_donation_camp_registration.php">Register Camps</a>
        </li>
      </ul>
    </li>
    <li class="nav_li li">
      <a class="links nav_li_links" href="admin_login.php">Admin Login<a>
    </li>
  </ul>
  <div class="toggle_btn "><img src="assets/images/toggle_btn.png" alt="Toggle Button"  class="logos"></div>
</nav>
<script>
  document.querySelectorAll('.nav_li_links').forEach(link => {
      if(link.href==window.location.href){
        link.classList.add('active');
      }
    });
</script>

