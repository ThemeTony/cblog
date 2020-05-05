<div>
    <button type="button" aria-label="go to top of page"
            class="goup-container footer-goup go-top-button" style="display: none;">
        <i class="ri-arrow-up-s-fill footer-goup-icon"></i>
    </button>
    @if(config('cblog.github'))
        <div
          class="goup-container footer-github"
        >
          <a href="{{config('cblog.github')}}" target="_blank" style="text-decoration:none">
                <i class="ri-github-fill footer-github-icon"></i>
              </a>
        </div>
    @endif
<div class="footer reveal">
    <p>
        Copyright &copy; 2020-{{ date("Y") }} · {{config('cblog.your_name')}}
        @if(config('cblog.registration'))
        <a
          href="http://www.beian.miit.gov.cn"
          target="_blank"
          style="text-decoration: none;color: inherit;font-size: 14px;font-weight: 500;"
        >{{config('cblog.registration')}}</a>
        @endif
         · Made by <a href="https://github.com/ThemeTony" target="_blank">ThemeTony Team</a> ·
        <a
            href="https://creativecommons.org/licenses/by-nc/4.0/"
            target="_blank"
            style="text-decoration: none;color: inherit;font-size: 14px;font-weight: 500;"
        >CC BY-NC 4.0</a>
    </p>
</div>
</div>
