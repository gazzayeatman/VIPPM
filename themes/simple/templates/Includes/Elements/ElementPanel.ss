<div class="container">
    <div class="row">
        <div class="col-md-12">
            <% if $Title %>
                <h1>$Title</h1>
            <% end_if %>
            <% if $PanelContent %>
                $PanelContent
            <% end_if %>
        </div>
        <% loop $WidgetControllers %>
            <div class="$Top.SetColSize($Top.WidgetControllers.Count())">
                $Widget
            </div>
        <% end_loop %>
    </div>
</div>

