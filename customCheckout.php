<?php
/* 
Template Name: Checkout 
*/  

$_email = $_SESSION['apo_log_mail'];
global $seconddb;


get_header();

if(!isset($_SESSION['apo_log_tkn'])){

    header("Location: /login/?action=must_login");

}


if(isset($_GET['remove-item']) & !empty($_GET['remove-item']) ){
    foreach($_SESSION['ec_apo_cart'] as $k => $v) {
        if($v['id'] == $_GET['remove-item'])
          unset($_SESSION['ec_apo_cart'][$k]);

          header("Location: /checkout");
      }
}

if(isset($_GET['edit-item-update']) & !empty($_GET['edit-item-update']) ){
    foreach($_SESSION['ec_apo_cart'] as $k => $v) {
        if($v['id'] == $_GET['edit-item-update']){
            $_SESSION['ec_apo_cart'][$k]['method'] = $_GET['method_update'];
            $_SESSION['ec_apo_cart'][$k]['day1'] = $_GET['hope1_update'];
            $_SESSION['ec_apo_cart'][$k]['day2'] = $_GET['hope2_update'];
            $_SESSION['ec_apo_cart'][$k]['day3'] = $_GET['hope3_update'];
            $_SESSION['ec_apo_cart'][$k]['day1_time'] = $_GET['hope1_time_update'];
            $_SESSION['ec_apo_cart'][$k]['day2_time'] = $_GET['hope2_time_update'];
            $_SESSION['ec_apo_cart'][$k]['day3_time'] = $_GET['hope3_time_update'];
        }
    }
}

?>
<style>
input {
  border: 0;
  color: inherit;
  font: inherit;
}

input[type="radio"] {
  accent-color: #fc8080;
  accent-color: var(--color-primary);
}

.form__radios {
  display: grid;
  grid-gap: 1em;
  gap: 1em;
}

.form__radio {
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  background-color: #fefdfe;
  border-radius: 1em;
  -webkit-box-shadow: 0 0 1em rgba(0, 0, 0, 0.0625);
  box-shadow: 0 0 1em rgba(0, 0, 0, 0.0625);
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  padding: 1em;
}

.form__radioo {
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  background-color: #fefdfe;
  border-radius: 1em;
  display: -webkit-box;
  display: -ms-flexbox;
  display: block;
  padding: 1em;
}

.form__radio label {
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-flex: 1;
  -ms-flex: 1;
  flex: 1;
  grid-gap: 1em;
  gap: 1em;
}

.icon {
  height: 1em;
  display: inline-block;
  fill: currentColor;
  width: 1em;
  vertical-align: middle;
}
</style>
<div class="container">
  <div class="row">

    <div class="col-sm-12 col-md-7 col-lg-7">

      <h2 style="padding: 30px 0 30px 0;
    font-size: 19px;">Please check the details of your request</h2>


      <?php
