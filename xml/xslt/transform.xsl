<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <title>Transformed Content</title>
            </head>
            <body>
                <h1>My Articles</h1>
                <ul>
                    <xsl:for-each select="articles/article">
                        <li>
                            <h2><xsl:value-of select="title"/></h2>
                            <p><xsl:value-of select="content"/></p>
                        </li>
                    </xsl:for-each>
                </ul>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
