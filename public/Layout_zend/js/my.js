$(document).ready(function() {
    let $btnSearch = $("button#btn-search");
    let $btnClearSearch = $("button#btn-clear");

    let $inputSearchField = $("input[name  = search_field]");
    let $inputSearchValue = $("input[name  = search_value]");

    let $selectFilter = $("select[name = select_filter]");
    let $selectChangeAttr = $("select[name = select_change_attr]");
    let $selectChangeAttrAjax = $("select[name =  select_change_attr_ajax]");
    $("a.select-field").click(function(e) {
        e.preventDefault();

        let field = $(this).data('field');
        let fieldName = $(this).html();
        $("button.btn-active-field").html(fieldName + ' <span class="caret"></span>');
        $inputSearchField.val(field);
    });

    $btnSearch.click(function() {

        var pathname = window.location.pathname;
        let searchParams = new URLSearchParams(window.location.search);
        params = ['page', 'filter_status', 'select_field', 'select_value'];

        let link = "";
        $.each(params, function(key, value) {
            if (searchParams.has(value)) {
                link += value + "=" + searchParams.get(value) + "&"
            }
        });

        let search_field = $inputSearchField.val();
        let search_value = $inputSearchValue.val();

        window.location.href = pathname + "?" + link + 'search_field=' + search_field + '&search_value=' + search_value.replace(/\s+/g, '+').toLowerCase();
        // window.location.href = pathname + "?" + 'search_field=' + search_field + '&search_value=' + search_value;
    });

    $btnClearSearch.click(function() {
        var pathname = window.location.pathname;
        let searchParams = new URLSearchParams(window.location.search);

        params = ['page', 'filter_status', 'select_filter'];

        let link = "";
        $.each(params, function(key, value) {
            if (searchParams.has(value)) {
                link += value + "=" + searchParams.get(value) + "&"
            }
        });

        window.location.href = pathname + "?" + link.slice(0, -1);
    });
    $selectChangeAttr.on('change', function() {
        let select_value = $(this).val();
        let url = $(this).data('url');
        console.log(url.replace('value_new', select_value));
        window.location.href = url.replace('value_new', select_value);
    });

});