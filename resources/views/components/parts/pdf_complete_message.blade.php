<form id="myForm" action="{{ route('admin.survey_answers.pdf_progress_bar_update') }}" method="post">
    @csrf
    <input type="hidden" name="session" value="delete_ok">
</form>
<div id="message" class="alert alert-success py-2 text-center" role="alert">
    <p class="mb-1 mt-3">
        <button class="btn text-primary p-0" onclick="closeMessage()">{{ $projectName }}</button>の個人レポートの作成が完了しました。
    </p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="closeMessage();"></button>
</div>
</div>
<script>
    function closeMessage() {
        const messageElement = document.getElementById('message');
        if (messageElement) {
            messageElement.style.display = 'none';
        }
        // Call 'submitForm' after a delay
        setTimeout(submitForm, 10);  // 0.01 seconds
    }

    // フォーム送信のための新しい関数
    function submitForm() {
        const formElement = document.getElementById('myForm');
        if (formElement) {
            formElement.submit();
        }
    }
</script>