<button type="button" id="modalButton" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#loadingModal">
  ローディング画面を表示
</button>

<div class="modal fade" id="loadingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="pointer-events: none;">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body d-flex justify-content-center">
        <div class="d-flex flex-column align-items-center gap-3">
            <div class="spinner-border text-primary" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
            <div class="text-center">
              {{ $message }}<br>
              そのままお待ちください。
            </div>
        </div>
      </div>
    </div>
  </div>
</div>