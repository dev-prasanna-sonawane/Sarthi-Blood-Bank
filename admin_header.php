<h1>
    <img src="assets/images/back.jpeg" alt="Back Button" id="backbtn" class="logos" onclick="history.back()">
     <!-- <input type="button" value="Go back!" onclick="history.back()"> -->
  <a class="links" id="main_heading_link" href="admin_dashboard.php">Sarthi Blood Bank </a>
</h1>
<nav id="navbar">
    <ul id="nav_ul">
        <li class="nav_li li">
            <a class="links nav_li_links" href="admin_manage_blood_donation_camps.php" >Manage Blood Donation Camps</a>
        </li>
        <li class="nav_li li">
            <a class="links nav_li_links" href="admin_manage_appointments.php">Appointments</a>
        </li>
        <li class="nav_li li">Manage Donor
            <ul class="nav_sub_ul">
                <li class="li">
                    <a class="links nav_sub_li_links" href="admin_add_donor.php">Add Donor</a>
                </li>
                <li class="li">
                    <a class="links nav_sub_li_links" href="admin_remove_donor.php">Remove Donor</a>
                </li>
            </ul>
        </li>
    &nbsp;
        <li style="margin-top: 1.3vh;">
            <a class="links" href="logout.php" style="color:var(--color);margin-top: 5.7vh;">Logout<a>
        </li>
        </ul>
</nav>

<script>
  document.querySelectorAll('.nav_li_links').forEach(link => {
      if(link.href==window.location.href){
        link.classList.add('active');
      }
    });
</script>