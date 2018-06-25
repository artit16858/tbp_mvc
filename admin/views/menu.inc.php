<div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">TBP GROUP</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw">
                            <?php if (count($notifications_new) > 0) {?>
                            <span class="alert">
                                <?php echo count($notifications_new); ?>
                            </span>
                            <?php }?>
                        </i>
                        <i class="fa fa-caret-down"></i>

                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                    <?php
for ($i = 0; $i < count($notifications); $i++) {?>
                        <li <?php if ($notifications[$i]['notification_seen_date'] == "") {?>class="notify-active"<?php } else {?> class="notify" <?php }?> >
                            <a href="<?php echo $notifications[$i]['notification_url']; ?>&notification=<?php echo $notifications[$i]['notification_id']; ?>" >
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> <?php echo $notifications[$i]['notification_detail']; ?>
                                    <span class="pull-right text-muted small"><?php echo $notifications[$i]['notification_date']; ?></span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                    <?php
if ($i == 10) {break;}
}

?>
                        <li>
                            <a class="text-center" href="index.php?app=notification">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->



            <div class="navbar-default sidebar" role="navigation" style="padding-bottom: 35px;">
                <div class="sidebar-nav navbar-collapse" sty>
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <!-- ระบบฝ่ายชื้อ  -->
                        <li>
                            <a class="head-menu">
                                 ระบบฝ่ายจัดซื้อ </span>
                            </a>

                                <li>
                                    <a href="?app=supplier"><i class="fa fa-user" aria-hidden="true"></i> ซับพลายเออร์ (Supplier)</a>
                                </li>

                                <li>
                                    <a href="?app=cost"><i class="fa fa-building-o" aria-hidden="true"></i> ต้นทุน (Cost)</a>
                                </li>

                                <li>
                                    <a href="?app=price"><i class="fa fa-tint" aria-hidden="true"></i> ใบราคาน้ำมัน (Oil Price)</a>
                                </li>
                                <li>
                                    <a href="?app=purchase"><i class="fa fa-truck" aria-hidden="true"></i> การซื้อน้ำมัน (Oil Purchase)</a>
                                </li>
                                <li>
                                    <a href="?app=report-buy"><i class="fa fa-outdent" aria-hidden="true"></i> รายงานฝ่ายจัดซื้อ (Report)</a>
                                </li>
                        </li>
                         <!-- จบระบบฝ่ายซื้อ  -->

                         <!-- ระบบฝ่ายขาย  -->
                         <li>
                            <a  class="head-menu">
                                 ระบบฝ่ายขาย </span>
                            </a>

                                <li>
                                    <a href="?app=customer"><i class="fa fa-user" aria-hidden="true"></i> ลูกค้า (Customer)</a>
                                </li>

                                <li>
                                    <a href="?app=request-order"><i class="fa fa-building-o" aria-hidden="true"></i> ใบขอซื้อน้ำมัน (Request Order)</a>
                                </li>
                                <li>
                                    <a href="?app=delivery-order"><i class="fa fa-tint" aria-hidden="true"></i> ใบส่งสินค้า (Delivery Order)</a>
                                </li>
                                <li>
                                    <a href="?app=report-sell"><i class="fa fa-truck" aria-hidden="true"></i> รายงานฝ่านขาย (Report)</a>
                                </li>

                        </li>
                         <!-- จบระบบฝ่ายขาย  -->

                         <!-- ระบบพื้นฐาน  -->
                        <li >
                            <a class="head-menu">
                                 ระบบพื้นฐาน </span>
                            </a>

                                <li>
                                    <a href="?app=employee"><i class="fa fa-user" aria-hidden="true"></i> พนักงาน (Employee)</a>
                                </li>

                                <li>
                                    <a href="?app=company"><i class="fa fa-building-o" aria-hidden="true"></i> บริษัท (Company)</a>
                                </li>

                                <li>
                                    <a href="?app=oil"><i class="fa fa-tint" aria-hidden="true"></i> ข้อมูลน้ำมัน (Oil)</a>
                                </li>
                                <li>
                                    <a href="?app=car"><i class="fa fa-truck" aria-hidden="true"></i> รถขนส่ง (Car)</a>
                                </li>
                                <li>
                                    <a href="?app=permission"><i class="fa fa-key" aria-hidden="true"></i> สิทธ์การเข้าถึง (Permission)</a>
                                </li>
                                <li>
                                    <a href="?app=purchase"><i class="fa fa-users" aria-hidden="true"></i> จัดซื้อ (Purchase)</a>
                                </li>
                                <li>
                                    <a href="?app=salse"><i class="fa fa-users" aria-hidden="true"></i> ขาย (Salse)</a>
                                </li>
                        </li>
                        <!-- จบระบบพื้นฐาน  -->

                        <!-- /.nav-second-level -->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>