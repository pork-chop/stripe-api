<?php
/**
 *
 */
?><!DOCTYPE html>
  <!--[if IE 7]>
  <html class="ie ie7" lang="en-US">
  <![endif]-->
  <!--[if IE 8]>
  <html class="ie ie8" lang="en-US">
  <![endif]-->
  <!--[if !(IE 7) & !(IE 8)]><!-->
  <html lang="en-US">
  <!--<![endif]-->
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>SAMatters Academy - Stripe Pay Button</title>

    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" rel="stylesheet">

    <style type="text/css">
      html {
        font-family: 'Open Sans', sans-serif;
        color: #000;
        font-size: 16px;
        font-weight: 400;
        line-height: 1.5;
      }

      body {
        margin: 0;
        padding: 0;
      }

      .container {
        max-width: 1140px;
        width: 100;
        margin: 0 auto;
      }

      header {
        background: #000;
      }

      footer {
        background: #dddcd5;
        background: rgb(221, 220, 213);
      }

      header, footer {
        padding: 4px 0;
      }

      main {
        padding: 40px;
      }

      .logoImg {
        width: 90%;
        max-width: 872px;
        margin: 0 auto;
        display: block;
      }

      .homeLink p, .homeLink a {
        color: #fff;              
      }

      .halfColumn {
        float: left;
        width: 45%;
        margin-left: 5%;
      }
        .halfColumn:first-child {
          margin-left: 0;
        }

      @media only screen and (max-width: 600px) {
        .halfColumn {
          float: none;
          width: 100%;
          margin-left: 0;
        }

      }

      .cf:before,
      .cf:after {
          content: " "; /* 1 */
          display: table; /* 2 */
      }

      .cf:after {
          clear: both;
      }

      .cf {
          *zoom: 1;
      }

      form ul {
        padding: 0;
      }
      form li {
        list-style-type: none;
      }

      a { color: #d2232a; }
      a:hover { color: #ba2f34; }

      button, .btn {
        background: #d2232a;
        background: rgb(210, 35, 42);
        border: 0;
        color: #fff;
        display: block;
        text-transform: uppercase;
        width: 80%;
        margin: 0 auto;
        padding: 6px;
        font-size: 1.25em;
        font-weight: 700;
        text-decoration: none;
      }
        button:hover, .btn:hover {
          cursor: pointer;
          background: #ba2f34;
          color: #fff;
        }


      button, .btn, input {
        font-family: 'Open Sans', sans-serif;        
      }

      .marginbottom40 { margin-bottom: 60px; }

    </style>
  </head>

  <body>
    <header>
      <div class="container homeLink">
        <p><small><a href="/">SAMatters.com</a></small></p>
      </div>
    </header>

    <main role="main">
      <div class="container">

        <a href="/academy"><img src="samatters-online-academy.png" alt="Situational Awareness Matters! Online Academy" class="logoImg marginbottom40"></a>

        <div class="cf">
          <div class="halfColumn">
            <img src="Payment-GROUP.jpg" alt="Group Enrollment Price Tiers per Student" class="logoImg" style="-webkit-box-shadow: 1px 1px 5px 1px rgba(0,0,0,.6); box-shadow: 1px 1px 5px 1px rgba(0,0,0,.6);">
          </div>

          <div class="halfColumn payment" style="text-align: center;">
            <div class="formInfo" style="border: 2px solid #000; padding-bottom: 2em; padding-right: 20px; padding-left: 20px; margin-bottom: 2em;">
              <h1>Enroll Your Group:</h1>

              <form id="payment-form">
                <ul class="studentsNum">
                  <li>
                    <label style="margin-bottom: 1em; display: block;"><strong>How many students are enrolling (between 2-99)?</strong></label> 
                    <input id="studentsNum" type="number" min="2" max="99" placeholder="##">
                  </li>
                  <li>
                    <p style="margin-top: 2em;"><strong>Would you like Basic or Premium enrollment?</strong></p>
                    <label><input type="radio" name="enrollmenttype" value="Basic"> Basic</label><br>
                    <label><input type="radio" name="enrollmenttype" value="Premium" checked> Premium</label>
                  </li>
                </ul>
              </form>

              <button id="customButton">Purchase</button>

              <p><a href="/academy-invoice/" class="btn">Invoice Me</a></p>
            </div>
            
            <p><a href="http://knowledgelinktv.com/samatters/" class="btn">Enroll as an Individual</a></p>

            <p><a href="/academy-quote/" class="btn">Request a Quote for Groups of 100+</a></p>
          </div>

      </div>
    </main>

    <footer>
      <div class="container cf" style="padding: 40px 0;">

        <div class="halfColumn">
          <a href="http://samatters.com"><img src="samatters-online-academy-small.png" width="200" alt="SAMatters Online Academy" style="display: block; margin: 0 auto"></a>
        </div>

        <div class="halfColumn">
          <p><small><strong>Copyright 2017 &copy; <a href="http://samatters.com" target="_blank">SAMatters.com</a> | All Rights Reserved | Powered by <a href="http://tenaciousedge.com" target="_blank">tena.cious</a></strong></small></p>
        </div>

      </div>
    </footer>

    <script>
    var $form = $('#payment-form');
    var $paymentArea = $('.payment');
    var $paymentForm = $('.formInfo');


    document.getElementById('customButton').addEventListener('click', function(e) {
      var studentsNumber = parseInt(document.getElementById('studentsNum').value);

      var enrollmenttype = $('input[name=enrollmenttype]:checked').val();
      // alert(enrollmenttype);

      if (enrollmenttype == 'Basic') {
        // basic enrollment prices
        var basePriceAmount = "9799"; // 1-5
        var tiertwoPriceAmount = "8999"; // 6-10
        var tierthreePriceAmount = "8199"; // 11-15
        var tierfourPriceAmount = "7399"; // 16-20
        var tierfivePriceAmount = "6599"; // 21-25
        var tiersixPriceAmount = "5799"; // 26-30
        var tiersevenPriceAmount = "4999"; // 31-99
      } else {
        // premium enrollment prices
        var basePriceAmount = "14799"; // 1-5
        var tiertwoPriceAmount = "13999"; // 6-10
        var tierthreePriceAmount = "13199"; // 11-15
        var tierfourPriceAmount = "12399"; // 16-20
        var tierfivePriceAmount = "11599"; // 21-25
        var tiersixPriceAmount = "10799"; // 26-30
        var tiersevenPriceAmount = "9999"; // 31-99
      }

      switch (true)
          {
             case studentsNumber <= 5 : 
                priceAmount = (studentsNumber * basePriceAmount);
                break;

             case ( studentsNumber >= 6 && studentsNumber <= 10 ) : 
                priceAmount = (studentsNumber * tiertwoPriceAmount);
                break;

             case ( studentsNumber >= 11 && studentsNumber <= 15 ) : 
                priceAmount = (studentsNumber * tierthreePriceAmount);
                break;

             case ( studentsNumber >= 16 && studentsNumber <= 20 ) : 
                priceAmount = (studentsNumber * tierfourPriceAmount);
                break;

             case ( studentsNumber >= 21 && studentsNumber <= 25 ) : 
                priceAmount = (studentsNumber * tierfivePriceAmount);
                break;

             case ( studentsNumber >= 26 && studentsNumber <= 30 ) : 
                priceAmount = (studentsNumber * tiersixPriceAmount);
                break;

             case ( studentsNumber >= 31 && studentsNumber <= 99 ) : 
                priceAmount = (studentsNumber * tiersevenPriceAmount);
                break;
          
             default: priceAmount = basePriceAmount
          }

      descLabel = studentsNumber + " Students, " + enrollmenttype + " Enrollment";
      // Open Checkout with further options:
      handler.open({
        name: 'SAMatters Online Academy',
        description: descLabel,
        amount: parseInt(priceAmount)
      });
      e.preventDefault();
    });

    var handler = StripeCheckout.configure({
      key: 'pk_test_XXXXXXXXXXXXXXXXXXXXXXXX',
      image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
      zipCode: true,
      token: function(token, args) {
        // Use the token to create the charge with a server-side script.
        // You can access the token ID with `token.id`
        // console.log(token);

        $.ajax({
            type: 'POST',
            url: 'stripe_pay.php',
            data: { 
              tokenid: token.id, 
              email: token.email, 
              purchaseDesc: descLabel,
              academyCost: parseInt(priceAmount) 
            },
            success: function(data) {
              // console.log('hello everyone');

              if (data == 'success') {
                  // console.log("Card successfully charged!");

                  // make this input type="hidden" before release
                  // $form.append($('<input type="text" name="stripeToken" />').val(token.id));
                  $paymentForm.hide();
                  $('a.btn').hide();
                  $paymentArea.append('<h2>Thank you for your enrollments!</h2><p>You will receive a follow-up message from:<br><strong style="margin: .5em 0; display: inline-block;">OnlineAcademy@RichGasaway.com</strong><br>within 48 hours, requesting the names and email addresses of your students to be enrolled.</p><p>Please add this email address: <br><strong style="margin: .5em 0; display: inline-block;">OnlineAcademy@RichGasaway.com</strong><br>to your safe-sender list.</p><p><a href="/academy">Go back to the SAMatters Online Academy homepage</a></p><p>If you do not receive the email, check your spam or junk mail folder.</p>')

              }
              else {
                  // console.log(data);
                  // console.log('hello, i\'m an else statement');

                  // make this input type="hidden" before release
                  // $form.append($('<input type="text" name="stripeToken" />').val(token.id));
                  $paymentForm.hide();
                  $('a.btn').hide();
                  $paymentArea.append('<h2>Thank you for your enrollments!</h2><p>You will receive a follow-up message from:<br><strong style="margin: .5em 0; display: inline-block;">OnlineAcademy@RichGasaway.com</strong><br>within 48 hours, requesting the names and email addresses of your students to be enrolled.</p><p>Please add this email address: <br><strong style="margin: .5em 0; display: inline-block;">OnlineAcademy@RichGasaway.com</strong><br>to your safe-sender list.</p><p><a href="/academy">Go back to the SAMatters Online Academy homepage</a></p><p>If you do not receive the email, check your spam or junk mail folder.</p>')

              }

            },
            error: function(data) {
              console.log("Ajax Error!");
              console.log(data);
            }
          }); // end ajax call
        }
      });



    // Close Checkout on page navigation:
    window.addEventListener('popstate', function() {
      handler.close();
    });
    </script>
  </body>
</html>