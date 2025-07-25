<!DOCTYPE html>
<html>
<head>
    <script src="jquery-1.11.3.min.js"></script>
</head>
<body>
<h1>Pure JS Barcode Reader</h1>
<div>Barcode result: <span id="dbr"></span></div>
<div class="select">
    <label for="videoSource">Video source: </label><select id="videoSource"></select>
</div>
<button id="go">Read Barcode</button>
<div>
    <video muted autoplay id="video" playsinline="true"></video>
    <canvas id="pcCanvas" width="640" height="480" style="display: none; float: bottom;"></canvas>
    <canvas id="mobileCanvas" width="240" height="320" style="display: none; float: bottom;"></canvas>
</div>
<div id="codice"></div>
</body>

<script async src="zxing.js"></script>
<script src="video.js"></script>
</html>