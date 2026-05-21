<mjml>
  <mj-head>
    <mj-title>ENSO_BRAND_NAME</mj-title>
    <mj-preview>ENSO_BRAND_NAME</mj-preview>

    <mj-attributes>
      <mj-all font-family="Inter, Arial, sans-serif" />
      <mj-body background-color="#F5F7FA" />
      <mj-section padding="0" />
      <mj-column padding="0" />
      <mj-text color="#4A4A4A" font-size="14px" line-height="1.65" padding="0" />
    </mj-attributes>

    <mj-style inline="inline">
      .enso-mail-card { box-shadow: 0 20px 48px rgba(32, 41, 56, .13), 0 2px 8px rgba(32, 41, 56, .06); }
      .enso-mail-card > table { border-radius: 18px; overflow: hidden; }
      h1 { color: #363636; font-size: 21px; font-weight: 700; line-height: 1.28; margin: 0 0 10px; }
      h2 { color: #363636; font-size: 18px; line-height: 1.3; margin: 0 0 8px; }
      h3 { color: #363636; font-size: 16px; line-height: 1.3; margin: 0 0 8px; }
      p { color: #4A4A4A; font-size: 14px; line-height: 1.5; margin: 0 0 8px !important; }
      a { color: #485FC7; }
      .table { border: 1px solid #DBDBDB; border-radius: 12px; overflow: hidden; }
      .table table { border-collapse: collapse; width: 100%; }
      .table th { background: #F5F7FA; border-bottom: 1px solid #DBDBDB; color: #7A7A7A; font-size: 10px; font-weight: 800; letter-spacing: .08em; padding: 9px 12px; text-align: left; text-transform: uppercase; }
      .table td { border-bottom: 1px solid #DBDBDB; color: #4A4A4A; font-size: 13px; padding: 9px 12px; vertical-align: top; }
    </mj-style>
  </mj-head>

  <mj-body width="ENSO_WIDTH">
    <mj-wrapper css-class="enso-mail-card" background-color="#FFFFFF" border="1px solid #DBDBDB" border-radius="18px" padding="0">
      <mj-raw>ENSO_HEADER</mj-raw>

      <mj-section background-color="#FFFFFF" padding="28px 30px 24px">
        <mj-column>
          <mj-text>ENSO_SLOT</mj-text>
          ENSO_SUBCOPY
        </mj-column>
      </mj-section>

      <mj-raw>ENSO_FOOTER</mj-raw>
    </mj-wrapper>
  </mj-body>
</mjml>
