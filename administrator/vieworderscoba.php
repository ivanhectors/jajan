<?php
require_once('headerpage.php');
?>
<?php
require_once('koneksi.php');
?>

<div class="card mb-3">
        <div class="card-header">

          <i class="fa fa-table"></i> Total Transaction This Year </div>
          
        <div class="card-body">

        <form action="/filterbydate.php">
        <select name="day">
              <option value="1">01</option>
              <option value="2">02</option>
              <option value="3">03</option>
              <option value="4">04</option>
              <option value="5">05</option>
              <option value="6">06</option>
              <option value="7">07</option>
              <option value="8">08</option>
              <option value="9">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              </select> /
              <select name="month">
              <option value="1">Januari</option>
              <option value="2">Februari</option>
              <option value="3">Maret</option>
              <option value="4">April</option>
              <option value="5">Mei</option>
              <option value="6">Juni</option>

              </select> 

                <input type="submit" style="padding-top: 0px;border-bottom-width: 0px;border-right-width: 0px;border-left-width: 0px;border-top-width: 1px;">
        </form>
<?php
        if(isset($_GET['uid']))
{
  $uid=mysqli_real_escape_string($_GET['uid']);
}  
?>

<br>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="font-size:10px;text-align:center;vertical-align: middle;">N0</th>
                  <th style="font-size:10px;text-align:center;vertical-align: middle;">Product ID</th>
                  <th style="font-size:10px;text-align:center;vertical-align: middle;">Full Name</th>
                  <th style="font-size:10px;text-align:center;vertical-align: middle;">Address</th>
                  <th style="font-size:10px;text-align:center;vertical-align: middle;">Mobile</th>
                  <th style="font-size:10px;text-align:center;vertical-align: middle;">Date</th>
                </tr>
              </thead>
              <tfoot>
              <?php
                                        
                                        $no= 1;
                                        $sql = $conn->query("select * from orders");
                                        while ($data =$sql->fetch_assoc()) {
                                                                
                                                           
                                    ?>
                <tr>
                  <td style="font-size:12px;text-align:center;vertical-align: middle;"><?php echo $no++; ?></td>
                  <td style="font-size:12px;text-align:center;vertical-align: middle;"><?php echo $data['p_id'] ?></td>
                  <td style="font-size:12px;text-align:center;vertical-align: middle;"><?php echo $data['fullname'] ?></td>
                  <td style="font-size:12px;vertical-align: middle;"><?php echo $data['address'] ?>,<?php echo $data['city'] ?> ,<?php echo $data['city'] ?> ,<?php echo $data['state'] ?> ,<?php echo $data['pincode'] ?>.</td>
                  <td style="font-size:12px;text-align:center;vertical-align: middle;"><?php echo $data['mobile'] ?></td>
                  <td style="font-size:12px;text-align:center;vertical-align: middle;"><?php echo $data['date'] ?></td>
                </tr>
                <?php } ?>
              </tfoot>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated Today at 11:59 AM</div>
      </div>
    </div>

    <?php
require_once('footerpage.php');
?>