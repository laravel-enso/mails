<!doctype html>
<html lang="und" dir="auto" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
  <head>
    <title>{{ config('enso.mails.brand.name') }}</title>
    <!--[if !mso]><!-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
      #outlook a { padding:0; }
      body { margin:0;padding:0;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%; }
      table, td { border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt; }
      img { border:0;height:auto;line-height:100%; outline:none;text-decoration:none;-ms-interpolation-mode:bicubic; }
      p { display:block;margin:13px 0; }
    </style>
    <!--[if mso]>
    <noscript>
    <xml>
    <o:OfficeDocumentSettings>
      <o:AllowPNG/>
      <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
    </xml>
    </noscript>
    <![endif]-->
    <!--[if lte mso 11]>
    <style type="text/css">
      .mj-outlook-group-fix { width:100% !important; }
    </style>
    <![endif]-->
    
    
    <style type="text/css">
      @media only screen and (min-width:480px) {
        .mj-column-per-100 { width:100% !important; max-width: 100%; }
      }
    </style>
    <style media="screen and (min-width:480px)">
      .moz-text-html .mj-column-per-100 { width:100% !important; max-width: 100%; }
    </style>
    
    
  
    
     
    <style type="text/css">
@media only screen and (max-width: 480px) {
        .enso-mail-frame { padding: 32px 0 48px !important; }
        .enso-mail-card { width: calc(100% - 12px) !important; }
        .enso-mail-content-section > table > tbody > tr > td { padding: 30px 18px 24px !important; }
        .enso-mail-header-left { padding: 22px 18px !important; }
        .enso-mail-header-right { padding: 22px 18px !important; }
        .enso-mail-footer-cell { padding-left: 18px !important; padding-right: 18px !important; }
      }
    </style>
    
  </head>
  <body style="word-spacing:normal;background-color:{{ config('enso.mails.layout.background') }};">
    
    <div style="display:none;font-size:1px;color:#ffffff;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;">{{ config('enso.mails.brand.name') }}</div>
  
    
      <div class="enso-mail-frame" aria-label="{{ config('enso.mails.brand.name') }}" aria-roledescription="email" style="background-color:{{ config('enso.mails.layout.background') }}; padding: 56px 0 80px;" role="article" lang="und" dir="auto">
        
      
      <!--[if mso | IE]><table align="center" border="0" cellpadding="0" cellspacing="0" class="enso-mail-card-outlook" role="presentation" style="width:760px;" width="760" bgcolor="{{ config('enso.mails.layout.surface') }}" ><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
    
      
      <div class="enso-mail-card" style="width: calc(100% - 32px); box-shadow: 0 20px 48px rgba(32, 41, 56, .13), 0 2px 8px rgba(32, 41, 56, .06); background: {{ config('enso.mails.layout.surface') }}; background-color: {{ config('enso.mails.layout.surface') }}; margin: 0px auto; max-width: 760px; border-radius: {{ config('enso.mails.layout.card_radius') }}px; overflow: hidden;">
        
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius: {{ config('enso.mails.layout.card_radius') }}px; overflow: hidden; background: {{ config('enso.mails.layout.surface') }}; background-color: {{ config('enso.mails.layout.surface') }}; width: 100%; border-collapse: separate;" width="100%" bgcolor="{{ config('enso.mails.layout.surface') }}">
          <tbody>
            <tr>
              <td style="border:1px solid {{ config('enso.mails.layout.border') }};border-radius:{{ config('enso.mails.layout.card_radius') }}px;direction:ltr;font-size:0px;padding:0;text-align:center;">
                <!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><![endif]-->
                  
      @include('mail::header')
          <!--[if mso | IE]><tr><td class="enso-mail-content-section-outlook" width="760px" ><table align="center" border="0" cellpadding="0" cellspacing="0" class="enso-mail-content-section-outlook" role="presentation" style="width:758px;" width="758" bgcolor="{{ config('enso.mails.layout.surface') }}" ><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
    
      
      <div class="enso-mail-content-section" style="background:{{ config('enso.mails.layout.surface') }};background-color:{{ config('enso.mails.layout.surface') }};margin:0px auto;max-width:758px;">
        
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:{{ config('enso.mails.layout.surface') }};background-color:{{ config('enso.mails.layout.surface') }};width:100%;">
          <tbody>
            <tr>
              <td style="direction:ltr;font-size:0px;padding:28px 30px 24px;text-align:center;">
                <!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:698px;" ><![endif]-->
            
      <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
        
      <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
        <tbody>
          <tr>
            <td style="vertical-align:top;padding:0;">
              
      <table border="0" cellpadding="0" cellspacing="0" role="presentation" style width="100%">
        <tbody>
          
              <tr>
                <td align="left" style="font-size:0px;padding:0;word-break:break-word;">
                  
      <div style="font-family:{!! config('enso.mails.text.font_family') !!};font-size:14px;line-height:1.65;text-align:left;color:{{ config('enso.mails.text.body') }};">{{ Illuminate\Mail\Markdown::parse($slot) }}</div>
    
                </td>
              </tr>
            
        </tbody>
      </table>
    
            </td>
          </tr>
        </tbody>
      </table>
    
      </div>
    
          <!--[if mso | IE]></td></tr></table><![endif]-->
              </td>
            </tr>
          </tbody>
        </table>
        
      </div>
    
      
      <!--[if mso | IE]></td></tr></table></td></tr><![endif]-->
        @include('mail::footer')
    
                <!--[if mso | IE]></table><![endif]-->
              </td>
            </tr>
          </tbody>
        </table>
        
      </div>
    
      
      <!--[if mso | IE]></td></tr></table><![endif]-->
    
    
      </div>
    
  </body>
</html>
