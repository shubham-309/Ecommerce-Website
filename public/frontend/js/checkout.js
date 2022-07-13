$(document).ready(function() {

    $('.razorpaybtn').click(function(e) {
        e.preventDefault();

        var firstname = $('.firstname').val();
        var lastname = $('.lastname').val();
        var email = $('.email').val();
        var phone = $('.phone').val();

        if(!firstname)
        {
            fname = "First Name Is Required";
            $('#fname').html('');
            $('#fname').html(fname);
        }
        else
        {
            fname = "";
            $('#fname').html('');
        }

        if(!lastname)
        {
            lname = "Last Name Is Required";
            $('#lname').html('');
            $('#lname').html(lname);
        }
        else
        {
            lastname = "";
            $('#lname').html('');
        }

        if(!email)
        {
            email = "Email Is Required";
            $('#email').html('');
            $('#email').html(email);
        }
        else
        {
            email = "";
            $('#email').html('');
        }


        if(!phone)
        {
            phone = "Phone Number Is Required";
            $('#phone').html('');
            $('#phone').html(phone);
        }
        else
        {
            phone = "";
            $('#phone').html('');
        }

        if(fname !='' || lname != '' || email != '' || phone != '')
        {
            return false;
        }
        else
        {

            var data =
            {

                'firstname' : firstname,
                'lastname' : lastname,
                'email': email,
                'phone' : phone,

            }


            $.ajax({
                method: "POST",
                url : "/proceed-to-pay",
                data: data,
                success: function(response)
                {
                    //alert(response.total)
                    var options = {
                        "key": "rzp_test_2qhjTpzrtZMP38", // Enter the Key ID generated from the Dashboard
                        "amount": (response.total_price*100), // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "currency": "INR",
                        "name": response.firstname +" "+ response.lastname,
                        "description": "Thank You For Choosing Us",
                        "image": "https://example.com/your_logo",
                        //"order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                        "handler": function (responsea){
                            //alert(responsea.razorpay_payment_id);
                            $.ajax({
                                method: "POST",
                                url : "/place-order",
                                data: {
                                    'firstname' :response.firstname,
                                    'lastname' : response.lastname,
                                    'email': response.email,
                                    'phone': response.phone,
                                    'payment_mode' : "Paid By Razorpay",
                                    'payment_id': responsea.razorpay_payment_id,
                                },
                                success: function(responseb)
                                {
                                    //alert(responseb.status);
                                    swal(responseb.status);
                                    window.location.href="/my-orders";
                                }
                            });
                        },
                        "prefill": {
                            "name": response.firstname +' '+ response.lastname,
                            "email": response.email,
                            "contact": response.phone
                        },

                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                }
            });
        }
    });
});

