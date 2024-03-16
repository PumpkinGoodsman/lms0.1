
 
    <style>
        #container22 {
            position: relative;
            width: 200px;
            height: 200px;
            margin: auto;
            transform: rotate(45deg);
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }

        .test {
            width: 40vw;
            height: 40vh;
            position: relative;
            margin-top: 15%;
            left: 40%;
            
        }

        /* Glowing effect */
        .point {
            background-color: parrotgreen;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.7);
       
        }
    </style>
</head>

<body >
    <main >
        <div class="test">
            <canvas id="container22" width="200" height="200"></canvas>
        </div>
    </main>    

<script>
        var points = [],
        velocity2 = 5, // velocity squared
        canvas = document.getElementById('container22'),
        context = canvas.getContext('2d'),
        radius = 5,
        boundaryX = 200,
        boundaryY = 200,
        numberOfPoints = 30;

        init();

        function init() {
        // create points
        for (var i = 0; i < numberOfPoints; i++) {
            createPoint();
        }
        // create connections
        for (var i = 0, l = points.length; i < l; i++) {
            var point = points[i];
            if (i == 0) {
            points[i].buddy = points[points.length - 1];
            } else {
            points[i].buddy = points[i - 1];
            }
        }

        // animate
        animate();
        }

        function createPoint() {
        var point = {}, vx2, vy2;
        point.x = Math.random() * boundaryX;
        point.y = Math.random() * boundaryY;
        // random vx 
        point.vx = (Math.floor(Math.random()) * 2 - 1) * Math.random();
        vx2 = Math.pow(point.vx, 2);
        // vy^2 = velocity^2 - vx^2
        vy2 = velocity2 - vx2;
        point.vy = Math.sqrt(vy2) * (Math.random() * 2 - 1);
        points.push(point);
        }

        function resetVelocity(point, axis, dir) {
        var vx, vy;
        if (axis == 'x') {
            point.vx = dir * Math.random();
            vx2 = Math.pow(point.vx, 2);
            // vy^2 = velocity^2 - vx^2
            vy2 = velocity2 - vx2;
            point.vy = Math.sqrt(vy2) * (Math.random() * 2 - 1);
        } else {
            point.vy = dir * Math.random();
            vy2 = Math.pow(point.vy, 2);
            // vy^2 = velocity^2 - vx^2
            vx2 = velocity2 - vy2;
            point.vx = Math.sqrt(vx2) * (Math.random() * 2 - 1);
        }
        }

        function draw() {
        for (var i = 0, l = points.length; i < l; i++) {
            // circles
            var point = points[i];
            point.x += point.vx;
            point.y += point.vy;

            // Draw glowing points
            context.beginPath();
            context.arc(point.x, point.y, radius, 0, 2 * Math.PI, false);
            context.shadowBlur = 10;
            context.shadowColor = "rgba(0, 255, 0, 0.7)";
            context.fillStyle = 'parrotgreen';
            context.fill();

            // lines
            drawLine(point.x, point.y, point.buddy.x, point.buddy.y);

            // check for edge
            if (point.x < 0 + radius) {
            resetVelocity(point, 'x', 1);
            } else if (point.x > boundaryX - radius) {
            resetVelocity(point, 'x', -1);
            } else if (point.y < 0 + radius) {
            resetVelocity(point, 'y', 1);
            } else if (point.y > boundaryY - radius) {
            resetVelocity(point, 'y', -1);
            }
        }
        }

        function drawLine(x1, y1, x2, y2) {
        context.beginPath();
        context.moveTo(x1, y1);
        context.lineTo(x2, y2);
        context.strokeStyle = 'parrotgreen';
        context.stroke();
        }

        function animate() {
        context.clearRect(0, 0, 200, 200);
        draw(); 
        requestAnimationFrame(animate);
        }
//#101E14
</script>

</body>

 