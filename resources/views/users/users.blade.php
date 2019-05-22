@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                @if($user->image_url)
                <img src="{{ $user->image_url }}" style="width: 50px; height: 50px" >
                @else
                    @if($user->gender == 1)
                    <img src="https://s3.ap-northeast-1.amazonaws.com/original-yoursongs/%E7%A4%BE%E4%BC%9A%E4%BA%BA%E3%81%AE%E7%94%B7%E6%80%A7%20.jpeg?response-content-disposition=inline&X-Amz-Security-Token=AgoGb3JpZ2luEL7%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaDmFwLW5vcnRoZWFzdC0xIoACXsrfSFwnGSi8Hq%2BPoeoOIXEtbYfi9%2FDCzb9WNV3kwdHX7weiIUIbxxAcvRSX%2FT30Lf2aAjCm4De8PuoUA%2FYo59Mp8uZlkrEvJ0U4YDOiJvdyEsSOHhxAvCpbxdaPV0ZGuO7hIFF%2FU%2FUPg4B7aA5HlgrmF%2BT6Zc6N2Qfo50dXPYXDR3nIsXH0BQAHNI1kFqmnkQdx3%2FUMUk1UarNAPA1Y8Nmt9UC6JO2rnI6jYiU80USpD7FqmTEW5GANHOb3OIeVKo18XWgplDPSaEKfxt1Lqb3q%2BHzKPrYvoLFmNGcpj%2BmB%2BORO97HDB0pitfTItQNVKhpu5fhlDs4K6NJq2TPgairbAwhzEAAaDDY0NjcxMTkwMjUzMSIM6BXNtEUyXZqDQKOJKrgDAspCiq7sqwunGjlQyIkCShvNGni5mtuRW4jkr%2FA%2FEpp5uKVOmJpjsIGdM%2Fyw6ngJEGK%2FJnxyYJTvAMq1lsdWI2U8yMcOQiB%2BFPhXquW7EhAUbfKuOTodK4s2VmQNhRcxDS92ZnrVXs%2BHCVdQls534jtcfe%2F1lc4GVAKU1VEK21oGdaV5FyKC8hRvfwV0J9w9Xui0SPj0D5frgsVOI36iETtPal4KtjgoqeK%2FJz1WtlRqaFxht39jqUHKh9HYkfSQ2RAghUZT7VX9aanBFVZh5OP38MU1QS8HW5bg0%2FG9MY21xLPah5snViXVg2LEKMdQO%2F4d46m4YdDTVg2c5o%2BSMcOdUxBtlx9PTiuWetvOvV2U1zHKL9RMz59jNoDyigD61q8tgSLMyvt40UhPAs8%2By8OANvPKMrG%2FEqoayDJOJjw7FZMbxGvqLnjD8dOoOqStdDRbWkGhOQpcxgvwf7MxwBVHbevh6pgWgTV0LZcJZCEuFT6wJUYXVnXy1SW3%2FupqnveshbiqVtGVpOm89%2FE2ZT2h5kUiE10lpKh3Oi2LKcn2w0r1d5oai9fYSP8fac87LX9%2BLIYK1Lww%2B%2FmJ5wU%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20190520T133016Z&X-Amz-SignedHeaders=host&X-Amz-Expires=300&X-Amz-Credential=ASIAZNEYIQFB72DAO6ZW%2F20190520%2Fap-northeast-1%2Fs3%2Faws4_request&X-Amz-Signature=4cf281c13cbbd60473018f08082f05fdd56785c701925981ef278c63e29524e1" style="width: 50px; height: 50px" >
                    @elseif($user->gender == 2)
                    <img src= "https://s3.ap-northeast-1.amazonaws.com/original-yoursongs/%E3%83%AD%E3%83%B3%E3%82%B0%E3%83%98%E3%82%A2%E3%83%BC%E3%81%AE%E5%A5%B3%E6%80%A7.jpeg?response-content-disposition=inline&X-Amz-Security-Token=AgoGb3JpZ2luEL7%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaDmFwLW5vcnRoZWFzdC0xIoACXsrfSFwnGSi8Hq%2BPoeoOIXEtbYfi9%2FDCzb9WNV3kwdHX7weiIUIbxxAcvRSX%2FT30Lf2aAjCm4De8PuoUA%2FYo59Mp8uZlkrEvJ0U4YDOiJvdyEsSOHhxAvCpbxdaPV0ZGuO7hIFF%2FU%2FUPg4B7aA5HlgrmF%2BT6Zc6N2Qfo50dXPYXDR3nIsXH0BQAHNI1kFqmnkQdx3%2FUMUk1UarNAPA1Y8Nmt9UC6JO2rnI6jYiU80USpD7FqmTEW5GANHOb3OIeVKo18XWgplDPSaEKfxt1Lqb3q%2BHzKPrYvoLFmNGcpj%2BmB%2BORO97HDB0pitfTItQNVKhpu5fhlDs4K6NJq2TPgairbAwhzEAAaDDY0NjcxMTkwMjUzMSIM6BXNtEUyXZqDQKOJKrgDAspCiq7sqwunGjlQyIkCShvNGni5mtuRW4jkr%2FA%2FEpp5uKVOmJpjsIGdM%2Fyw6ngJEGK%2FJnxyYJTvAMq1lsdWI2U8yMcOQiB%2BFPhXquW7EhAUbfKuOTodK4s2VmQNhRcxDS92ZnrVXs%2BHCVdQls534jtcfe%2F1lc4GVAKU1VEK21oGdaV5FyKC8hRvfwV0J9w9Xui0SPj0D5frgsVOI36iETtPal4KtjgoqeK%2FJz1WtlRqaFxht39jqUHKh9HYkfSQ2RAghUZT7VX9aanBFVZh5OP38MU1QS8HW5bg0%2FG9MY21xLPah5snViXVg2LEKMdQO%2F4d46m4YdDTVg2c5o%2BSMcOdUxBtlx9PTiuWetvOvV2U1zHKL9RMz59jNoDyigD61q8tgSLMyvt40UhPAs8%2By8OANvPKMrG%2FEqoayDJOJjw7FZMbxGvqLnjD8dOoOqStdDRbWkGhOQpcxgvwf7MxwBVHbevh6pgWgTV0LZcJZCEuFT6wJUYXVnXy1SW3%2FupqnveshbiqVtGVpOm89%2FE2ZT2h5kUiE10lpKh3Oi2LKcn2w0r1d5oai9fYSP8fac87LX9%2BLIYK1Lww%2B%2FmJ5wU%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20190520T132926Z&X-Amz-SignedHeaders=host&X-Amz-Expires=300&X-Amz-Credential=ASIAZNEYIQFB72DAO6ZW%2F20190520%2Fap-northeast-1%2Fs3%2Faws4_request&X-Amz-Signature=79a9dc3060aff57dd51a34c3bdc80a19cb2b7224553f8442dd13ca1fd1f5cb3e" style="width: 50px; height: 50px" >
                    @endif
                @endif
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div>
                        <p>{!! link_to_route("users.show", "View Profile", ["id" => $user->id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{ $users->render("pagination::bootstrap-4") }}
@endif