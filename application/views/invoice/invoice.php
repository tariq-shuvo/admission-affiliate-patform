<!-- ***************************************************
********************************************************
HOW TO USE: Use these code examples as a guideline for formatting your HTML email. You may want to create your own template based on these snippets or just pick and choose the ones that fix your specific rendering issue(s). There are two main areas in the template: 1. The header (head) area of the document. You will find global styles, where indicated, to move inline. 2. The body section contains more specific fixes and guidance to use where needed in your design.
DO NOT COPY OVER COMMENTS AND INSTRUCTIONS WITH THE CODE to your message or risk spam box banishment :).
It is important to note that sometimes the styles in the header area should not be or don't need to be brought inline. Those instances will be marked accordingly in the comments.
********************************************************
**************************************************** -->
<!-- Using the xHTML doctype is a good practice when sending HTML email. While not the only doctype you can use, it seems to have the least inconsistencies. For more information on which one may work best for you, check out the resources below.
UPDATED: Now using xHTML strict based on the fact that gmail and hotmail uses it.  Find out more about that, and another great boilerplate, here: http://www.emailology.org/#1
More info/Reference on doctypes in email:
Campaign Monitor - http://www.campaignmonitor.com/blog/post/3317/correct-doctype-to-use-in-html-email/
Email on Acid - http://www.emailonacid.com/blog/details/C18/doctype_-_the_black_sheep_of_html_email_design
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?php echo $title; ?></title>
    <style type="text/css">
        /***********
        Originally based on The MailChimp Reset from Fabio Carneiro, MailChimp User Experience Design
        More info and templates on Github: https://github.com/mailchimp/Email-Blueprints
        http://www.mailchimp.com &amp; http://www.fabio-carneiro.com
        INLINE: Yes.
        ***********/
        /* Client-specific Styles */
        #outlook a {padding:0;} /* Force Outlook to provide a "view in browser" menu link. */
        body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
        /* Prevent Webkit and Windows Mobile platforms from changing default font sizes, while not breaking desktop design. */
        .ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing.  More on that: http://www.emailonacid.com/forum/viewthread/43/ */
        #backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
        /* End reset */
        /* Some sensible defaults for images
        1. "-ms-interpolation-mode: bicubic" works to help ie properly resize images in IE. (if you are resizing them using the width and height attributes)
        2. "border:none" removes border when linking images.
        3. Updated the common Gmail/Hotmail image display fix: Gmail and Hotmail unwantedly adds in an extra space below images when using non IE browsers. You may not always want all of your images to be block elements. Apply the "image_fix" class to any image you need to fix.
        Bring inline: Yes.
        */
        img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;}
        a img {border:none;}
        .image_fix {display:block;}
        /** Yahoo paragraph fix: removes the proper spacing or the paragraph (p) tag. To correct we set the top/bottom margin to 1em in the head of the document. Simple fix with little effect on other styling. NOTE: It is also common to use two breaks instead of the paragraph tag but I think this way is cleaner and more semantic. NOTE: This example recommends 1em. More info on setting web defaults: http://www.w3.org/TR/CSS21/sample.html or http://meiert.com/en/blog/20070922/user-agent-style-sheets/
        Bring inline: Yes.
        **/
        p {margin: 1em 0;}
        /** Hotmail header color reset: Hotmail replaces your header color styles with a green color on H2, H3, H4, H5, and H6 tags. In this example, the color is reset to black for a non-linked header, blue for a linked header, red for an active header (limited support), and purple for a visited header (limited support).  Replace with your choice of color. The !important is really what is overriding Hotmail's styling. Hotmail also sets the H1 and H2 tags to the same size.
        Bring inline: Yes.
        **/
        h1, h2, h3, h4, h5, h6 {color: black !important;}
        h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color: blue !important;}
        h1 a:active, h2 a:active,  h3 a:active, h4 a:active, h5 a:active, h6 a:active {
            color: red !important; /* Preferably not the same color as the normal header link color.  There is limited support for psuedo classes in email clients, this was added just for good measure. */
        }
        h1 a:visited, h2 a:visited,  h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited {
            color: purple !important; /* Preferably not the same color as the normal header link color. There is limited support for psuedo classes in email clients, this was added just for good measure. */
        }
        /** Outlook 07, 10 Padding issue: These "newer" versions of Outlook add some padding around table cells potentially throwing off your perfectly pixeled table.  The issue can cause added space and also throw off borders completely.  Use this fix in your header or inline to safely fix your table woes.
        More info: http://www.ianhoar.com/2008/04/29/outlook-2007-borders-and-1px-padding-on-table-cells/
        http://www.campaignmonitor.com/blog/post/3392/1px-borders-padding-on-table-cells-in-outlook-07/
        H/T @edmelly
        Bring inline: No.
        **/
        table td {border-collapse: collapse;}
        /** Remove spacing around Outlook 07, 10 tables
        More info : http://www.campaignmonitor.com/blog/post/3694/removing-spacing-from-around-tables-in-outlook-2007-and-2010/
        Bring inline: Yes
        **/
        table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }
        /* Styling your links has become much simpler with the new Yahoo.  In fact, it falls in line with the main credo of styling in email, bring your styles inline.  Your link colors will be uniform across clients when brought inline.
        Bring inline: Yes. */
        a {color: orange;}
        /* Or to go the gold star route...
        a:link { color: orange; }
        a:visited { color: blue; }
        a:hover { color: green; }
        */
        /***************************************************
        ****************************************************
        MOBILE TARGETING
        Use @media queries with care.  You should not bring these styles inline -- so it's recommended to apply them AFTER you bring the other stlying inline.
        Note: test carefully with Yahoo.
        Note 2: Don't bring anything below this line inline.
        ****************************************************
        ***************************************************/
        /* NOTE: To properly use @media queries and play nice with yahoo mail, use attribute selectors in place of class, id declarations.
        table[class=classname]
        Read more: http://www.campaignmonitor.com/blog/post/3457/media-query-issues-in-yahoo-mail-mobile-email/
        */
        @media only screen and (max-device-width: 480px) {
            /* A nice and clean way to target phone numbers you want clickable and avoid a mobile phone from linking other numbers that look like, but are not phone numbers.  Use these two blocks of code to "unstyle" any numbers that may be linked.  The second block gives you a class to apply with a span tag to the numbers you would like linked and styled.
            Inspired by Campaign Monitor's article on using phone numbers in email: http://www.campaignmonitor.com/blog/post/3571/using-phone-numbers-in-html-email/.
            Step 1 (Step 2: line 224)
            */
            a[href^="tel"], a[href^="sms"] {
                text-decoration: none;
                color: black; /* or whatever your want */
                pointer-events: none;
                cursor: default;
            }
            .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
                text-decoration: default;
                color: orange !important; /* or whatever your want */
                pointer-events: auto;
                cursor: default;
            }
        }
        /* More Specific Targeting */
        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
            /* You guessed it, ipad (tablets, smaller screens, etc) */
            /* Step 1a: Repeating for the iPad */
            a[href^="tel"], a[href^="sms"] {
                text-decoration: none;
                color: blue; /* or whatever your want */
                pointer-events: none;
                cursor: default;
            }
            .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
                text-decoration: default;
                color: orange !important;
                pointer-events: auto;
                cursor: default;
            }
        }
        @media only screen and (-webkit-min-device-pixel-ratio: 2) {
            /* Put your iPhone 4g styles in here */
        }
        /* Following Android targeting from:
        http://developer.android.com/guide/webapps/targeting.html
        http://pugetworks.com/2011/04/css-media-queries-for-targeting-different-mobile-devices/  */
        @media only screen and (-webkit-device-pixel-ratio:.75){
            /* Put CSS for low density (ldpi) Android layouts in here */
        }
        @media only screen and (-webkit-device-pixel-ratio:1){
            /* Put CSS for medium density (mdpi) Android layouts in here */
        }
        @media only screen and (-webkit-device-pixel-ratio:1.5){
            /* Put CSS for high density (hdpi) Android layouts in here */
        }
        /* end Android targeting */
    </style>
    <!-- Targeting Windows Mobile -->
    <!--[if IEMobile 7]>
    <style type="text/css">
    </style>
    <![endif]-->
    <!-- ***********************************************
    ****************************************************
    END MOBILE TARGETING
    ****************************************************
    ************************************************ -->
    <!--[if gte mso 9]>
    <style>
        /* Target Outlook 2007 and 2010 */
    </style>
    <![endif]-->
