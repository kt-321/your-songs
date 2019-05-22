<p class="mb-0">名前：{!! nl2br(e($user->name)) !!}</p>
<p class="mb-0">Ｅメール：{!! nl2br(e($user->email)) !!}</p>
<p class="mb-0">年齢：{!! nl2br(e($user->age)) !!}代</p>
@if($user->gender == 1)<p class="mb-0">性別：男性 </p>
@else<p class="mb-0">性別：女性 </p>
@endif
<p class="mb-0">好きな音楽の年代：{!! nl2br(e($user->favorite_music_age)) !!}年代</p>
<p class="mb-0">好きなミュージシャン：{!! nl2br(e($user->favorite_artist)) !!}</p>
<p class="mb-0">自由コメント：{!! nl2br(e($user->comment)) !!}</p>