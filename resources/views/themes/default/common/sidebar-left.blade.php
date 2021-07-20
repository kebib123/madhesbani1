<div class="uk-width-1-3@m ">
    <!--  -->
{{--{{author_details($data->author)}}--}}
    <div class="uk-author ">
        <div class="uk-flex uk-flex-middle uk-grid-small uk-margin-small-bottom" uk-grid>
            <div class="uk-text-bold">
                <div>
                    <div class="uk-media-author-sm  uk-align-center uk-margin-remove-bottom">
                        <img src="{{asset('images/avatar.jpg')}}" alt="" class="uk-border-pill ">
                    </div>
                </div>
            </div>
            <div>
                <a href="author-profile.php" class="text-primary uk-text-bold uk-h5  uk-margin-remove uk-display-block">{{author_details($data->author)->name}}</a>
                <span class="uk-display-block uk-text-bold  uk-margin-small">सम्पादक</span>
                <div class="uk-display-block">
                    <a class="uk-link uk-margin-small-right"  href="" uk-icon="icon: facebook; ratio: .85;"></a>
                    <a class="uk-link uk-margin-small-right"  href="" uk-icon="icon: twitter; ratio:.85;"></a>
                    <a class="uk-link" href="" uk-icon="icon: instagram; ratio: .85;"></a>
                </div>
            </div>
        </div>
        <hr class="uk-divider-icon uk-margin-remove">
        <div class="uk-padding-small">
            <h5 class="uk-text-bold text-primary">सम्वादाताका अन्य रिपोर्टहरु :</h5>
            <ul class="uk-theme-list uk-list-divider">
                @foreach(author_details($data->author)->news->take(5) as $value)
                <li> <a href="">{{$value->news_title}}</a>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
    <!--  -->
</div>
