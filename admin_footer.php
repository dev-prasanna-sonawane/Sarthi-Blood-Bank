<nav id="f_navbar">
    <ul id="admin_f_nav_ul">
        <li class="f_nav_li"><a class="f_links f_nav_li" href="admin_manage_blood_donation_camps.php" style="color:var(--color);"><strong>Manage Blood Donation Camps</strong></a>
        </li>
        <li class="f_nav_li"><a class="f_links f_nav_li " href="admin_manage_appointments.php" style="color:var(--color);"><strong>Appointments</strong></a>
        </li>
        <li class="f_nav_li"><strong>Manage Donor</strong>
            <ul class="f_nav_sub_ul">
                <li><a class="f_links f_nav_sub_li" href="admin_add_donor.php">Add Donor</a></li>
                <li><a class="f_links f_nav_sub_li" href="admin_remove_donor.php">Remove Donor</a></li>
            </ul>
        </li>
        <li class="f_nav_li"><a class="f_nav_li f_links" href="logout.php" style="color:var(--color);"><strong>Logout</strong><a></li>
    </ul>
</nav><br>
<div>Copyright &copy; 2024. All rights reserved.</div>
<div> &reg;Designed And Developed By <strong>Prasanna Sonawane</strong> And <strong>Tushar Chavan.</strong> </div>
<script>
     document.querySelectorAll('.f_nav_li').forEach(flink => {
      if(flink.href==window.location.href){
        flink.classList.add('f_active');
      }
    });
</script>