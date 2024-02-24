<div class="container ml-md-4">
  <div class="list-group shadow-sm">
      <a href="{{ route('user.home') }}" class="list-group-item list-group-item-action sidebar__item__white">
          <i class="fa fa-home me-2"></i>Home
      </a>


      <ul class="list-group list-group-flush accordion" id="accordion">
          <button class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-target="#shop-setting" aria-expanded="true" aria-controls="collapse_setting">
              <i class="fas fa-tools me-2"></i>管理項目
              <span class="float-right">▼</span>
          </button>
          <li id="shop-setting" class="collapse list-group-item p-0" aria-labelledby="heading_setting" data-bs-parent="#accordion">
              <ul class="list-group list-group-flush">
                  <li class="list-group-item list-group-item-action p-0 border-0">
                      <button class="list-group-item list-group-item-action pl-5" type="button" data-bs-toggle="collapse" data-bs-target="#largePartCategory" aria-expanded="false" aria-controls="largePartCategory">
                          管理項目①
                          <span class="float-right">▼</span>
                      </button>
                      <a class="text-secondary" href="#">
                          <li id="largePartCategory" class="collapse list-group-item p-0">
                              <ul class="list-group list-group-flush">
                                  <li class="list-group-item list-group-item-action" style="padding-left: 80px;">
                                      <i class="fas fa-chevron-right me-2">登録</i>
                                  </li>
                              </ul>
                          </li>
                      </a>
                  </li>
              </ul>
          </li>
      </ul>


  </div>
</div>
