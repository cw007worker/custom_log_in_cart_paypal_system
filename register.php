<?php  
/* 
Template Name: Register 
*/  

get_header();   

    function register() {
        $errors = [];
        global $seconddb;

        $email = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '';
        $company_name = isset( $_POST['company_name'] ) ? sanitize_text_field( $_POST['company_name'] ) : '';
        $company_address = isset( $_POST['company_address'] ) ? sanitize_text_field( $_POST['company_address'] ) : '';
        $company_url = isset( $_POST['company_url'] ) ? sanitize_text_field( $_POST['company_url'] ) : '';
        $title_name = isset( $_POST['title_name'] ) ? sanitize_text_field( $_POST['title_name'] ) : '';
        $contact_name = isset( $_POST['contact_name'] ) ? sanitize_text_field( $_POST['contact_name'] ) : '';
        $contact_cell = isset( $_POST['contact_cell'] ) ? sanitize_text_field( $_POST['contact_cell'] ) : '';
        $product_1 = isset( $_POST['product_1'] ) ? sanitize_text_field( $_POST['product_1'] ) : '';
        $product_2 = isset( $_POST['product_2'] ) ? sanitize_text_field( $_POST['product_2'] ) : '';
        $product_3 = isset( $_POST['product_3'] ) ? sanitize_text_field( $_POST['product_3'] ) : '';
        $product_url_1 = isset( $_POST['product_url_1'] ) ? sanitize_text_field( $_POST['product_url_1'] ) : '';
        $product_url_2 = isset( $_POST['product_url_2'] ) ? sanitize_text_field( $_POST['product_url_2'] ) : '';
        $product_url_3 = isset( $_POST['product_url_3'] ) ? sanitize_text_field( $_POST['product_url_3'] ) : '';
        $password = sanitize_text_field( $_POST['psw'] );
        $re_password = sanitize_text_field( $_POST['psw-repeat'] );
        $created_at = date('Y-m-d H:i:s');

        if(empty($email)){
            $errors[] = "メールアドレスを入力してください。";
        }
        if(empty($title_name)){
            $errors[] = "フリガナを入力してください。";
        }
        if(empty($contact_name)){
            $errors[] = "お名前を入力してください。";
        }
        if(empty($password )){
            $errors[] = "パスワードを入力してください。";
        }



        if(count(array($errors)) > 0){ ?>
<ul style="position: absolute;top: 77px;left: 80px;color: red;">
  <?php
            foreach($errors as $error){ ?>
  <li style="padding: 5px"><?php echo $error; ?></li>
  <?php } ?>
</ul>
<?php } 
        
        if(count($errors) == 0){
            $seconddb->insert("vendor", array(
            	"email" => $email,
                "company_name" => $company_name,
                "company_address" => $company_address,
                "company_url" => $company_url,
                "title_name" => $title_name,
                "contact_name" => $contact_name,
                "contact_address" => '',
                "contact_cell" => $contact_cell ,
                "product_1" => $product_1 ,
                "product_2" => $product_2 ,
                "product_3" => $product_3 ,
                "product_url_1" => $product_url_1 ,
                "product_url_2" => $product_url_2 ,
                "product_url_3" => $product_url_3 ,
                "password" => md5($password) ,
                "created_at" => $created_at ,
             ));

             echo "
                <div style='position: absolute;
                top: 100px;
                right: 10px;
                padding: 10px;
                background-color: orange;
                font-size: 14px;
                border-radius: 10px;'>Registraiton Successful!</div>
            ";

            ini_set( 'display_errors', 1 );
                error_reporting( E_ALL );
                $from = "sales-offer@ec-apo.com";
                $to = $email;
                $subject = "[{$contact_name} 様へ] EC Apoへの登録が完了しました。";
                $message = "
                    <p>{ $contact_name } 様</p>
                    <h4>この度はEC Apoへのご登録を頂き、有難うございました。</h4>
                    <h5>ご登録内容は下記になります</h5>

                    <p>Email: <strong>{$email}</strong></p>
                    <p>Password: <strong>{$password}</strong></p><br>
                    <p>本サービスは決裁者へのアポイントを即獲得ができますので、ぜひ有効活用下さいませ。</p>
                    <code>https://ec-apo.com/</code><br><br>
                    <h3>引き続き、よろしくお願い申し上げます。</h3>
                    <hr>
                    <div>
                    **************************** <br>
                    EC Apo 運営事務局 <br>
                    株式会社リアリディール <br>
                    東京都渋谷区恵比寿4-20-3 <br>
                    恵比寿ガーデンプレイスタワー18階 <br>
                    sales-offer@ec-apo.com <br>
                    ****************************
                    </div>
                ";
                
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                $headers .= "From:" . $from . "\r\n";

                mail($to,$subject,$message, $headers);

        }

}


