<!DOCTYPE html>
<html lang="ja">
<body>
    <h1>Binary Image Sample</h1>
    <img id="image" src="https://s3testbaket-0320.s3.ap-northeast-1.amazonaws.com/export.png" alt="binary image" />
    <button onclick="showImage()">click</button>
    <script>
    function showImage() {
        const raw = JSON.stringify({image: 'sample.png'});
        const myHeaders = new Headers();
        myHeaders.append('Content-Type', 'application/json');
        const requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: raw,
        redirect: 'follow',
        };
        fetch('https://API_GATEWAY_ID.execute-api.ap-northeast-1.amazonaws.com/test', requestOptions)
        .then(response => response.text())
        .then(result => {
            const binaryData = JSON.parse(result).body;
            const imgElem = document.getElementById('image');
            imgElem.src = "data:image/png;base64," + binaryData;
        })
        .catch(error => {
            console.log(error);
        });
    }
    </script>
</body>
</html>
