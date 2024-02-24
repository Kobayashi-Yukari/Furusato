<div class="container ml-md-4">
    <div class="accordion accordion-flush border">
        <div class="accordion-item">
            <a href="{{route('admin.home')}}" class="accordion-button collapsed no-after"><i class="bi bi-house"></i><span>ホーム</span></a>
        </div>
        <div id="accordionSideFlush01">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-side-heading02">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-side-collapse02" aria-expanded="true" aria-controls="flush-side-collapse02">
                        <i class="bi bi-building me-2"></i>顧客会社
                    </button>
                </h2>
                <div id="flush-side-collapse02" class="accordion-collapse collapse show" aria-labelledby="flush-side-heading02"
                    data-bs-parent="#accordionSideFlush01">
                    <a href="{{route('admin.m_companies.create')}}" class="accordion-button collapsed no-after"><span>登録</span></a>
                    <a href="{{route('admin.m_companies.index')}}" class="accordion-button collapsed no-after"><span>一覧</span></a>
                </div>
            </div>
        </div>
        @if (request()->query('m_company_id'))
            <div id="accordionSideFlush02">
                {{-- 事務局（customers） --}}
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-side-heading03">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-side-collapse03" aria-expanded="true" aria-controls="flush-side-collapse03">
                            <i class="bi bi-person me-2"></i>事務局
                        </button>
                    </h2>
                    <div id="flush-side-collapse03" class="accordion-collapse collapse show" aria-labelledby="flush-side-heading03"
                        data-bs-parent="#accordionSideFlush02">
                        <a href="{{route('admin.customers.create', ['m_company_id' => request()->query('m_company_id')])}}" class="accordion-button collapsed no-after"><span>登録</span></a>
                        <a href="{{route('admin.customers.index', ['m_company_id' => request()->query('m_company_id')])}}" class="accordion-button collapsed no-after"><span>一覧</span></a>
                    </div>
                </div>
            </div>
        @endif
        <div id="accordionSideFlush03">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-side-heading04">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-side-collapse04" aria-expanded="true" aria-controls="flush-side-collapse04">
                        <i class="bi bi-person me-2"></i>コンサルタント
                    </button>
                </h2>
                <div id="flush-side-collapse04" class="accordion-collapse collapse show" aria-labelledby="flush-side-heading04"
                    data-bs-parent="#accordionSideFlush03">
                    <a href="{{route('admin.admins.create')}}" class="accordion-button collapsed no-after"><span>登録</span></a>
                    <a href="{{route('admin.admins.index')}}" class="accordion-button collapsed no-after"><span>一覧</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
