<?php
    session_start();
    include("connectdb.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <style>
        #content{
            padding: 120px 60px 80px 60px;
        }
        #content h1{
            font-size: 60px;
            color: #731212;
        }
        #content p{
            font-size: 50px;
            font-family: Impact;
        }

        #whole{
            position: relative;
        }
        #footer{
            position: absolute;
            bottom: -200px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="whole">
        <div>
            <?php
                include("site-overview/dash-header.html");
            ?>
        </div>

        <?php 
            $userid = $_SESSION['id'];
            $get_info = mysqli_query($connectdb, "SELECT * FROM `registration` WHERE id='$userid'");
            $fetch = mysqli_fetch_array($get_info);
        ?>
        <div id="content">
            <h1><?php echo $fetch['firstname'] . ' ' . $fetch['lastname']; ?></h1><hr>
            <h3>WELCOME TO YOUR DASHBOARD</h3>
            <br><br>
            <div>
                <fieldset>
                    <legend><b>AVAILABLE FUND</b></legend><br>
                    <p>&#8358 <?php echo $fetch['fund']; ?></p>
                </fieldset>

            </div>

            <style>
                #items{
                    margin-top: 3rem;
                    text-align: center;
                }
                #items .card{
                    border: 5px solid #fff;
                }
                #items img{
                    width: 100%;
                    max-height: 15rem;
                    margin-bottom: 2rem;
                }
            </style>

            <div class="container" id="items">
                <div class="row">
                    <div class="col-4 card bg-light p-4">
                        <div>
                            <img src="assets/images/bag.png" alt="">
                            <h5>Red and Blue Bag</h5>
                            <b><i>&#8358 12,000</i></b><br>
                            <form id="paymentForm"> 
                                <input type="hidden" name="user_email" id="email-address" value="<?php echo $fetch['email']; ?>"> 
                                <input type="hidden" name="amount" id="amount" value="12000"> 
                                <input type="hidden" name="firstname" id="first-name" value="<?php echo $fetch['firstname'];; ?>">
                                <input type="hidden" name="lastname" id="last-name" value="<?php echo $fetch['lastname'];; ?>">  
                                <button type="submit" class="btn btn-danger" onclick="payWithPaystack()" title="Pay now">Buy now</button>
                            </form>
                            <!-- <a href="#" class="btn btn-danger">Buy Now</a> -->
                        </div>
                    </div>
                    <div class="col-4 card bg-light p-4">
                        <div>
                            <img src="assets/images/sneaker.png" alt="">
                            <h5>Sneakers for Adult</h5>
                            <b><i>&#8358 35,000</i></b><br>
                            <form id="paymentForm"> 
                                <input type="hidden" name="user_email" id="email-address" value="<?php echo $fetch['email']; ?>"> 
                                <input type="hidden" name="amount" id="amount" value="35000"> 
                                <input type="hidden" name="firstname" id="first-name" value="<?php echo $fetch['firstname'];; ?>">
                                <input type="hidden" name="lastname" id="last-name" value="<?php echo $fetch['lastname'];; ?>">  
                                <button type="submit" class="btn btn-danger" onclick="payWithPaystack()" title="Pay now">Buy now</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-4 card bg-light p-4">
                        <div>
                            <img src="assets/images/tshirt.png" alt="">
                            <h5>Casual Tshirt</h5>
                            <b><i>&#8358 7,000</i></b><br>
                            <form id="paymentForm"> 
                                <input type="hidden" name="user_email" id="email-address" value="<?php echo $fetch['email']; ?>"> 
                                <input type="hidden" name="amount" id="amount" value="7000"> 
                                <input type="hidden" name="firstname" id="first-name" value="<?php echo $fetch['firstname'];; ?>">
                                <input type="hidden" name="lastname" id="last-name" value="<?php echo $fetch['lastname'];; ?>">  
                                <button type="submit" class="btn btn-danger" onclick="payWithPaystack()" title="Pay now">Buy now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="footer">
            <?php
                include("site-overview/dash-footer.html");
            ?>
        </div>
    </div>
</body>
</html>


<script>
        let paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener("submit", payWithPaystack, false);

    function payWithPaystack(e) {
    e.preventDefault();

    let handler = PaystackPop.setup({
        key: 'pk_live_855decb994387a14b1ff035cea643b1b1d2bdb5d', // Replace with your public key
        email: document.getElementById("email-address").value,
        amount: document.getElementById("amount").value * 100,
        ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        // label: "Optional string that replaces customer email"
        onClose: function(){
        alert('Window closed.');
        },
        callback: function(response){
        let message = 'Payment complete! Reference: ' + response.reference;
        alert(message);
        }
    });

    handler.openIframe();
    }
</script>