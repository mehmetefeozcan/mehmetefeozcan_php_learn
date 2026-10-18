<div class="modal fade" id="lessonInfoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Ders Detayı</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Öğretim Elemanı:</strong> <span id="modalStaff"></span></p>
                <p><strong>Zaman:</strong> <span id="modalDay"></span> / <span id="modalTime"></span></p>
                <hr>
                <p><strong>Ders İçeriği / Detayı:</strong></p>
                <p class="text-muted" id="modalDetail"></p>
            </div>
            <div class="modal-footer">
                <a role="button" class="btn btn-warning" id="modalLink" target="_blank" href="#">EBS</a>
                <button type=" button" class="btn btn-danger" data-bs-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>