</head>
<body>
<?php
foreach ($view_data['print_info'] as $print) {
?>
<!-- Wrapper/Container Table: Use a wrapper table to control the width and the background color consistently of your email. Use this approach instead of setting attributes on the body tag. -->
<table cellpadding="0" cellspacing="0" border="0" id="backgroundTable">
    <tr>
        <td>
            <!-- invoice table -->
            <table cellpadding="10" cellspacing="0" border="0" align="center" width="600px" style="border-bottom: 2px solid #F4F5F5;">
                <tr>
                    <td valign="top">
                        <table cellpadding="10" cellspacing="0" border="0" align="center" width="100%" style="">
                            <tr>
                                <td valign="top" align="">
                                    <img src="https://s33.postimg.cc/xqodypte7/logo.png" alt="image">
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td valign="top">
                        <table cellpadding="10" cellspacing="0" border="0" align="center" width="100%" style="font-family: sans-serif;">
                            <tr>
                                <td valign="top" align="right">
                                    <h1 style="font-weight: normal; font-size: 40px;">		INVOICE
                                    </h1>
                                    <p style="color: #000000; font-weight: bold;"> Shikhbe Shobai</p>
                                    <p style="font-weight: normal;">		Bangladesh</p>
                                </td>
                            </tr>
                            <?php if(count($affiliate_id)>0){ ?>
                            <tr>
                                <td valign="top" align="left">
                                    <?php foreach ($view_affiliate_data as $affiliate_data){ ?>
                                    <p style="margin: 7px 0; color:#cac9c9;">Affiliate info</p>
                                    <h5 style="margin-top: 5px; margin-bottom: 15px; font-size: 17px;"><?php echo $affiliate_data->name; ?></h5>
                                    <p style="margin:5px 0;"><?php echo $affiliate_data->phone_no; ?></p>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </td>
                </tr>
            </table>
            <!-- invoice end -->
            <!-- bill table -->
            <table cellpadding="10" cellspacing="0" border="0" align="center" width="600px" style="">
                <tr>
                    <td valign="top">
                        <table cellpadding="10" cellspacing="0" border="0" align="center" width="100%" style="font-family: sans-serif;">
                            <tr>
                                <td valign="top" align="">
                                    <h4>Form Number:</h4>
                                    <p style="margin: 7px 0; color:#cac9c9;">Bill to</p>
                                    <h5 style="margin-top: 5px; margin-bottom: 15px; font-size: 17px;"><?php echo $print->name; ?></h5>
                                    <p style="margin:5px 0;"><?php echo $print->email; ?></p>
                                    <p style="margin:5px 0;"><?php echo $print->phone_no; ?></p>
                                </td>
                            </tr>

                        </table>
                    </td>
                    <td valign="top">
                        <table cellpadding="10" cellspacing="0" border="0" align="center" width="100%" style="font-family: sans-serif;">
                            <tr>
                                <td valign="top" align="right">
                                    <table cellpadding="0" cellspacing="0" border="0" align="">
                                        <tr>
                                            <td valign="top" align="left">
                                                <?php if(count($affiliate_id)>0){ ?>
                                                <p><span style="font-weight: bold;">Receipt No:</span> &nbsp;<?php echo $affiliate_id[0]->id; ?></p>
                                                <?php } ?>
                                                <p><span style="font-weight: bold;">Invoice Number:</span> <?php echo $print->id; ?></p>
                                                <p><span style="font-weight: bold;">Invoice Date:</span> <?php echo date('d-m-Y',strtotime($print->join_date)); ?></p>
                                                <p><span style="font-weight: bold;">Payment Due: </span> <?php echo date('d-m-Y',strtotime('+31 days',strtotime($print->join_date))); ?></p>
                                                <p style="background-color: #F4F5F5; padding: 10px 10px 10px 10px;"><span style="font-weight: bold; ">Amount Due (BDT): </span> tk <?php echo ($print->course_fee-$print->student_discount)-$print->paid; ?></p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!-- bill end -->
            <!-- invoice table -->
            <table cellpadding="0" cellspacing="0" border="0" align="center" width="600px" style="border-bottom: 5px solid #F4F5F5;">
                <tr>
                    <td valign="top" align="center">
                        <table cellpadding="10" cellspacing="0" border="0" align="center" width="100%" style="font-family: sans-serif;">
                            <tr style="background-color: #444444;">
                                <th style="color: white; text-align: left;">Items</th>
                                <th style="color: white; text-align: left;">Quantity</th>
                                <th style="color: white; text-align: left;">Price</th>
                                <th style="color: white; text-align: left;">Amount</th>
                            </tr>
                            <tr>
                                <td><p>Course <br/> <?php echo $print->course_name; ?></p></td>
                                <td><p>1</p></td>
                                <td><p>tk <?php echo $print->course_fee-$print->student_discount; ?></p></td>
                                <td><p>tk <?php echo $print->paid; ?></p></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!-- invoice end -->
            <!-- total table -->
            <table cellpadding="10" cellspacing="0" border="0" align="center" width="600px" style="border-bottom: 5px solid #F4F5F5;">
                <tr>
                    <td valign="top" align="center">
                        <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="font-family: sans-serif;">
                            <tr>
                                <td valign="top" align="right">
                                    <h1 style="font-size: 20px;">Total:</h1>
                                    <p>Payment on <?php echo date('d-m-Y',strtotime($print->join_date)); ?>:</p>
                                </td>
                                <td valign="top" align="right">
                                    <p>tk <?php echo $print->paid; ?></p></p>
                                    <p>tk <?php echo $print->paid; ?></p></p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!-- total end -->

        </td>
    </tr>
    <tr>
        <td>
            <table cellpadding="10" cellspacing="0" border="0" align="center" width="600px" style="border-bottom: 5px solid #F4F5F5;">
                <tr>
                    <td valign="top" align="center">
                        <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="font-family: sans-serif;">
                            <tr>
                                <td valign="top" align="center">
                                    <br>
                                    <p><b>Amount Received By</b></p>
                                </td>
                                <td valign="top" align="center">
                                    <br>
                                    <p><b>Accounts</b></p>
                                </td>
                                <td valign="top" align="center">
                                    <br>
                                    <p><b>Depositor</b></p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<!-- End of wrapper table -->
<?php } ?>
</body>
</html>