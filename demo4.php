﻿
<!DOCTYPE html>
<html>
<head>
    <title>Demo 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="4/thumbnail-slider.css" rel="stylesheet" type="text/css" />
    <link href="4/ninja-slider.css" rel="stylesheet" type="text/css" />
    <script src="4/thumbnail-slider.js" type="text/javascript"></script>
    <script src="4/ninja-slider.js" type="text/javascript"></script>
    <style>
        body {font: normal 0.9em Arial;margin:0;}
        a {color:#1155CC;}
        ul li {padding: 10px 0;}
        header {display:block;padding:60px 0 10px;background:rgba(0,0,0,0.8);text-align:center;}
        header a {
            font-family: sans-serif;
            font-size: 24px;
            line-height: 24px;
            padding: 8px 13px 7px;
            color: #555;
            text-decoration:none;
            transition: color 0.7s;
        }
        header a.active {
            font-weight:bold;
            width: 24px;
            height: 24px;
            padding: 4px;
            text-align: center;
            display:inline-block;
            border-radius: 50%;
            background: #4d5256;
            color: #191919;
        }
        code {display:block;white-space:pre; background-color:#f6f6f6;padding:8px; overflow:auto;border:1px dotted #999;margin:6px 0;}
    </style>
</head>
<body>
    
    <!--start-->
    <div id='ninja-slider'>
        <div>
            <div class="slider-inner">
                <ul>
                    <li><a class="ns-img" href="img/1.jpg"></a></li>
                    <li><a class="ns-img" href="img/2.jpg"></a></li>
                    <li><a class="ns-img" href="img/3.jpg"></a></li>
                    <li><a class="ns-img" href="img/4.jpg"></a></li>
                  
                </ul>
                <div class="fs-icon" title="Expand/Close"></div>
            </div>
            <div id="thumbnail-slider">
                <div class="inner">
                    <ul>
                      
                        <li>
                            <a class="thumb" href="img/1.jpg"></a>
                          
                        </li>
                        <li>
                            <a class="thumb" href="img/2.jpg"></a>
                            
                        </li>
                        <li>
                            <a class="thumb" href="img/3.jpg"></a>
                           
                        <li>
                            <a class="thumb" href="img/4.jpg"></a>
                            
                        </li>
                       
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--end-->
    
</body>
</html>