?>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}



input[type=text],
input[type=password],
input[type=email] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus,
input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}


hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}


.registerbtn,
.loginBtn {
  background-color: #383aff;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}


a {
  color: dodgerblue;
}


.signin {
  background-color: #f1f1f1;
  text-align: center;
  padding: 30px;
}
</style>


<form id="custom_signup_form" method="post">
  <div class="container" style="padding-top: 130px">
    <div class="row d-flex justify-content-center">
      <div class="col-sm-12 col-md-8 col-lg-8">
        <label><b>種別</b></label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"
            checked>
          <label class="form-check-label" for="inlineRadio1">個人</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
          <label class="form-check-label" for="inlineRadio2">法人</label>
        </div><br>


        <label for="company_name"><b>会社名</b></label>
        <input type="text" name="company_name" id="company_name">

        <label for="company_address"><b>会社住所</b></label>
        <input type="text" name="company_address" id="company_address">

        <label for="company_url"><b>ホームページURL</b></label>
        <input type="text" placeholder="ホームページURL" name="company_url" id="company_url">

        <label for="title_name"><b>お名前</b></label>
        <input type="text" name="title_name" id="title_name">

        <label for="contact_name"><b>お名前(フリガナ)</b></label>
        <input type="text" name="contact_name" id="contact_name">

        <label for="contact_address"><b>メールアドレス</b></label>
        <input type="email" name="email" id="email">

        <label for="contact_cell"><b>SMSが受け取れる携帯番号</b></label>
        <input type="text" name="contact_cell" id="contact_cell">

        <label for="product_1"><b>提案したい商材1</b></label>
        <input type="text" name="product_1" id="product_1" minlength=“20”>

        <label for="product_url_1"><b>上記商材のURLがある場合</b></label>
        <input type="text" name="product_url_1" id="product_url_1">

        <label for="product_2"><b>提案したい商材2</b></label>
        <input type="text" name="product_2" id="product_2" minlength=“20”>

        <label for="product_url_2"><b>上記商材のURLがある場合</b></label>
        <input type="text" name="product_url_2" id="product_url_2">

        <label for="product_3"><b>提案したい商材3</b></label>
        <input type="text" name="product_3" id="product_3" minlength=“20”>

        <label for="product_url_3"><b>上記商材のURLがある場合</b></label>
        <input type="text" name="product_url_3" id="product_url_3">

        <label for="psw"><b>ログインパスワード</b></label>
        <input type="password" name="psw" id="psw" placeholder="半角英数8文字以上でご設定下さい">


        <label for="psw-repeat"><b>パスワード確認</b></label>
        <input type="password" name="psw-repeat" id="psw-repeat">
        <hr>
        <p><a href="https://ec-apo.com/register/rule.php">サイト掲載規約</a>に同意します</p>

        <button type="submit" class="registerbtn">登録</button>
      </div>
    </div>

  </div>

  <div class="container signin">
    <p>既に登録済みですか <a href="/login">ログイン</a>.</p>
  </div>

</form>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
       register();      
} 
?>
<?php get_footer(); ?>