
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
  <xsl:param name="lang" select="'fr'" />
  <xsl:output method="html" encoding="UTF-8" indent="yes"/>

  <xsl:template match="/">
    <html xmlns="http://www.w3.org/1999/xhtml">
      <head>
        <title>Portfolio multilingue - XSLT</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="style.css" />
        <style>
          body {{ font-family: 'Segoe UI', sans-serif; padding: 20px; background-color: #f8f9fa; }}
          h1 {{ color: #2c3e50; }}
          h2 {{ color: #34495e; margin-top: 30px; }}
          ul {{ list-style: square; }}
          .section {{ background: #fff; padding: 20px; margin-bottom: 2em; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }}
          .lang-menu {{ margin-bottom: 20px; }}
          .passion-img {{ width: 100px; height: auto; margin-top: 5px; border-radius: 6px; box-shadow: 0 0 5px rgba(0,0,0,0.1); }}
          .project-img {{ width: 180px; height: auto; margin: 5px; border: 1px solid #ccc; border-radius: 8px; }}
        </style>
      </head>
      <body>
        <div class="lang-menu">
          <strong>Langue :</strong>
          <a href="?lang=fr">Français</a> |
          <a href="?lang=en">English</a> |
          <a href="?lang=ar">العربية</a>
        </div>
        <xsl:for-each select="portfolio/profil[@lang = $lang]">
          <div class="section">
            <h1><xsl:value-of select="nom"/> - <xsl:value-of select="@lang"/></h1>
            <p><strong>Ville:</strong> <xsl:value-of select="ville"/></p>
            <p><strong>Email:</strong> <xsl:value-of select="email"/></p>
            <p><strong>Présentation:</strong> <xsl:value-of select="presentation"/></p>

            <h2>Compétences</h2>
            <ul>
              <xsl:for-each select="competences/competence">
                <li><xsl:value-of select="."/></li>
              </xsl:for-each>
            </ul>

            <h2>Passions</h2>
            <ul>
              <xsl:for-each select="passions/passion">
                <li>
                  <xsl:value-of select="."/>
                  <br/>
                  <xsl:if test="@id">
                    <!-- Essaye d'abord .jpg puis .jpeg -->
                    <img src="images/{@id}.jpg" alt="{@id}" class="passion-img"
                         onerror="this.onerror=null;this.src='images/{@id}.jpeg';" />
                  </xsl:if>
                </li>
              </xsl:for-each>
            </ul>

            <h2>Projet</h2>
            <xsl:for-each select="projets/projet">
              <p><strong><xsl:value-of select="titre"/></strong></p>
              <p><xsl:value-of select="description"/></p>
              <p><strong>Technologies:</strong> <xsl:value-of select="technos"/></p>
              <h3>Images</h3>
              <div>
                <xsl:for-each select="images/img">
                  <img src="{.}" alt="image projet" class="project-img"/>
                </xsl:for-each>
              </div>
            </xsl:for-each>
          </div>
        </xsl:for-each>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
