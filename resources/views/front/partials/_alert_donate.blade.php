@if (session()->has('alert.status'))
    <div class="alert alert-{{ session()->get('alert.status') }} alert-dismissible mb-0 text-center">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

        @if(session()->get('alert.status') == 'success')
            @php
                $user = \Modules\Ums\Entities\User::find(auth()->user()->id)->personalInfo;
                $data = session()->get('data');
            @endphp

            <div style="width: 100%">
                <div id="ssDiv"
                    style="text-align: center;
                    margin: auto;
                    padding: 10px;
                    background: #d4edda;
                    width: fit-content;
                    "
                >
                    <h1 style="color: #F15B43">
                        Hallo {{ $user->first_name }} {{ $user->last_name }},
                    </h1>
                    <h3>
                        deine Spende in Höhe von <span style="color: #F15B43; font-weight: bold; font-size: 36px;">{{ $data->amount ?? '0' }}</span> Euro für {{ $data->case->title ?? 'ALL CASE' }} via {{ $globalSite->title ?? 'DYCER' }} war erfolgreich!
                    </h3>
                    <div>
                        <img src="{{ $globalSite->logo->file_url ?? config('core.image.default.logo') }}" style="height: 70px; margin-top: 10px" alt="">
                    </div>
                </div>
            </div>

            <div>
                <div class="post-share-icon text-right">
                    <a id="download-ss" class="btn btn-info mr-10" download>Download</a>
                    <span style="margin-right: 0; ">Share: </span>
                    <a onclick="facebook()" style="cursor: pointer;"><i class="fab fa-facebook-f"></i></a>
                    <a onclick="twitter()" style="cursor: pointer;"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            <script>
                function facebook(){
                    let imgSrc = document.querySelector('meta[property="og:image"]').getAttribute("content");
                    window.open("https://www.facebook.com/sharer/sharer.php?u="+encodeURIComponent(imgSrc), "pop", "width=600, height=400, scrollbars=no");

                    return false;
                }
                function twitter(){
                    let imgSrc = document.querySelector('meta[property="og:image"]').getAttribute("content");
                    window.open("http://twitter.com/share?text={{ $case->title ?? 'DYCER' }}&url="+encodeURIComponent(imgSrc), "pop", "width=600, height=400, scrollbars=no");

                    return false;
                }
            </script>

        @else
            <h5><i class="icon fas {{ session()->get('alert.icon') }}"></i> {{ session()->get('alert.title') }}</h5>
            {{ session()->get('alert.body') }}
        @endif
    </div>
@endif
