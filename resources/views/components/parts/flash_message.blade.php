<div id="flash_message">
    @if(Session::has('flash_alert'))
        <div ref="flashMessage" @click="hide=true" :class="{'d-none':hide}" class="alert alert-danger m-0 text-center" style="position: fixed; top: 10%; left:0; right:0; width: 100%; z-index: 9999;">
            {!! Session::get('flash_alert') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('status'))
        <!-- <div ref="flashMessage" @click="hide=true" :class="{'d-none':hide}" class="alert alert-success m-0 text-center" style="position: fixed; top: 10%; left:0; right:0; width: 100%; z-index: 9999;"> -->
        <div ref="flashMessage" @click="hide=true" :class="{'d-none':hide}" class="alert alert-success" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('status-danger'))
        <div ref="flashMessage" @click="hide=true" :class="{'d-none':hide}" class="alert alert-danger m-0 text-center" style="position: fixed; top: 10%; left:0; right:0; width: 100%; z-index: 9999;">
            {{ session('status-danger') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>


@section('flash_message_script')
<script>
    Vue.createApp({
        data() {
            return {
                hide: false,
            }
        },
        mounted(){
            /* フラッシュメッセージを2.5秒あとに消す */
            // if(this.$refs.flashMessage){
            //     setTimeout(() => {
            //         this.hide = true;
            //     },4500);
            // }
        }
    }).mount('#flash_message');
</script>
@endsection
