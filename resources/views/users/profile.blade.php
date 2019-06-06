@if($user->gender == 1)
<p class="mb-0">性別：男性 </p>
@else
<p class="mb-0">性別：女性 </p>
@endif

<p class="mb-0">年齢：{!! nl2br(e($user->age)) !!}代</p>

@if($user->favorite_music_age)
<p class="mb-0">よく聴く音楽：{!! nl2br(e($user->favorite_music_age)) !!}年代</p>
@endif

@if($user->favorite_artist)
<p class="mb-0">お気に入りのミュージシャン：{!! nl2br(e($user->favorite_artist)) !!}</p>
@endif

@if($user->comment)
<p class="mb-0">自己紹介：{!! nl2br(e($user->comment)) !!}</p>
@endif