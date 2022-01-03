<?xml version="1.0" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
    <html>
      <head>
        <title>Contact Us</title>

        <style>
          div.body {text-align: center}
        </style>
      </head>
      <body>
            <div class="body">
              <xsl:for-each select="contacts">
                <h1>Project: <xsl:value-of select="project"/></h1>
                <h2>App Name: <xsl:value-of select="appname"/></h2>
                <h3>Developer Name: <xsl:value-of select="name"/></h3>
                <h3>Email: <xsl:value-of select="email"/></h3>
                <h3>College: <xsl:value-of select="college"/></h3>
              </xsl:for-each>
            </div>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>