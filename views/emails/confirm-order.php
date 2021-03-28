<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Cinema Confirm Order</title>
  <style type="text/css">
    /* ----- Client Fixes ----- */

    /* Force Outlook to provide a "view in browser" message */
    #outlook a {
      padding: 0;
    }

    /* Force Hotmail to display emails at full width */
    .ReadMsgBody {
      width: 100%;
    }

    .ExternalClass {
      width: 100%;
    }

    /* Force Hotmail to display normal line spacing */
    .ExternalClass,
    .ExternalClass p,
    .ExternalClass span,
    .ExternalClass font,
    .ExternalClass td,
    .ExternalClass div {
      line-height: 100%;
    }


    /* Prevent WebKit and Windows mobile changing default text sizes */
    body,
    table,
    td,
    p,
    a,
    li,
    blockquote {
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }

    /* Remove spacing between tables in Outlook 2007 and up */
    table,
    td {
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }

    /* Allow smoother rendering of resized image in Internet Explorer */
    img {
      -ms-interpolation-mode: bicubic;
    }

    /* ----- Reset ----- */

    html,
    body,
    .body-wrap,
    .body-wrap-cell {
      margin: 0;
      padding: 0;
      background: #ffffff;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 14px;
      color: #464646;
      text-align: left;
    }

    img {
      border: 0;
      line-height: 100%;
      outline: none;
      text-decoration: none;
    }

    table {
      border-collapse: collapse !important;
    }

    td,
    th {
      text-align: left;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 14px;
      color: #464646;
      line-height: 1.5em;
    }

    b a,
    .footer a {
      text-decoration: none;
      color: #464646;
    }

    a.blue-link {
      color: blue;
      text-decoration: underline;
    }

    /* ----- General ----- */

    td.center {
      text-align: center;
    }

    .left {
      text-align: left;
    }

    .body-padding {
      padding: 24px 40px 40px;
    }

    .border-bottom {
      border-bottom: 1px solid #D8D8D8;
    }

    table.full-width-gmail-android {
      width: 100% !important;
    }


    /* ----- Header ----- */
    .header {
      font-weight: bold;
      font-size: 16px;
      line-height: 16px;
      height: 16px;
      padding-top: 19px;
      padding-bottom: 7px;
    }

    .header a {
      color: #464646;
      text-decoration: none;
    }

    /* ----- Footer ----- */

    .footer a {
      font-size: 12px;
    }

    .cardWrap {
      width: 34em;
      margin: 3em auto;
      color: #fff;
      font-family: sans-serif;
    }

    .card {
      background: linear-gradient(to bottom, #e84c3d 0%, #e84c3d 26%, #ecedef 26%, #ecedef 100%);
      height: 11em;
      float: left;
      position: relative;
      padding: 1em;
      margin-top: 30px;
    }

    .cardLeft {
      border-top-left-radius: 8px;
      border-bottom-left-radius: 8px;
      width: 17em;
      height: 220px;
    }

    .cardRight {
      width: 12.5em;
      border-left: 0.18em dashed #fff;
      border-top-right-radius: 8px;
      border-bottom-right-radius: 8px;
      height: 220px;
    }

    .price-value {
      font-size: 2.4em !important;
    }

    .cardRight:before,
    .cardRight:after {
      content: "";
      position: absolute;
      display: block;
      width: 0.9em;
      height: 0.9em;
      background: #fff;
      border-radius: 50%;
      left: -0.5em;
    }

    .cardRight:before {
      top: -0.4em;
    }

    .cardRight:after {
      bottom: -0.4em;
    }

    h1 {
      font-size: 1.1em;
      margin-top: 0;
    }

    h1 span {
      font-weight: normal;
    }

    .title,
    .name,
    .seat,
    .time {
      text-transform: uppercase;
      font-weight: normal;
    }

    .title h2,
    .name h2,
    .seat h2,
    .time h2 {
      font-size: 0.9em;
      color: #525252;
      margin: 0;
    }

    .title span,
    .name span,
    .seat span,
    .time span {
      font-size: 0.7em;
      color: #a2aeae;
    }

    .title {
      margin: 2em 0 0 0;
    }

    .name,
    .seat {
      margin: 0.7em 0 0 0;
    }

    .time {
      margin: 0.7em 0 0 1em;
    }

    .seat,
    .time {
      float: left;
    }

    .eye {
      position: relative;
      width: 2em;
      height: 1.5em;
      background: #fff;
      margin: 0 auto;
      border-radius: 1em/0.6em;
      z-index: 1;
      visibility: hidden;
    }

    .eye-before,
    .eye-after {
      content: "";
      display: block;
      position: absolute;
      border-radius: 50%;
    }

    .eye-before {
      width: 1em;
      height: 1em;
      background: #e84c3d;
      z-index: 2 !important;
      left: 8px !important;
      top: 4px !important;
    }

    .eye-after {
      width: 0.5em;
      height: 0.5em;
      background: #fff;
      z-index: 3 !important;
      left: 12px !important;
      top: 8px !important;
    }

    /*.eye:before, .eye:after {
     content: "";
     display: block;
     position: absolute;
     border-radius: 50%;
}
 .eye:before {
     width: 1em;
     height: 1em;
     background: #e84c3d;
     z-index: 2;
     left: 8px;
     top: 4px;
}
 .eye:after {
     width: 0.5em;
     height: 0.5em;
     background: #fff;
     z-index: 3;
     left: 12px;
     top: 8px;
}*/

    .number {
      text-align: center;
      text-transform: uppercase;
    }

    .number h3 {
      color: #e84c3d;
      margin: 0.9em 0 0 0;
      font-size: 2.5em;
    }

    .number span {
      display: block;
      color: #a2aeae;
    }

    .barcode {
      height: 2em;
      width: 0;
      margin: 1.2em 0 0 0.8em;
      box-shadow: 1px 0 0 1px #343434, 5px 0 0 1px #343434, 10px 0 0 1px #343434, 11px 0 0 1px #343434, 15px 0 0 1px #343434, 18px 0 0 1px #343434, 22px 0 0 1px #343434, 23px 0 0 1px #343434, 26px 0 0 1px #343434, 30px 0 0 1px #343434, 35px 0 0 1px #343434, 37px 0 0 1px #343434, 41px 0 0 1px #343434, 44px 0 0 1px #343434, 47px 0 0 1px #343434, 51px 0 0 1px #343434, 56px 0 0 1px #343434, 59px 0 0 1px #343434, 64px 0 0 1px #343434, 68px 0 0 1px #343434, 72px 0 0 1px #343434, 74px 0 0 1px #343434, 77px 0 0 1px #343434, 81px 0 0 1px #343434;
    }
  </style>
</head>

<body bgcolor="#ffffff">

  <div align="center">
    <table class="body-wrap w320">
      <tr>
        <td></td>
        <td class="container">
          <div class="content">
            <table cellspacing="0">
              <tr>
                <td>
                  <table class="body">
                    <tr>
                      <td class="body-padding"></td>
                      <td class="body-padded">
                        <div class="body-title">Hello {{ username }}, we have received your request to book ticket.</div>
                        <table class="body-text">
                          <tr>
                            <td class="body-text-cell">
                              Kindly click the following button to confirm your booked.
                            </td>

                          </tr>
                        </table>
                        
                        <table cellspacing="0" cellpadding="0" width="100%">
                        <div style="text-align:left;">
                          <a href="{{ confirm_link }}" style="background-color:#41CC00;background-image:url(https://www.filepicker.io/api/file/N8GiNGsmT6mK6ORk00S7);border:1px solid #407429;border-radius:4px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:17px;font-weight:bold;text-shadow: -1px -1px #47A54B;line-height:38px;text-align:center;text-decoration:none;width:190px;-webkit-text-size-adjust:none;mso-hide:all;">Confirm</a>
                        </div>
                          {{ seats }}
                        </table>
                        
                        <table class="body-signature-block">
                          <tr>
                            <td class="body-signature-cell">
                              <p>Thanks so much,</p>
                              <p class="body-signature"><img src="https://www.filepicker.io/api/file/2R9HpqboTPaB4NyF35xt" alt="Cinema"></p>
                            </td>
                          </tr>
                        </table>
                      </td>
                      <td class="body-padding"></td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </div>
        </td>
        <td></td>
      </tr>
    </table>
  </div>

</body>

</html>