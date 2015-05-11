<?php
include(__DIR__ .'/class/Quereable.php');
$quer = new Quereable();
$rows = $quer->GetParam1();
$coms = $quer->GetParam2();
$tows = $quer->GetBoth();
session_start();

// kill the page if the access variable doesn't exists
//            or if the access variable does exist but is not set to true

?>
<!DOCTYPE html>
<html>
<head>
    <title>Imprimir Reporte</title>
    <style>
        *
        {
            margin:0;
            padding:0;
            font-family:Arial;
            font-size:10pt;
            color:#000;
        }
        body
        {
            width:100%;
            font-family:Arial;
            font-size:10pt;
            margin:0;
            padding:0;
        }

        p
        {
            margin:0;
            padding:0;
        }

        #wrapper
        {
            width:180mm;
            margin:0 15mm;
        }

        .page
        {
            height:297mm;
            width:210mm;
            page-break-after:always;
        }

        table
        {
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;

            border-spacing:0;
            border-collapse: collapse;

        }

        table td
        {
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding: 2mm;
        }

        table.heading
        {
            height:50mm;
        }

        h1.heading
        {
            font-size:14pt;
            color:#000;
            font-weight:normal;
        }

        h2.heading
        {
            font-size:9pt;
            color:#000;
            font-weight:normal;
        }

        hr
        {
            color:#ccc;
            background:#ccc;
        }

        #invoice_body
        {
            height: 149mm;
        }

        #invoice_body , #invoice_total
        {
            width:100%;
        }
        #invoice_body table , #invoice_total table
        {
            width:100%;
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;

            border-spacing:0;
            border-collapse: collapse;

            margin-top:5mm;
        }

        #invoice_body table td , #invoice_total table td
        {
            text-align:center;
            font-size:9pt;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding:2mm 0;
        }

        #invoice_body table td.mono  , #invoice_total table td.mono
        {
            font-family:monospace;
            text-align:right;
            padding-right:3mm;
            font-size:10pt;
        }

        #footer
        {
            width:180mm;
            margin:0 15mm;
            padding-bottom:3mm;
        }
        #footer table
        {
            width:100%;
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;

            background:#eee;

            border-spacing:0;
            border-collapse: collapse;
        }
        #footer table td
        {
            width:25%;
            text-align:center;
            font-size:9pt;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>
<div id="wrapper">

    <h1 style="text-align:center; font-weight:bold; padding-top:5mm;">Reporte busquedas.</h1>
    <h2 style="text-align:center; font-weight:bold; padding-top:5mm;">Estadistiscas de busquedas por Categoria</h2>
    <br />



    <div id="content">

        <div id="invoice_body">
            <table>
            <tr style="background:#eee;">
                <td><b>Categoria</b></td>
                <td style="width:15%;"><b>Total busquedas</b></td>

            </tr>
            <?php
            foreach($rows as $row)
            {?>
                             <tr>
                               <td><?php echo($row['Categoria']);?></td>

                                              <td><?php echo($row['Total Busquedas']);?></td>
                                            </tr><?php
                                          }

                                       ?>

            </table>
            <h2 style="text-align:center; font-weight:bold; padding-top:5mm;">Estadisticas de busquedas por Comuna</h2>
            <br />
            <div >
                <table>
                <tr style="background:#eee;">
                    <td><b>Comuna</b></td>
                    <td style="width:15%;"><b>Total busquedas</b></td>

                </tr>
                <?php
                foreach($coms as $com)
    {?>
      <tr>
                  <td><?php echo($com['Comuna']);?></td>
                     <td><?php echo($com['Total Busquedas']);?></td>
                   </tr><?php
                 }

              ?>
                </table>
                <h2 style="text-align:center; font-weight:bold; padding-top:5mm;">Estadisticas de busquedas por Categoria
                  y Comuna</h2>
                <br />
                <div >
                    <table>
                    <tr style="background:#eee;">
                      <td><b>Categoria</b></td>
                        <td><b>Comuna</b></td>
                        <td style="width:15%;"><b>Total busquedas</b></td>

                    </tr>
                    <?php

                    foreach($tows as $tow)
        {?>
                         <tr>
                           <td><?php echo($tow['Categoria']);?></td>
                                       <td><?php echo($tow['Comuna']);?></td>
                                          <td><?php echo($tow['Total Busquedas']);?></td>
                                        </tr><?php
                                      }

                                   ?>
                    </table>
                    <br/>
                  </body>
                  </html>
