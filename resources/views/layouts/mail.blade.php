{{-- <!DOCTYPE html>
<html>

<head>
    <title>santrikoding.com</title>
</head>

<body>
    <h2>Selamat Datang {{ $data['name'] }}</h2>
    <h4>Berikut adalah Password anda <h3> {{ $data['password'] }} </h3> </h4>

    <p>Terimakasih</p>
</body>

</html> --}}
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Salon Fransisco</title>
</head>

<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0"
    style="margin: 0pt auto; padding: 0px; background:#F4F7FA;">
    <table id="main" width="100%" height="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#F4F7FA">
        <tbody>
            <tr>
                <td valign="top">
                    <table class="innermain" cellpadding="0" width="580" cellspacing="0" border="0"
                        bgcolor="#F4F7FA" align="center" style="margin:0 auto; table-layout: fixed;">
                        <tbody>
                            <!-- START of MAIL Content -->
                            <tr>
                                <td colspan="4">
                                    <!-- Logo start here -->
                                    <table class="logo" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                            <tr>
                                                <td colspan="2" height="30"></td>
                                            </tr>
                                            <tr>
                                                <td valign="top" align="center">
                                                    <a href="{{ route('landing') }}"
                                                        style="display:inline-block; cursor:pointer; text-align:center;">
                                                        <img src="https://drive.google.com/uc?id=11NSmAS4A1E6ljdoeQtx2UNBGvyU2aBCA"
                                                            height="auto" width="200" border="0" alt="">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" height="30"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- Logo end here -->
                                    <!-- Main CONTENT -->
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                        bgcolor="#ffffff"
                                        style="border-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                                        <tbody>
                                            <tr>
                                                <td height="40"></td>
                                            </tr>
                                            <tr
                                                style="font-family: -apple-system,BlinkMacSystemFont,&#39;Segoe UI&#39;,&#39;Roboto&#39;,&#39;Oxygen&#39;,&#39;Ubuntu&#39;,&#39;Cantarell&#39;,&#39;Fira Sans&#39;,&#39;Droid Sans&#39;,&#39;Helvetica Neue&#39;,sans-serif; color:#4E5C6E; font-size:14px; line-height:20px; margin-top:20px;">
                                                <td class="content" colspan="2" valign="top" align="center"
                                                    style="padding-left:90px; padding-right:90px;">
                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                                        bgcolor="#ffffff">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" valign="bottom" colspan="2"
                                                                    cellpadding="3">
                                                                    <img alt="Salon Fransisco" width="80"
                                                                        src="https://drive.google.com/uc?id=1e6MKkJBs77LkuuYajEak83CVMEQUtcw9" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td height="30" &nbsp;=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center"> <span
                                                                        style="color:#48545d;font-size:22px;line-height: 24px;">
                                                                        Welcome to Salon Fransisco!
                                                                    </span>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td height="24" &nbsp;=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td height="1" bgcolor="#DAE1E9"></td>
                                                            </tr>
                                                            <tr>
                                                                <td height="24" &nbsp;=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center"> <span
                                                                        style="color:#48545d;font-size:14px;line-height:24px;">
                                                                        <span style="font-size: 18px">Dear
                                                                            {{ $data['name'] }}, </span>
                                                                        <br>
                                                                        Kami menerima permintaan untuk mengatur ulang
                                                                        kata sandi Anda.
                                                                        <br>
                                                                        Berikut adalah password Anda:
                                                                    </span>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td height="20" &nbsp;=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top" width="48%" align="center"> <span
                                                                        style="font-size:20px;display:block; padding:15px 25px; background-color:#a774f7; color:#ffffff; border-radius:3px; text-decoration:none;">
                                                                        <strong>
                                                                            {{ $data['password'] }}
                                                                        </strong>
                                                                    </span>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td height="20" &nbsp;=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center">
                                                                    <img src="https://s3.amazonaws.com/app-public/Coinbase-notification/hr.png"
                                                                        width="54" height="2" border="0">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td height="20" &nbsp;=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center">
                                                                    <p
                                                                        style="color:#a2a2a2; font-size:12px; line-height:17px; font-style:italic;">
                                                                        Mohon untuk tidak membagikan kata sandi Anda
                                                                        dengan siapa pun dan pastikan untuk menggantinya
                                                                        secara berkala untuk menjaga keamanan akun Anda.

                                                                        Terima kasih telah menggunakan layanan kami.</p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="60"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- Main CONTENT end here -->
                                    <!-- PROMO column start here -->
                                    <!-- Show mobile promo 75% of the time -->

                                    <!-- PROMO column end here -->
                                    <!-- FOOTER start here -->
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                            <tr>
                                                <td height="10">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td valign="top" align="center"> <span
                                                        style="font-family: -apple-system,BlinkMacSystemFont,&#39;Segoe UI&#39;,&#39;Roboto&#39;,&#39;Oxygen&#39;,&#39;Ubuntu&#39;,&#39;Cantarell&#39;,&#39;Fira Sans&#39;,&#39;Droid Sans&#39;,&#39;Helvetica Neue&#39;,sans-serif; color:#9EB0C9; font-size:10px;">

                                                    </span>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="50">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- FOOTER end here -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
