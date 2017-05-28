<!DOCTYPE html>
<!--[if !IE]><!-->
<html lang="$ContentLocale">
<!--<![endif]-->
<!--[if IE 6 ]><html lang="$ContentLocale" class="ie ie6"><![endif]-->
<!--[if IE 7 ]><html lang="$ContentLocale" class="ie ie7"><![endif]-->
<!--[if IE 8 ]><html lang="$ContentLocale" class="ie ie8"><![endif]-->
	<head>
		<% base_tag %>
		<title>
			<% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title
		</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		$MetaTags(false)
		<!--[if lt IE 9]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="shortcut icon" href="$ThemeDir/images/favicon.ico" />
	</head>
	<body class="$ClassName<% if not $Menu(2) %> no-sidebar<% end_if %>" <% if $i18nScriptDirection %>dir="$i18nScriptDirection"<% end_if %>>
        <% include Header %>
		<div class="container content">
            <div class="row">
                <div class="col-md-8">
                    $Content
                    <div class="row">
                        <div class="col-md-6">
                            <div class="promo-box">
                                <h4>Maximum Returns, No Stress</h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="promo-box">
                                <h4>Your investment comes first</h4>
                            </div>
                        </div>
                    </div>
			        $Form
                </div>
                <div class="col-md-4">
                    <div class="row featured-list">
                        <div class="col-md-12">
                            $RightText
                        </div>
                    </div>
                </div>
            </div>
		</div>
        <% include Footer %>
		<% require javascript('framework/thirdparty/jquery/jquery.js') %>
		<script type="text/javascript" src="{$ThemeDir}/javascript/script.js"></script>
	</body>
</html>
