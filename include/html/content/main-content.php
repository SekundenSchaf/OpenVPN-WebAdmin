<?php
/**
 * this File is part of OpenVPN-WebAdmin - (c) 2020 OpenVPN-WebAdmin
 *
 * NOTICE OF LICENSE
 *
 * GNU AFFERO GENERAL PUBLIC LICENSE V3
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://www.gnu.org/licenses/agpl-3.0.en.html
 *
 * @fork Original Idea and parts in this script from: https://github.com/Chocobozzz/OpenVPN-Admin
 * 
 * @author    Wutze
 * @copyright 2020 OpenVPN-WebAdmin
 * @link			https://github.com/Wutze/OpenVPN-WebAdmin
 * @see				Internal Documentation ~/doc/
 * @version		1.0.0
 * @todo			new issues report here please https://github.com/Wutze/OpenVPN-WebAdmin/issues
 */

(stripos($_SERVER['PHP_SELF'], basename(__FILE__)) === false) or die('access denied?');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <?php
          @include(REAL_BASE_DIR."/include/html/modules/main-overview.php");
        ?>
        <div class="tab-content" id="v-pills-tabContent col-sm-12 block-grid">
          <div class="tab-pane fade position-relative p-3 bg-white" id="log" role="tabpanel" aria-labelledby="log-tab">
            <div class="ribbon-wrapper ribbon-lg">
              <div class="ribbon bg-primary">
                Log
              </div>
            </div>
            <table class="table-sm"
              id="table"
              data-toggle="table"
              data-side-pagination="server"
              data-pagination="true"
<?php
if(Session::GetVar('isadmin')){
  $userfilter = '';
  $portfilter = '';
  ?>
              data-search="true"
              data-detail-formatter="logdetails"
              data-search-time-out="1000"
              data-filter-control="false"
  <?php

}else{
  $userfilter = '';
  $portfilter = '';
}
?>
              data-url="?op=data&amp;select=log">
              <thead class="thead-dark">
                <tr>
                   <th data-field="log_id" >ID</th>
                   <th data-field="user_id" <?php echo $userfilter; ?>>User</th>
                   <th data-field="log_trusted_ip">From IP</th>
                   <th data-field="log_trusted_port" <?php echo $portfilter; ?>>From Port</th>
                   <th data-field="log_remote_ip">Int IP</th>
                   <th data-field="log_remote_port">Int Port</th>
                   <th data-field="log_start_time">Start Time</th>
                   <th data-field="log_end_time">End Time</th>
                   <th data-field="log_received">rec</th>
                   <th data-field="log_send">sent</th>
                </tr>
              </thead>
            </table>
          </div>
<?php
if(Session::GetVar('isadmin')){
?>
          <div class="tab-pane fade position-relative p-3 bg-white <?php echo ((@$_REQUEST['code']=='1')? "active show" : ""); ?>" id="user" role="tabpanel" aria-labelledby="user-tab">
            <div class="ribbon-wrapper ribbon-lg">
              <div class="ribbon bg-success">
                User
              </div>
            </div>
            <table class="table-sm"
              id="table"
              data-toggle="table"
              data-side-pagination="server"
              data-pagination="true"
              data-search="true"
              data-detail-view="true"
              data-detail-formatter="userdetails"
              data-search-time-out="1000"
              data-filter-control="false"
              data-url="?op=data&amp;select=user">
              <thead class="thead-dark">
                <tr>
                  <th data-field="uname" >Name</th>
                  <th data-field="gname">Gruppe</th>
                  <th data-field="user_enable">Enable</th>
                  <th data-field="user_start_date">von</th>
                  <th data-field="user_end_date">bis</th>
                  <th data-field="user_online">Online</th>
                </tr>
              </thead>
            </table>
<?php
if(Session::GetVar('isadmin')){
  include(REAL_BASE_DIR."/include/html/modules/admin-adduser.php");
}
?>
          </div>
          <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab">
<?php
if (file_exists(REAL_BASE_DIR."/include/html/modules/admin.overview.php")){
  include(REAL_BASE_DIR."/include/html/modules/admin.overview.php");
}else{
  include(REAL_BASE_DIR."/include/html/modules/admin-mainsite.php");
}
?>
          </div>
          <div class="tab-pane fade position-relative p-3 bg-white" id="ssl" role="tabpanel" aria-labelledby="ssl-tab">
            <div class="ribbon-wrapper ribbon-lg">
              <div class="ribbon bg-success">
                <?php echo Get_Lang::nachricht('_SSL_CERTS_NEW'); ?>
              </div>
            </div>
            <?php echo Get_Lang::nachricht('_SSL_CERTS_NEW'); ?>
          </div>
          
          <div class="tab-pane fade position-relative p-3 bg-white" id="ssl2" role="tabpanel" aria-labelledby="ssl2-tab">
            <div class="ribbon-wrapper ribbon-lg">
              <div class="ribbon bg-success">
              <?php echo Get_Lang::nachricht('_SSL_CERTS_EDIT'); ?>
              </div>
            </div>
            <?php echo Get_Lang::nachricht('_SSL_CERTS_EDIT'); ?>
          </div>
          
          <div class="tab-pane fade position-relative p-3 bg-white" id="ssl3" role="tabpanel" aria-labelledby="ssl3-tab">
            <div class="ribbon-wrapper ribbon-lg">
              <div class="ribbon bg-success">
                <?php echo Get_Lang::nachricht('_SSL_CERTS_LIST'); ?>
              </div>
            </div>
            <?php echo Get_Lang::nachricht('_SSL_CERTS_LIST'); ?>
          </div>
<?php
};
?>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


