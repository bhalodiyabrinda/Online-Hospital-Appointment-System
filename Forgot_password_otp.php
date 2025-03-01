<style>
    body{
      height: 100%;
      width: 100%;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      font-family: 'Jost' , sans-serif;
      background: url(a.jpg);
      background-position: center;
      background-size: cover;
      position: relative;
    }
    .row{
      width: 450px;
      height: 550px;
      overflow: hidden;
      border-radius: 40px;
      backdrop-filter: blur(10px);
      border: 3px solid rgb(135, 131, 131);
      box-shadow: 5px 20px 50px #000;
    }
    .new{
      position: relative;
      width: 100%;
      height: 100%;
    }
    h2{
      color: #fff;
      font-size: 2.3em;
      justify-content: center;
      display: flex;
      margin: 70px;
      font-weight: bold;
      cursor: pointer;
      transition: .5s ease-in-out;
    }
    input{
      width: 60%;
      height: 40px;
      background: #fff;
      justify-content: center;
      display: flex;
      margin: 30px auto;
      padding: 10px;
      border: none;
      outline: none;
      border-radius: 5px;
    }
    button{
      width: 60%;
      height: 40px;
      margin: 10px auto;
      justify-content: center;
      display: block;
      color: #fff ;
      background: #3046d7;
      font-size: 1em;
      font-weight: bold;
      margin-top: 20px;
      outline: none;
      border: none;
      border-radius: 5px;
      transition: .2s ease-in;
      cursor: pointer;
    }
    button:hover{
      background: #3046d7;
    }  
    .a{
        margin-left: 90px;
    }
    a{
        text-decoration: none;
    }
</style>


<script type="text/javascript">
    // Function to start the countdown timer
    function startTimer(duration, display) {
        var timer = duration,
            minutes, seconds;
        setInterval(function() {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = (minutes + ":" + seconds);

            if (--timer < 0) {
                timer = 0;
            }
        }, 1000);
    }
    window.onload = function() {
        var oneMinute = 60,
            display = document.querySelector('#timer');

        startTimer(oneMinute, display);
    };

    function enableButton() {
        document.getElementById("r_btn").disabled = false;
    }
    setTimeout(enableButton, 5000);
</script>

<div class="row">
    <div calss="new">
        <h2>OTP Verification</h2>
        <form action="Forget_password_otp_action.php" method="post" id="form1">
            <input type="number" class="form-control" id="otp1" name="otp" placeholder="Enter OTP">
            <span id="otp_err"></span>
            <div class="a">OTP will expire in <span id="timer">01:00</span></div>
            <button type="submit" class="btn" name="btn">Verify OTP</button>
            <a href="resend_otp.php"><button type="button" class="btn" name="resend_btn" id="r_btn" disabled>Resend OTP</button></a>
        </form>
    </div>
</div>