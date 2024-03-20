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
                // JSONからimageUrlの値を取得
                const imageUrl = data.imageUrl;
                // 画像を表示するためのimg要素を作成し、imageContainerに追加
                const imgElement = document.createElement("img");
                imgElement.src = imageUrl;
                imgElement.alt = "Image";
                document.getElementById("imageContainer").appendChild(imgElement);
                console.log(response.json());
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
