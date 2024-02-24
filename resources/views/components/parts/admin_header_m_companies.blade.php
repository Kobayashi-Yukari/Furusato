<nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
    <div class="container" style="max-width:100%;">
        <div class="d-flex align-items-center gap-2">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('admin.home') }}">
              <img src="{{ asset('images/logo.png') }}" alt="" width="120">
                <div class="mt-2">
                    <span class="text-white">/</span>
                    <span class="text-white">TORiX管理画面</span>
                </div>
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon color-white"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            @if (Auth::guard('admin')->check())
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if (request()->query('project_id'))
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="{{route('admin.projects.home',['m_company_id' => request()->query('m_company_id'), 'project_id' => request()->query('project_id')])}}">プロジェクトホームへ戻る</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link  text-white" href="{{ route('admin.users.bulk_create', ['m_company_id' => request()->query('m_company_id'), 'project_id' => request()->query('project_id')]) }}">
                            受検者名簿リストアップロード
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link  text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            受検者
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            {{-- <li><a class="dropdown-item" href="{{ route('admin.users.create',['m_company_id' => request()->query('m_company_id'), 'project_id' => request()->query('project_id')]) }}">個別登録</a></li> --}}
                            <li><a class="dropdown-item" href="{{ route('admin.users.index',['m_company_id' => request()->query('m_company_id'), 'project_id' => request()->query('project_id')]) }}">一覧</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link  text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            回答一覧を見る
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('admin.survey_answers.index',['m_company_id' => request()->query('m_company_id'), 'project_id' => request()->query('project_id'), 'survey_id' => \App\Enums\SurveyType::KOJIN]) }}">営業スキル診断（本人回答用）</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.survey_answers.index_for_zyoshi',['m_company_id' => request()->query('m_company_id'), 'project_id' => request()->query('project_id'), 'survey_id' => \App\Enums\SurveyType::ZYOSHI]) }}">営業スキル診断（上司回答用）</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.survey_answers.index',['m_company_id' => request()->query('m_company_id'), 'project_id' => request()->query('project_id'), 'survey_id' => \App\Enums\SurveyType::SOSHIKI]) }}">営業組織診断</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link  text-white" href="{{ route('admin.users.survey_answers', ['m_company_id' => request()->query('m_company_id'), 'project_id' => request()->query('project_id')]) }}">
                            受検者の回答状況確認
                        </a>
                    </li>
                    @endif
                </ul>
            @endif

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto" style="gap: 20px;">
                <!-- Authentication Links -->
                @unless(Auth::guard('admin')->check())
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()?->name ?? '' }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="left:auto; right:0;">
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="{{ route('admin.passwords.edit') }}">パスワード変更</a>
                        </div>
                    </li>
                @endunless
            </ul>
        </div>
    </div>
</nav>
