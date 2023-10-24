<?php include('../../config/autoload.php'); ?>

<html>
<head>
    <title>Confirmation</title>
<style>
    body{
        text-align: center;
    }
@import url(//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800);
.static-slider3 {
  font-family: "Montserrat", sans-serif;
	color: #8d97ad;
  font-weight: 300;
	padding: 10% 0;
}

.static-slider3 h1, .static-slider3 h2, .static-slider3 h3, .static-slider3 h4, .static-slider3 h5, .static-slider3 h6 {
  color: #3e4555;
}

.static-slider3 .title {
	font-weight: 300;
  line-height: 50px;
	font-size: 36px;
}

.static-slider3 .title span {
	border-bottom: 3px solid #2cdd9b;
}

.static-slider3 .text-success-gradiant {
	  background: #2cdd9b;
    background: -webkit-linear-gradient(legacy-direction(to right), #2cdd9b 0%, #1dc8cc 100%);
    background: -webkit-gradient(linear, left top, right top, from(#2cdd9b), to(#1dc8cc));
    background: -webkit-linear-gradient(left, #2cdd9b 0%, #1dc8cc 100%);
    background: -o-linear-gradient(left, #2cdd9b 0%, #1dc8cc 100%);
    background: linear-gradient(to right, #2cdd9b 0%, #1dc8cc 100%);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    text-fill-color: transparent;
}

.static-slider3 .btn-success-gradiant {
		background: #2cdd9b;
    background: -webkit-linear-gradient(legacy-direction(to right), #2cdd9b 0%, #1dc8cc 100%);
    background: -webkit-gradient(linear, left top, right top, from(#2cdd9b), to(#1dc8cc));
    background: -webkit-linear-gradient(left, #2cdd9b 0%, #1dc8cc 100%);
    background: -o-linear-gradient(left, #2cdd9b 0%, #1dc8cc 100%);
    background: linear-gradient(to right, #2cdd9b 0%, #1dc8cc 100%);
}

.static-slider3 .btn-success-gradiant:hover {
		background: #1dc8cc;
    background: -webkit-linear-gradient(legacy-direction(to right), #1dc8cc 0%, #2cdd9b 100%);
    background: -webkit-gradient(linear, left top, right top, from(#1dc8cc), to(#2cdd9b));
    background: -webkit-linear-gradient(left, #1dc8cc 0%, #2cdd9b 100%);
    background: -o-linear-gradient(left, #1dc8cc 0%, #2cdd9b 100%);
    background: linear-gradient(to right, #1dc8cc 0%, #2cdd9b 100%);	
}

.static-slider3 .btn-md {
    padding: 15px 45px;
    font-size: 16px;
}

@media (max-width:767px) {
	.static-slider3 .title{
		line-height: 30px;
		font-size: 24px;
	}
}
.button{
    text-decoration: none;
    color:white;
}
    </style>
</head>
<body>
<div class="static-slider3">
    <div class="container">
        
        <div class="row justify-content-center ">
            <!-- Column -->
            <div class="col-md-8 col-lg-8 align-self-center text-center">
                <h1 class="title">Hi <?php echo $_SESSION['uname'];?><b class="font-weight-bold">, You appointment has been cancelled successfully</b>,<br><span class="text-success-gradiant font-weight-bold typewrite" data-period="2000" data-type='[ "Feel free to book your appointment anytime." ]'></span><br><br>You will be redirected.<br></h1>
                <a class="button btn btn-success-gradiant btn-md text-white border-0 mt-3" href="mybooking.php"><span>My Bookings</span></a>
            </div>

        </div>
    </div>
</div>
<script>
var TxtType = function(el, toRotate, period) {
	this.toRotate = toRotate;
	this.el = el;
	this.loopNum = 0;
	this.period = parseInt(period, 10) || 2000;
	this.txt = '';
	this.tick();
	this.isDeleting = false;
};

TxtType.prototype.tick = function() {
	var i = this.loopNum % this.toRotate.length;
	var fullTxt = this.toRotate[i];

	if (this.isDeleting) {
		this.txt = fullTxt.substring(0, this.txt.length - 1);
	} else {
		this.txt = fullTxt.substring(0, this.txt.length + 1);
	}

	this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

	var that = this;
	var delta = 200 - Math.random() * 100;

	if (this.isDeleting) { delta /= 2; }

	if (!this.isDeleting && this.txt === fullTxt) {
		delta = this.period;
		this.isDeleting = true;
	} else if (this.isDeleting && this.txt === '') {
		this.isDeleting = false;
		this.loopNum++;
		delta = 500;
	}

	setTimeout(function() {
		that.tick();
	}, delta);
};

window.onload = function() {
	var elements = document.getElementsByClassName('typewrite');
	for (var i=0; i<elements.length; i++) {
		var toRotate = elements[i].getAttribute('data-type');
		var period = elements[i].getAttribute('data-period');
		if (toRotate) {
			new TxtType(elements[i], JSON.parse(toRotate), period);
		}
	}
	// INJECT CSS
	var css = document.createElement("style");
	css.type = "text/css";
	css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid transparent}";
	document.body.appendChild(css);
};

// Set the time delay in milliseconds (e.g., 3000ms for 3 seconds)
const delay = 4000; // 3 seconds

// Define the URL you want to redirect to
const redirectUrl = "mybooking.php"; // Replace with your desired URL

// Use setTimeout to delay the redirection
setTimeout(function () {
    window.location.href = redirectUrl;
}, delay);

    </script>
    </body>
    </html>
  