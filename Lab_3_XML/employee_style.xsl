<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
    <html>
      <head>
        <style type="text/css">
          body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
          }
          h1 {
            color: #333;
            text-align: center;
          }
          table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #ddd;
          }
          th, td {
            padding: 10px;
            border: 1px solid #ddd;
          }
          th {
            background-color: #f2f2f2;
          }
          ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
          }
          li {
            margin-bottom: 5px;
          }
        </style>
      </head>
      <body>
        <h1>Employees Details</h1>
        <table>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Numbers</th>
            <th>Addresses</th>
          </tr>
          <xsl:apply-templates select="employees/employee"/>
        </table>
      </body>
    </html>
  </xsl:template>

  <xsl:template match="employee">
    <tr>
      <td><xsl:value-of select="name"/></td>
      <td><xsl:value-of select="email"/></td>
      <td>
        <ul>
          <xsl:apply-templates select="phones/phone"/>
        </ul>
      </td>
      <td>
        <ul>
          <xsl:apply-templates select="addresses/address"/>
        </ul>
      </td>
    </tr>
  </xsl:template>

  <xsl:template match="phone">
    <li><xsl:value-of select="."/></li>
  </xsl:template>

  <xsl:template match="address">
  <li>
    <xsl:value-of select="building_number"/> <xsl:text> </xsl:text><xsl:value-of select="street"/>, <xsl:value-of select="city"/>, <xsl:value-of select="region"/>, <xsl:value-of select="country"/>
  </li>
  </xsl:template>

</xsl:stylesheet>
