<!DOCTYPE html>
<html lang="ja">
<body>
    <button id="loadImage">Click to Load Image</button>
    <div id="imageContainer"></div>

    <script>
        document.getElementById("loadImage").addEventListener("click", function() {
            fetch('https://zxds7eddl6.execute-api.ap-northeast-1.amazonaws.com/test/test')
            .then(response => response.json())
            .then(data => {
                document.getElementById("imageContainer").innerHTML = `<img src="${data.imageUrl}" alt="Image">`;
                console.log(ata.imageUrl);
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
