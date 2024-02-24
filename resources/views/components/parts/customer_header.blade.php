<nav class="navbar navbar-expand-md navbar-light shadow-sm bg-success">
    <div class="container" style="max-width:100%;">
        <div class="d-flex align-items-center gap-2">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('customer.home') }}">
              <img src="{{ asset('images/logo.png') }}" alt="" width="120">
                <div class="mt-2">
                    <span class="text-white">/</span>
                    <span class="text-white">事務局管理画面</span>
                </div>
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon color-white"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            @if(Auth::guard('customer')->check())
                @if (request()->query('project_id'))
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('customer.projects.home', ['project_id' => request()->query('project_id')]) }}">プロジェクトホームへ戻る</a>
                        </li>
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link text-white" href="{{ route('customer.users.bulk_create', ['project_id' => request()->query('project_id')]) }}">
                                受検者名簿リストアップロード
                            </a>
                        </li> --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                受検者
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                {{-- <li><a class="dropdown-item" href="{{ route('customer.users.create',['project_id' => request()->query('project_id')]) }}">個別登録</a></li> --}}
                                <li><a class="dropdown-item" href="{{ route('customer.users.index',['project_id' => request()->query('project_id')]) }}">一覧</a></li>
                            </ul>
                        </li>
                        @if($surveyProjects->isNotEmpty())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    回答一覧を見る
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach ( $surveyProjects as $surveyProject )
                                        @if($surveyProject->id === App\Enums\SurveyType::KOJIN->value )
                                            <li><a class="dropdown-item" href="{{ route('customer.survey_answers.index', ['project_id' => request('project_id'), 'survey_id' => App\Enums\SurveyType::KOJIN->value]) }}">営業スキル診断（本人回答用）</a></li>
                                        @endif
                                        @if($surveyProject->id === App\Enums\SurveyType::ZYOSHI->value)
                                            <li><a class="dropdown-item" href="{{ route('customer.survey_answers.index_for_zyoshi', ['project_id' => request('project_id'), 'survey_id' => App\Enums\SurveyType::ZYOSHI->value]) }}">営業スキル診断（上司回答用）</a></li>
                                        @endif
                                        @if($surveyProject->id === App\Enums\SurveyType::SOSHIKI->value)
                                            <li><a class="dropdown-item" href="{{ route('customer.survey_answers.index', ['project_id' => request('project_id'), 'survey_id' => App\Enums\SurveyType::SOSHIKI->value]) }}">営業組織診断</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                                <li class="nav-item dropdown">
                                    <a class="nav-link  text-white" href="{{ route('customer.users.survey_answers', ['project_id' => request()->query('project_id')]) }}">
                                        受検者の回答状況確認
                                    </a>
                                </li>
                            </li>
                        @endif
                    </ul>
                @endif
            @endif
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto" style="gap: 20px;">
                <!-- Authentication Links -->
                @unless(Auth::guard('customer')->check())
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('customer.login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()?->name ?? '' }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="left:auto; right:0;">
                            <a class="dropdown-item" href="{{ route('customer.logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('customer.logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="{{ route('customer.passwords.edit') }}">パスワード変更</a>
                        </div>
                    </li>
                @endunless
            </ul>
        </div>
    </div>
</nav>
