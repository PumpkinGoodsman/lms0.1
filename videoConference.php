<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Screen and Webcam Sharing</title>
    <style>
        .videoDiv {
            width:68vw;
            height: 60vh;
            margin-top: 6%;
             
        }

        video {
            width: 67vw;
            height: 59vh; 
        }
        #webcam{
            display: none;
        }
        .Button3333{
            background-color: #269524;
            color: white;
            border: none;
             
            border-radius: 3px;

        }
    </style>
</head>

<body>
    <div class="videoDiv">
        <video id="screenVideo" autoplay></video>
        <video id="webcam" autoplay></video>
    </div>

    <label  style="display:none;" for="screenList">Select Screen:</label>
    <select style="display:none;" id="screenList"></select>
    <button id="startButton2" class="Control_btn">Start Screen  </button>
    <button id="stopButton2"  class="Control_btn" disabled>Stop Screen</button>

    <button id="startButton" class="Control_btn">Start Webcam</button>
    <button id="stopButton" class="Control_btn" disabled>Stop Webcam</button>

    <script>
        const screenList = document.getElementById('screenList');
        const startButton2 = document.getElementById('startButton2');
        const stopButton2 = document.getElementById('stopButton2');
        const screenVideo = document.getElementById('screenVideo');
        const videoElement = document.getElementById('webcam');
        const startButton = document.getElementById('startButton');
        const stopButton = document.getElementById('stopButton');

        async function getScreenStream() {
            try {
                const stream = await navigator.mediaDevices.getDisplayMedia({ video: true });
                return stream;
            } catch (error) {
                console.error('Error accessing screen sharing:', error);
            }
        }

        async function populateScreenList() {
            const devices = await navigator.mediaDevices.enumerateDevices();
            devices.forEach(device => {
                if (device.kind === 'videoinput') {
                    const option = document.createElement('option');
                    option.value = device.deviceId;
                    option.text = device.label || `Camera ${screenList.length + 1}`;
                    screenList.appendChild(option);
                }
            });
        }
        function showWebCam() {
            document.getElementById('webcam').style.display = "block";
            document.getElementById('screenVideo').style.display = "none";
        }

        function hideWebCam() {
            document.getElementById('webcam').style.display = "none";
            document.getElementById('screenVideo').style.display = "block";
        }

        function showLiveScreen() {
            document.getElementById('webcam').style.display = "none";
            document.getElementById('screenVideo').style.display = "block";
        }

        function hideLiveScreen() {
            document.getElementById('webcam').style.display = "block";
            document.getElementById('screenVideo').style.display = "none";
        }

        async function startScreenSharing() {
            const deviceId = screenList.value;
            const stream = await getScreenStream();
            screenVideo.srcObject = stream;
            stopButton2.disabled = false;
            startButton2.disabled = true;
            hideWebCam();
            showLiveScreen();
        }

        function stopScreenSharing() {
            const tracks = screenVideo.srcObject.getTracks();
            tracks.forEach(track => track.stop());
            screenVideo.srcObject = null;
            stopButton2.disabled = true;
            startButton2.disabled = false;
            hideLiveScreen();
            showWebCam();
        }

        function startWebcam() {
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({ video: true })
                    .then(function (stream) {
                        videoElement.srcObject = stream;
                        startButton.disabled = true;
                        stopButton.disabled = false;
                    })
                    .catch(function (error) {
                        console.error('Error accessing the webcam:', error);
                    });
            } else {
                console.error('getUserMedia is not available in this browser.');
            }
            showWebCam();
            hideLiveScreen();
        }

        function stopWebcam() {
            const tracks = videoElement.srcObject.getTracks();
            tracks.forEach(track => track.stop());
            videoElement.srcObject = null;
            startButton.disabled = false;
            stopButton.disabled = true;
        }

        populateScreenList();

        startButton2.addEventListener('click', startScreenSharing);
        stopButton2.addEventListener('click', stopScreenSharing);
        startButton.addEventListener('click', startWebcam);
        stopButton.addEventListener('click', stopWebcam);
    </script>
</body>

</html>
