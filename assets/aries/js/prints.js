    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'Print Window', 'height=auto, width=auto');
        mywindow.document.write('<html><head><title>YApps Ltd.</title>');
        /*optional stylesheet*/ //
        mywindow.document.write('<link href="http://localhost/yapps/assets/themes/printtable.css" rel="stylesheet" type="text/css" media="all"/>');
        //mywindow.document.write('<link href="http://localhost/yapps/assets/aries/css/stylesheet.css" rel="stylesheet" type="text/css" media="all"/>');
        //mywindow.document.write('<style> body { background-color: linen; color: Black;} </style>');

        mywindow.document.write('<body><div class="wrapper"><div class="body" style=""><div class="content">');
        //mywindow.document.write('<a href="javascript:window.print()">Print</a>');
        mywindow.document.write(data);
        mywindow.document.write('</div></div></div></body>');

        mywindow.focus();
        //mywindow.print();
        //mywindow.close();

        return true;
    }

    

    // Example Print Button ==> <input type="button" value="Print Div" onclick="PrintElem('#mydiv')" />