if(isset($_GET['edit-item']) & !empty($_GET['edit-item']) ){
    foreach($_SESSION['ec_apo_cart'] as $k => $v) {
        if($v['id'] == $_GET['edit-item']){
            ?>
      <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
          <div class="col-md-6" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
            <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
              <form id="cart_edit_update" method="get"
                action="/checkout/?edit-item-update=<?php echo $_GET['edit-item']; ?>">
                <h4 class="control-label">希方法望商談</h4>
                <p>
                  <select class="form-control form-control-inline" name="method_update" id="_update">
                    <option value="オンライン商談"
                      <?php if($_SESSION['ec_apo_cart'][$k]['method'] == 'オンライン商談') echo "selected" ?>>
                      オンライン商談</option>
                    <option value="対面商談" <?php if($_SESSION['ec_apo_cart'][$k]['method'] == '対面商談') echo "selected" ?>>
                      対面商談</option>
                  </select>
                </p>
                <br>
                <h4 class="control-label">希望商談日第1希望</h4>
                <p>
                  <input type="text" class="form-control mb-2" id="inlineFormInput" name="hope1_update"
                    placeholder="yyyy/mm/dd" value="<?php echo $_SESSION['ec_apo_cart'][$k]['day1'] ?>">
                  <input type="text" class="form-control mb-2" id="inlineFormInput" name="hope1_time_update"
                    placeholder="00:00" value="<?php echo $_SESSION['ec_apo_cart'][$k]['day1_time'] ?>">
                </p>
                <br>
                <h4 class="control-label">第2希望</h4>
                <p>
                  <input type="text" class="form-control mb-2" id="inlineFormInput" name="hope2_update"
                    placeholder="yyyy/mm/dd" value="<?php echo $_SESSION['ec_apo_cart'][$k]['day2'] ?>">
                  <input type="text" class="form-control mb-2" id="inlineFormInput" name="hope2_time_update"
                    placeholder="00:00" value="<?php echo $_SESSION['ec_apo_cart'][$k]['day1_time'] ?>">
                </p>
                <br>
                <h4 class="control-label">第3希望</h4>
                <p>
                  <input type="text" class="form-control mb-2" id="inlineFormInput" name="hope3_update"
                    placeholder="yyyy/mm/dd" value="<?php echo $_SESSION['ec_apo_cart'][$k]['day3'] ?>">
                  <input type="text" class="form-control mb-2" id="inlineFormInput" name="hope3_time_update"
                    placeholder="00:00" value="<?php echo $_SESSION['ec_apo_cart'][$k]['day1_time'] ?>">
                </p>
                <input type="hidden" name="edit-item-update" value="<?php echo $_GET['edit-item']; ?>">
                <button class="btn btn-danger btn-sm" type="submit" type="submit">更新</button>

              </form>
            </div>
          </div>
        </div>
      </div>
      <?php }
    }
}
?>

      <?php
    if(isset($_SESSION['ec_apo_cart']) && !empty($_SESSION['ec_apo_cart'])){
        foreach($_SESSION['ec_apo_cart'] as $key => $val){ ?>
      <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
          <div class="col" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
            <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
              <div class=""><strong class="font-weight-bold"><?php echo $val['company'] ?></strong>
                <div class="" style="padding-top: 10px">
                  <div class="size mr-1"><span class="text-grey">住所:</span><span
                      class="font-weight-bold">&nbsp;<?php echo $val['address'] ?></span></div><br>
                  <div class="color"><span class="text-grey">商談相手:</span><span
                      class="font-weight-bold">&nbsp;<?php echo $val['negotiation_partner'] ?></span></div>
                  <hr>
                  <div class="color"><span class="text-grey">商談方法:</span><span
                      class="font-weight-bold">&nbsp;<?php echo $val['method'] ?></span></div>
                  <hr>
                  <div class="color"><span class="text-grey">希望商談日:</span><span
                      class="font-weight-bold">&nbsp;<?php echo $val['day1'] . " : " . $val['day1_time'] . " , " . $val['day2'] . " : " . $val['day2_time']  . " , " . $val['day3'] . " : " . $val['day3_time'] ;?></span>
                  </div>
                </div>
              </div>
              <div>
                <h5 class="text-grey"><?php echo $val['amount'] ?></h5>
              </div>
              <div class="d-flex align-items-center">
                <a href="/checkout/?remove-item=<?php echo $val['id']; ?>"><i
                    class="fa fa-trash mb-1 text-danger"></i></a>
              </div>
              <div class="d-flex align-items-center">
                <a href="/checkout/?edit-item=<?php echo $val['id']; ?>">編集</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php }
    }else{ ?>
      <div class="alert alert-warning" style="margin: 30px" role="alert">
        Your cart is empty!
      </div>
      <?php }
 ?>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4" style="padding-top: 70px;">

      <div>
        <li style="line-height: 18px;
    padding: 20px;">下記ボタンを押しても、先方から商談依頼の成立の返事がくるまでは課金されません。</li>

        <li style="line-height: 18px;
    padding: 20px;">商談相手が、依頼を受諾し、日程が確定した段階でご登録のクレジットカードより課金となります。</li>


      </div>

      <div class="form__radio">
        <label for="paypal">
          <img src="https://ec-apo.com/paypal.png" height="30" alt="paypal">
        </label>
        <input id="paypal" name="payment-method" type="radio" checked />
      </div><br>
      <div class="form__radioo" style="display: block !important">
        <?php
            $total = 0;
            if(isset($_SESSION['ec_apo_cart'])){
                foreach($_SESSION['ec_apo_cart'] as $key => $val){
                    $each_amount = str_replace(',', '', $val['amount']);
                     $total+=$each_amount ;
                     ?>
        <li><?php echo $val['company'] ?> - <?php echo $val['amount'] ?></li>
        <hr>

        <?php }
            }
        ?>
        <div class="row" style="padding: 10px;
                background-color: aliceblue;">
          <div class="col-6">合計</div>
          <div class="col-6" style="text-align: end"><strong><?php echo $total; ?></strong></div>
        </div>

        <div class="row" style="padding: 30px">
          <?php
                    if(isset($_SESSION['ec_apo_cart']) && !empty($_SESSION['ec_apo_cart'])){ ?>
          <button type="button" class="btn btn-primary btn-sm btn-block">商談を依頼する</button>
          <?php }else{ ?>
          <button type="button" class="btn btn-primary btn-sm btn-block" disabled>商談を依頼する</button>
          <?php  }
                 ?>
        </div>

      </div>
    </div>
  </div>
</div>