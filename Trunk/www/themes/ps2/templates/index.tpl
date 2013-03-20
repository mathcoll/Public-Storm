{setlocale type="all" locale=$locale}
{include file="header.tpl" base_url_http=$base_url_http message=$message user=$user description=$description meta_keywords=$meta_keywords statuses=$statuses}
{if $title != ""}<h2>{$title}</h2>{/if}
{include file="breadcrumb.tpl" breadcrumb=$breadcrumb base_url_http=$base_url_http message=$message user=$user description=$description meta_keywords=$meta_keywords statuses=$statuses}


{include file="plugins/public_storm/home-page.tpl" base_url=$base_url plugins=$plugins statuses=$statuses}

{include file="pre-footer.tpl" base_url=$base_url base_url_http=$base_url_http isHomePage=true articles=$articles plugins=$plugins statuses=$statuses trackbacks=$trackbacks}
{include file="footer.tpl" base_url=$base_url plugins=$plugins statuses=$statuses}
