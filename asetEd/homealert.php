
<!-- Notifications: style can be found in dropdown.less -->
<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bell-o"></i>
        <span class="label label-warning"><?php echo $countp; ?></span>
    </a>
            <ul class="dropdown-menu">
              <li class="header">You have notifications </li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Have <?php echo $countp; ?> pending approval leave
                    </a>
                  </li>
                </ul>
              </li>
              
            </ul>
</li>
          